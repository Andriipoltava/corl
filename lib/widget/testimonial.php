<?php 


// Testimonial widget here



namespace Elementor;


class TestimonialWidget extends Widget_Base{


    public function get_name() {
        return "testimonial-widget";
    }

	public function get_title() {
        return "Testimonial";
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
			'success_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //Title
        $this->add_control(
			'tetimonial_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'What they say about us', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        // sigle item

        $repeater = new Repeater();


        $repeater->add_control(
			'testimanial_single_icon', [
				'label' => esc_html__( 'Upload Icon/Image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);


        $repeater->add_control(
			'testimonial_content', [
				'label' => esc_html__( 'Content', 'corl' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'It is a long is anestablished fact that a readerp must will be distracted by the readable was content of a page when looking at it layout. The point of using letters, as opposed to using' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'client_name', [
				'label' => esc_html__( 'Client Name', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Cameron Williamson' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'client_designation', [
				'label' => esc_html__( 'Designation', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Marketing Coordinator' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'client_image', [
				'label' => esc_html__( 'Upload Client Image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);


        $this->add_control(
			'testimonial_list',
			[
				'label' => esc_html__( 'Testimonial List', 'corl' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ client_name }}}',
			]
		);

        


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $tetimonial_title = $settings['tetimonial_title'];
        $testimonial_list = $settings['testimonial_list'];

    
       
        ?>

<div id="particles-js"></div>

<!-- Start Testimonial Section -->
<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section_title">
                    <h2 class="m-0"><?php echo $tetimonial_title;?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Start testimonial single Items -->
            <div class="col-12 col-md-12 col-lg-12">

                <div class="owl-carousel">

                   <?php foreach($testimonial_list as $testimonialItem){
                    ?>

                    <div class="testimonial_single_items">
                        <div class="company_logo">
                            <img src="<?php echo $testimonialItem['testimanial_single_icon']['url'];?>" alt="">
                        </div>
                        <div class="content">
                            <p><?php echo $testimonialItem['testimonial_content']; ?></p>
                        </div>
                        <div class="user_name_profile d-flex flex-wrap align-items-center">
                            <div class="user_profile">
                                <img src="<?php echo $testimonialItem['client_image']['url'];?>" alt="">
                            </div>
                            <div class="reviewer_name">
                                <h4 class="title m-0"><?php echo $testimonialItem['client_name']; ?></h4>
                                <span><?php echo $testimonialItem['client_designation']; ?></span>
                            </div>
                        </div>
                    </div>

                    <?php } ?>

                    

                </div>                            
            </div>
            <!-- End testimonial single Items -->
        </div>
    </div>
    <div class="clients_shapes">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/clients-shape.png" alt="" class="shape_one">
    </div>
</section>
<!-- End Testimonial Section -->








<?php 
		

    }



}

plugin::instance()->widgets_manager->register_widget_type( new TestimonialWidget);