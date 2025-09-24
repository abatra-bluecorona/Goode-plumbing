<?php
            //exaple how to set image sizewise
            // ['dektop', 'ipad', 'mobile']

            $img1x = [
                get_exist_image_url('landing-page', 'landing-banner'),
                get_exist_image_url('landing-page', 'landing-banner'),
                get_exist_image_url('landing-page', 'landing-banner')
            ];
            
            $img2x = [
                get_exist_image_url('landing-page', 'landing-banner@2x'),
                get_exist_image_url('landing-page', 'landing-banner@2x'),
                get_exist_image_url('landing-page', 'landing-banner@2x')
            ];
            
            $img3x = [
                get_exist_image_url('landing-page', 'landing-banner@3x'),
                get_exist_image_url('landing-page', 'landing-banner@3x'),
                get_exist_image_url('landing-page', 'landing-banner@3x')
            ];

			$img1x = Implode(',', $img1x);
			$img2x = Implode(',', $img2x);
			$img3x = Implode(',', $img3x);

        ?>
<?php echo do_shortcode('[custom-bg-srcset class="landing_banner" img1x="'.$img1x.'" img2x="'.$img2x.'" img3x="'.$img3x.'" size1x="cover" size2x="cover" size3x="cover"]'); ?>
<div class="container-fluid landing_banner py-5 position-relative">
            <div class="container px-0 py-lg-1 position-relative z-index">
                <div class="row py-lg-5">
                    <div class="col-md-5 mx-auto text-center">  
                        <span class="h1-alt text-center pb-1 d-block"><?php echo $args['page_templates']['subpage']['sidebar']['banner']['heading'] ?></span>
                        <h2 class="h2-alt text-center mb-0 pb-2"><?php echo $args['page_templates']['subpage']['sidebar']['banner']['subheading'] ?></h2> 
                        <p class="p-alt text-center mb-0 pb-2 px-lg-3 mx-lg-3 "><?php echo $args['page_templates']['subpage']['sidebar']['banner']['content'] ?></p>
                         <?php if(!empty($args['page_templates']['subpage']['sidebar']['banner']['button_text'])){ ?>
                        <button onclick="scrollSmoothTo('request_service')" class="btn btn-primary mw-194 scrollTo"><?php echo $args['page_templates']['subpage']['sidebar']['banner']['button_text'] ?></button>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>