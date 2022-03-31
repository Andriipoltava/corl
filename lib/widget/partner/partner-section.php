<?php 


// Partner section widget here

namespace Elementor;


class PartnerSectionWidget extends Widget_Base{


    public function get_name() {
        return "partner-widget";
    }

	public function get_title() {
        return "Partnership";
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
			'partnership_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //Title
        $this->add_control(
			'partnership_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Partnership - we work together', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        //Title
        $this->add_control(
			'partnership_description',
			[
				'label' => __( 'Description', 'corl' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Companies receive access to over $100,000 in discounts across the following solution providers:', 'corl' ),
			]
		);

        // sigle item

        $repeater = new Repeater();


        $repeater->add_control(
			'partner_single_image', [
				'label' => esc_html__( 'Upload Image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);


        $repeater->add_control(
			'partner_single_content', [
				'label' => esc_html__( 'Content', 'corl' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Passages of Lrem Ipsum available, words which don\'t look even slhtly anythinga embarrassing hidden in the middle of  necessary.' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'partner_button_text', [
				'label' => esc_html__( 'Button Text', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'http://www.amazon.com' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'partner_button_url', [
				'label' => esc_html__( 'Button URL', 'corl' ),
				'type' => Controls_Manager::URL,
			]
		);

        


        $this->add_control(
			'partner_list',
			[
				'label' => esc_html__( 'Partnership List', 'corl' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ partner_single_content }}}',
			]
		);

        


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $partnership_title = $settings['partnership_title'];
        $partnership_description = $settings['partnership_description'];
        $partner_list = $settings['partner_list'];

    
       
        ?>



<!-- Start partnership Section -->
<section class="partner_ship">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="section_heading">
                            <h2 class="m-0"><?php echo $partnership_title;?></h2>
                            <p><?php echo $partnership_description;?></p>
                        </div>
                    </div>
                </div>
                <div class="row partner_wrapper">



                <?php foreach($partner_list as $partner_item){
                    ?>

                    <!-- Start testimonial single Items -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="partner_ship_single_items">
                            <div class="company_logo">
                                <img src="<?php echo $partner_item['partner_single_image']['url']; ?>" alt="">
                            </div>
                            <div class="content">
                                <p><?php echo $partner_item['partner_single_content']; ?></p>
                            </div>
                            <div class="user_name_profile ">
                                <div class="reviewer_name">
                                    <a href="<?php echo $partner_item['partner_button_url']['url']; ?>" title=""><?php echo $partner_item['partner_button_text']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End partner_ship single Items -->

                    <?php } ?>

                    
                    



                </div>
            </div>
        </section>
        <!-- End partner_ship Section -->






<?php 
		

    }



}

plugin::instance()->widgets_manager->register_widget_type( new PartnerSectionWidget);