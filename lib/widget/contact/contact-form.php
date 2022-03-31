<?php 


// contact form section widget here

namespace Elementor;


class ContactFormWidget extends Widget_Base{


    public function get_name() {
        return "contact-form-widget";
    }

	public function get_title() {
        return "Contact Form";
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
			'contactform_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //Title
        $this->add_control(
			'contact_form_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Get in touch', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        //Title
        $this->add_control(
			'contact_form_shortcode',
			[
				'label' => __( 'Shortcode', 'corl' ),
				'type' => Controls_Manager::CODE,
			]
		);

        


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $contact_form_title = $settings['contact_form_title'];
        $contact_form_shortcode = $settings['contact_form_shortcode'];

    
       
        ?>


<section class="contact_form">
            <div class="container">

                <div class="form_wrapper">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="section_title">
                                <h2 class="m-0"><?php echo $contact_form_title; ?></h2>
                            </div>
                        </div>
                    </div>
                    <?php if($contact_form_shortcode){ echo do_shortcode($contact_form_shortcode);} ?>
                </div>
            </div>
            <div class="fish_shape_wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_1.png" alt="" class="fist_right_to_left fist_right_to_left_1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_2.png" alt="" class="fist_right_to_left fist_right_to_left_2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_3.png" alt="" class="fist_right_to_left fist_right_to_left_3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_4.png" alt="" class="fist_right_to_left fist_right_to_left_4">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_5.png" alt="" class="fist_right_to_left fist_right_to_left_5">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_6.png" alt="" class="fist_right_to_left fist_right_to_left_6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_7.png" alt="" class="fist_right_to_left fist_right_to_left_7">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_8.png" alt="" class="fist_right_to_left fist_right_to_left_8">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_9.png" alt="" class="fist_right_to_left fist_right_to_left_9">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_10.png" alt="" class="fist_right_to_left fist_right_to_left_10">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_11.png" alt="" class="fist_right_to_left fist_right_to_left_11">
            </div> 
        </section>





<?php 
		

    }



}

plugin::instance()->widgets_manager->register_widget_type( new ContactFormWidget);