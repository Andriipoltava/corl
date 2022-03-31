<?php 


// home page Feature widget here



namespace Elementor;


class HomeFeatureWidget extends Widget_Base{


    public function get_name() {
        return "home-feature";
    }

	public function get_title() {
        return "Home Feature";
    }

	public function get_icon() {
        return " eicon-favorite";
    }

	 public function get_categories() {
        return [ 'corl-theme' ];
     }

	
    //public function get_script_depends() {}

	//public function get_style_depends() {}

	protected function register_controls() {

        $this->start_controls_section(
			'feature_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //hero Title
        $this->add_control(
			'home_feature_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Through revenue-based financing use<br> tomorrow\'s income to fuel today’s growth.', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
			'single_feature_title', [
				'label' => esc_html__( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Fast Process' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'single_feature_icon', [
				'label' => esc_html__( 'Upload Icon/Image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'single_feature_description', [
				'label' => esc_html__( 'Description', 'corl' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'The application process takes 10 minutes to complete.Our platform gathers information on a business and generates a financing decision. Funds are deposited in under 2 weeks.' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'single_feature_buton_text', [
				'label' => esc_html__( 'Button Text', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Ready To Grow?' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'single_feature_buton_url', [
				'label' => esc_html__( 'Button Url', 'corl' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);

        $this->add_control(
			'feature_list',
			[
				'label' => esc_html__( 'Feature List', 'corl' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ single_feature_title }}}',
			]
		);



        $this->add_control(
			'feature_cta_title', [
				'label' => esc_html__( 'CTA Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Saas financing' , 'corl' ),
				
			]
		);

        $this->add_control(
			'feature_cta_descriptioin', [
				'label' => esc_html__( 'CTA Description', 'corl' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Distracted by the readable content of a looking at its layout. The point of using it look like readable English. ' , 'corl' ),
				
			]
		);

        $this->add_control(
			'feature_cta_button_text', [
				'label' => esc_html__( 'CTA Button Text', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More' , 'corl' ),
				
			]
		);

        $this->add_control(
			'feature_cta_button_url', [
				'label' => esc_html__( 'CTA Button URL', 'corl' ),
				'type' => Controls_Manager::URL,
				
			]
		);








        






         
     


    




		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();


        $home_feature_title = $settings['home_feature_title'];

        $feature_list = $settings['feature_list'];


        $feature_cta_title = $settings['feature_cta_title'];
        $feature_cta_descriptioin = $settings['feature_cta_descriptioin'];
        $feature_cta_button_text = $settings['feature_cta_button_text'];
        $feature_cta_button_url = $settings['feature_cta_button_url']['url'];

      


        

       
        ?>




            





            <!-- Start Why Corl Section -->
            <section class="why_corl">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="section_heading">
                                <h2 class="m-0"><?php echo $home_feature_title;?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <?php foreach($feature_list as $feature_item){

                        ?>
                        <!-- Start Why Corl Single Items -->
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="why_corl_single_items">
                                <div class="title_icon ">
                                    <div class="icon">
                                        <img src="<?php echo $feature_item['single_feature_icon']['url'];?>" alt="" class="icon_animate icon_1">
                                    </div>
                                    <h4 class="title m-0"><?php echo $feature_item['single_feature_title']; ?></h4>
                                </div>
                                <div class="content">
                                    <p><?php echo $feature_item['single_feature_description']; ?></p>
                                    <a href="<?php echo $feature_item['single_feature_buton_url']['url']; ?>" class="click_button"><?php echo $feature_item['single_feature_buton_text']; ?></a>

                                </div>
                            </div>
                        </div>
                        <!-- End Why Corl Single Items -->

                        <?php } ?>

                        

                    </div>

                    <!-- Start Get Started Button -->
                    <div class="sass_freelancing">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6 col-lg-6 text-center">
                                <div class="sass_freelancing_content">
                                    <h3><?php echo $feature_cta_title; ?></h3>
                                    <p><?php echo $feature_cta_descriptioin; ?></p>
                                    <a href="<?php echo $feature_cta_button_url; ?>" ><?php echo $feature_cta_button_text; ?></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 text-center">
                                <div class="sass_banner">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/section-image/sass_freelancing_banner.png" loading="lazy" alt="">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/section-image/sass_freelancing_banner-cloud.png" loading="lazy" alt="" class="cloud_shape">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape">
                    <div class="shape_bg">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/section-image/water_shape-min.png" loading="lazy" alt="">
                    </div>
                </div>
                <div class="fish_shape_wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(1).png" loading="lazy" alt="" class="fish_shape fish_shape_1">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(2).png" loading="lazy" alt="" class="fish_shape fish_shape_2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(3).png" loading="lazy" alt="" class="fish_shape fish_shape_3">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(4).png" loading="lazy" alt="" class="fish_shape fish_shape_4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(5).png" loading="lazy" alt="" class="fish_shape fish_shape_5">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(6).png" loading="lazy" alt="" class="fish_shape fish_shape_6">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(7).png" loading="lazy" alt="" class="fish_shape fish_shape_7">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(8).png" loading="lazy" alt="" class="fish_shape fish_shape_8">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(9).png" loading="lazy"  alt="" class="fish_shape fish_shape_9">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(10).png" loading="lazy" alt="" class="fish_shape fish_shape_10">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fish_(11).png" loading="lazy" alt="" class="fish_shape fish_shape_11">
                </div>     
                <div class="vecteria_wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/vecteria_1.png" alt="" class="vecteria_shape vecteria_1">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/vecteria_2.png" alt="" class="vecteria_shape vecteria_2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/vecteria_3.png" alt="" class="vecteria_shape vecteria_3">
                </div>           
            </section>









<?php 
		



    }



}

plugin::instance()->widgets_manager->register_widget_type( new HomeFeatureWidget);