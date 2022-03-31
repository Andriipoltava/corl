<?php 


// single testimonial widget

namespace Elementor;


class SingleTestimonailWidget extends Widget_Base{


    public function get_name() {
        return "single-testimonial-widget";
    }

	public function get_title() {
        return "Single Testimonail";
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
			'single_testimonail_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //content
        $this->add_control(
			'singel_testimonial_content',
			[
				'label' => __( 'Tetimonial', 'corl' ),
				'type' => Controls_Manager::WYSIWYG,
			]
		);

        //logo
        $this->add_control(
			'testimonial_client_img',
			[
				'label' => __( 'Upload client Image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				
			]
		);

        //Title
        $this->add_control(
			'testimonial_client_name',
			[
				'label' => __( 'Client Name', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Cameron Williamson', 'corl' ),
				'placeholder' => __( 'Type Name here', 'corl' ),
			]
		);




         //image
         $this->add_control(
			'testimonail_img',
			[
				'label' => __( 'Upload image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				
			]
		);




        


        

        


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $singel_testimonial_content = $settings['singel_testimonial_content'];
        $testimonial_client_img = $settings['testimonial_client_img']['url'];
        $testimonial_client_name = $settings['testimonial_client_name'];
        $testimonail_img = $settings['testimonail_img']['url'];
       

    
       
        ?>

    

<section class="testimonial_style_two">
            
            <div class="container">
                <div class="testimonial_wrapper">
                    <?php if($testimonail_img){echo'<img src="'.$testimonail_img.'" alt="" class="img-fluid testimonial_style_two_banner">';} ?>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial_content">
                                <?php if($singel_testimonial_content){ ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/quote_testimonial_two.png" alt="">
                                <p><?php echo $singel_testimonial_content; ?></p>

                                <?php } ?>


                                <div class="review_two d-flex align-items-center">
                                    <?php if($testimonial_client_img){echo '<img src="'.$testimonial_client_img.'" alt=""';} ?>
                                    <h4><?php echo $testimonial_client_name;?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
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

plugin::instance()->widgets_manager->register_widget_type( new SingleTestimonailWidget);