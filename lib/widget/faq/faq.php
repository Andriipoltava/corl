<?php 


// Faq widget here

namespace Elementor;


class FaqWidget extends Widget_Base{


    public function get_name() {
        return "faq-widget";
    }

	public function get_title() {
        return "Corl FAQ";
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
			'faq_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        // sigle item

        $repeater = new Repeater();


        $repeater->add_control(
			'faq_title', [
				'label' => esc_html__( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);


        $repeater->add_control(
			'faq_content', [
				'label' => esc_html__( 'Content', 'corl' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
			]
		);

    

        


        $this->add_control(
			'faq_list',
			[
				'label' => esc_html__( 'FAQ List', 'corl' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ faq_title }}}',
			]
		);

        


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $faq_list = $settings['faq_list'];

    
       
        ?>



        <!-- ...::: Start FAQ Section :::... -->
        <div class="faq-section">
            <div class="box-wrapper">
                <!-- Start Faq Wrapper -->
                <div class="faq-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="faq-accordian-style-1 accordion" id="accordion-1">

                                  <?php foreach($faq_list as $faq_item){  ?>


                                    <!-- Start Accordian Single Item -->
                                    <div class="accordian-single-item accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-<?php echo esc_attr( $faq_item['_id'] ) ?>"><?php echo $faq_item['faq_title'];?></button>
                                        </h2>
                                        <div id="faq-<?php echo esc_attr( $faq_item['_id'] ) ?>" class="accordion-collapse collapse" data-bs-parent="#accordion-1">
                                            <div class="accordion-body"><?php echo $faq_item['faq_content'];?></div>
                                        </div>
                                    </div>
                                    <!-- End Accordian Single Item -->

                                <?php } ?>



                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Faq Wrapper -->
            </div>
        </div>
        <!-- ...::: End FAQ Section :::... -->






<?php 
		

    }



}

plugin::instance()->widgets_manager->register_widget_type( new FaqWidget);