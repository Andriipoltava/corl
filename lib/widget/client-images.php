<?php 


// Client Images widget here



namespace Elementor;


class ClientImagesWidget extends Widget_Base{


    public function get_name() {
        return "client-images-galerry-widget";
    }

	public function get_title() {
        return "Client Images";
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
			'client_image_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //Title
        

        $this->add_control(
			'client_images_gallery',
			[
				'label' => __( 'Add Client Images', 'corl' ),
				'type' => Controls_Manager::GALLERY,
			]
		);

       

        


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $client_images_gallery = $settings['client_images_gallery'];

    
       
        ?>


<!-- Start Client Section -->
<section class="client_area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <ul class="client_logos">
                                    <?php
                                    
                                    foreach ( $client_images_gallery as $cleintimage ) {
                                        echo '<li><img src="' .$cleintimage['url']. '"></li>';
                                    }
                                    
                                    ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- End Client Section -->





<?php 
		

    }



}

plugin::instance()->widgets_manager->register_widget_type( new ClientImagesWidget);