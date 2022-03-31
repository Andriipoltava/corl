<?php 


// home page hero banner widget here



namespace Elementor;


class FirstWidget extends Widget_Base{


    public function get_name() {
        return "hero-banner";
    }

	public function get_title() {
        return "Header Banner";
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
			'content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //hero Title
        $this->add_control(
			'header_banner_title',
			[
				'label' => __( 'Hero Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Turn Revenue<br> Into Capital', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        // Hero Description

        $this->add_control(
			'header_banner_description',
			[
				'label' => __( 'Hero Description', 'corl' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'TScale your business and access growth capital <br> without giving up ownership.', 'corl' ),
				'placeholder' => __( 'Type Description here', 'corl' ),
			]
		);

        //Form code

        $this->add_control(
			'header_form_code',
			[
				'label' => __( 'Form Code', 'corl' ),
				'type' => Controls_Manager::CODE,
                'raw' => __( 'A very important message to show in the panel.', 'corl' ),
				'content_classes' => 'your-class',
				
			]
		);

        // hero image

        $this->add_control(
			'header_media_image',
			[
				'label' => __( 'Upload image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				
			]
		);






         
     


    




		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();


        $header_banner_title = $settings['header_banner_title'];
        $header_banner_description = $settings['header_banner_description'];
        $header_form_code = $settings['header_form_code'];
        $header_media_image = $settings['header_media_image']['id'];

       
        ?>



        <!-- ...::: Start Hero Display Section :::... -->
        <div class="header_hero">
            <div class="container">
                <div class="header_aera">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="hero-wrapper">
                                <div class="hero-content">
                                    <h1 class="title"><?php echo $header_banner_title;?></h1>
                                    <p><?php echo $header_banner_description;?></p>
                                    <div class="newsletter">
                                        <?php if($header_form_code){ 
                                            
                                            echo do_shortcode($header_form_code);
                                            
                                            
                                           } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <?php if($header_media_image){ ?>
                            <div class="header_banner">
                                <div class="banner">
                                    <?php echo wp_get_attachment_image($header_media_image,[558,372]); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="bird_shape">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/bird.png" loading="lazy" alt="" class="bird bird_1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/bird-4.png"  loading="lazy" alt="" class="bird bird_2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/bird-3.png"  loading="lazy" alt="" class="bird bird_3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/bird-2.png"  loading="lazy" alt="" class="bird bird_4">
                    </div>
                </div>
            </div>

        </div>
        <!-- ...::: End Hero Display Section :::... -->









<?php 
		



    }



}

plugin::instance()->widgets_manager->register_widget_type( new FirstWidget);