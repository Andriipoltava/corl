<?php 


// cutom footer widget here



namespace Elementor;


class CustomFooterWidget extends Widget_Base{


    public function get_name() {
        return "custom-footer";
    }

	public function get_title() {
        return "Custom Footer";
    }

	public function get_icon() {
        return "eicon-favorite";
    }

	 public function get_categories() {
        return [ 'corl-theme' ];
     }

	
    //public function get_script_depends() {}

	//public function get_style_depends() {}

	protected function register_controls() {

        $this->start_controls_section(
			'customfooter_content_section',
			[
				'label' => __( 'Edit Footer From Customizer', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        



		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

       
        ?>




            
<!-- ...::: Start Footer Section :::... -->
<footer class="footer_section footer_index">
                    <div class="box-wrapper">
                        <!-- Start Footer Top -->
                        <div class="footer_top">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div class="section_title">
                                            <h2 class="m-0"><?php echo get_theme_mod( 'corl_footer_cta_title');?></h2>
                                        </div>
                                        <div class="button_style">
                                            <a href="<?php echo get_theme_mod( 'corl_footer_cta_first_button_link');?>" class="button_style_1 active"><?php echo get_theme_mod( 'corl_footer_cta_first_button_text');?></a>
                                            <a href="<?php echo get_theme_mod( 'corl_footer_cta_secound_button_link');?>" class="button_style_1"><?php echo get_theme_mod( 'corl_footer_cta_secound_button_text');?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Footer Top -->

                        <!-- Start Footer Bottom -->
                        <div class="footer_bottom">
                            <div class="container">
                                <div class="row footer_menu_wrapper">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                                        <div class="footer_logo">
                                            <a href="<?php echo site_url(); ?>" class="footer-logo">
                                                <img src="<?php echo get_theme_mod( 'corl_footer_logo' , 'default' );?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-5 col-md-4 p-0">
                                        <div class="footer_menu footer_menu_1">
                                            <?php
                                                wp_nav_menu(
                                                    array(
                                                        'theme_location' => 'menu-3',
                                                        'menu_id'        => 'footer-left-menu',
                                                        'menu_class'        => 'footer-nav d-flex flex-wrap',
                                                    )
                                                );
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-7  col-md-6 p-0">
                                        <div class="footer_menu menu_2nd">
                                            <?php
                                                wp_nav_menu(
                                                    array(
                                                        'theme_location' => 'menu-4',
                                                        'menu_id'        => 'footer-right-menu',
                                                        'menu_class'        => 'footer-nav footer_menu_2  d-flex flex-wrap',
                                                    )
                                                );
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Footer Bottom -->

                        <div class="copyright_area">
                            <div class="container">
                                <div class="copyright_content_wrapper d-flex flex-wrap justify-content-between">

                                    <p class="copytight-text"><?php echo get_theme_mod( 'corl_footer_copyright');?></p>
                                    <div class="copyright_menu_social">
                                            <?php
                                                wp_nav_menu(
                                                    array(
                                                        'theme_location' => 'menu-5',
                                                        'menu_id'        => 'footer-bottom-menu',
                                                        'menu_class'        => 'footer-bottom-link  d-flex flex-wrap',
                                                    )
                                                );
                                            ?>
                                        
                                        <ul class="footer-bottom-social d-flex flex-wrap">
                                        <?php 
                                            $corl_linkedin_link = get_theme_mod( 'corl_linkedin_link' );
                                            $corl_facebook_link = get_theme_mod( 'corl_facebook_link' );
                                            $corl_twitter_link = get_theme_mod( 'corl_twitter_link' );
                                            $corl_instagram_link = get_theme_mod( 'corl_instagram_link' );

                                            if($corl_linkedin_link){echo'<li><a href="'.$corl_linkedin_link.'"><i class="fab fa-linkedin-in"></i></a></li>';}
                                            if($corl_facebook_link){echo'<li><a href="'.$corl_facebook_link.'"><i class="fab fa-facebook-f"></i></a></li>';}
                                            if($corl_twitter_link){echo'<li><a href="'.$corl_twitter_link.'"><i class="fab fa-twitter"></i></a></li>';}
                                            if($corl_instagram_link){echo'<li><a href="'.$corl_instagram_link.'"><i class="fab fa-instagram"></i></a></li>';}

                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_shape">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/footer-shape-1.png" alt="" class="shape_tree">
                    </div>
                    <div class="fish_shape_wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(1).png" alt="" class="fish_shape fish_shape_1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(2).png" alt="" class="fish_shape fish_shape_2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(3).png" alt="" class="fish_shape fish_shape_3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(4).png" alt="" class="fish_shape fish_shape_4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(5).png" alt="" class="fish_shape fish_shape_5">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(6).png" alt="" class="fish_shape fish_shape_6">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(7).png" alt="" class="fish_shape fish_shape_7">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(8).png" alt="" class="fish_shape fish_shape_8">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(9).png" alt="" class="fish_shape fish_shape_9">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(10).png" alt="" class="fish_shape fish_shape_10">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(11).png" alt="" class="fish_shape fish_shape_11">
                    </div>
                </footer>
                <!-- ...::: End Footer Section :::... -->












<?php 
		



    }



}

plugin::instance()->widgets_manager->register_widget_type( new CustomFooterWidget);