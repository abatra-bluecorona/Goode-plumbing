<?php
class RdsDesignHandler {

    private $rds_design_data;

    public function __construct() {
        add_action('upgrader_process_complete', [$this, 'run_on_theme_update'], 10, 2);
    }

    
    private function get_rds_design_data() {
        $rds_design_data = get_option('rds_design');

        if ($rds_design_data) {
            $decoded_data = json_decode($rds_design_data, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                return $decoded_data;
            } else {
                error_log('JSON decode error: ' . json_last_error_msg());
            }
        } else {
            error_log('No data found for option name: rds_design');
        }

        return null;
    } 

    public function run_on_theme_update($upgrader_object, $options) {
        if (
            isset($options['type'], $options['action']) && 
            $options['type'] === 'theme' && 
            $options['action'] === 'update'
        ) {
            // Retrieve the design data.
            $rds_design_data = $this->get_rds_design_data();

            if ($rds_design_data) {
                // Send the data to the external API.
                $response = wp_remote_post(RDS_API_URL, array(
                    'body' => json_encode($rds_design_data),
                    'headers' => array(
                        'Content-Type' => 'application/json',
                        'API-KEY' => RDS_API_KEY,
                    ),
                ));

                if (is_wp_error($response)) {
                    error_log('API request failed: ' . $response->get_error_message());
                } else {
                    $api_response_body = wp_remote_retrieve_body($response);
                    // Handle the API response if needed
                }
            } else {
                error_log('No RDS design data found to send.');
            }
        }
    }
}


new RdsDesignHandler();
