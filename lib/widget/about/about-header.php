<?php 


// about us header widget



namespace Elementor;


class AboutusHeaderWidget extends Widget_Base{


    public function get_name() {
        return "aboutus-header-widget";
    }

	public function get_title() {
        return "About us Header";
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
			'aboutus_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //Title
        $this->add_control(
			'aboutus_header_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Our Mission', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        // description

        $this->add_control(
			'aboutus_header_description',
			[
				'label' => __( 'Description', 'corl' ),
				'type' => Controls_Manager::WYSIWYG,
                'default' => __( 'In 2016, Corl was created to change the way that startups raise capital. Our philosophy issimple; we believe that businesses should have equitable access to fast, fair, and flexiblefinancing.', 'corl' ),
			]
		);


        // iamge 

        $this->add_control(
			'aboutus_header_image',
			[
				'label' => __( 'Upload Image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

        

        


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $aboutus_header_title = $settings['aboutus_header_title'];
        $aboutus_header_description = $settings['aboutus_header_description'];
        $aboutus_header_image = $settings['aboutus_header_image']['id'];


       
        ?>


        <!-- ...::: Start Hero Display Section :::... -->
        <div class="inner_hero about">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/inner_hero-min.png" alt=""  loading="lazy" class="inner_bg">
            <div class="container">
                <div class="header_aera">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="hero-content">
                                <h1><?php echo $aboutus_header_title; ?></h1>
                                <p><?php echo $aboutus_header_description;?></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="header_banner">
                                <div class="banner">
                                    <?php echo wp_get_attachment_image($aboutus_header_image,[558,372]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="bird_shape">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/bird.png"  loading="lazy" alt="" class="bird bird_1">
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

plugin::instance()->widgets_manager->register_widget_type( new AboutusHeaderWidget);