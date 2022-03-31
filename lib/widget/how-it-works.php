<?php 


// how it works widget here



namespace Elementor;


class HowitWorksWidget extends Widget_Base{


    public function get_name() {
        return "how-it-works";
    }

	public function get_title() {
        return "How it Works";
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
			'howitworks_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //Title
        $this->add_control(
			'how_it_works_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'How it works', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        // Description
        $this->add_control(
			'how_it_works_description',
			[
				'label' => __( 'Description', 'corl' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Scale your business and access growth capital without giving up ownership.', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
			'single_how_works_number', [
				'label' => esc_html__( 'Number', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '01' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'single_how_works_icon', [
				'label' => esc_html__( 'Upload Icon/Image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'single_how_works_sub_title', [
				'label' => esc_html__( 'Sub Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Complete' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'single_how_works_title', [
				'label' => esc_html__( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Aplication' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'single_how_works_description', [
				'label' => esc_html__( 'Description', 'corl' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Distracted by the readable content of a looking at its layout.' , 'corl' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'howworks_list',
			[
				'label' => esc_html__( 'How Works List', 'corl' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ single_how_works_title }}}',
			]
		);






        



		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $how_it_works_title = $settings['how_it_works_title'];
        $how_it_works_description = $settings['how_it_works_description'];
        $howworks_list = $settings['howworks_list'];


    
       
        ?>

<!-- how it works Section -->
<section class="how_it_work">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="section_heading">
                                <h2 class="m-0"><?php echo $how_it_works_title; ?></h2>
                                <p><?php echo $how_it_works_description;?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                    <?php foreach($howworks_list as $howworks_item){  ?>
                        <!-- Start Why Corl Single Items -->
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="why_corl_single_items">
                                <div class="item_number"><?php echo $howworks_item['single_how_works_number']; ?></div>
                                <div class="title_icon ">
                                    <?php 
                                        $icons = $howworks_item['single_how_works_icon']['url'];

                                        if($icons){

                                        
                                    ?>
                                    <div class="icons">
                                        <div class="icon_animate icon_1">
                                            <img src="<?php echo $icons; ?>" alt="aplication icon">
                                        </div>
                                        <div class="icon_animate icon_2">
                                            <img src="<?php echo $icons; ?>" alt="aplication icon">
                                        </div>
                                    </div>

                                    <?php } ?>

                                    <div class="item_title">
                                        <span><?php echo $howworks_item['single_how_works_sub_title']; ?></span>
                                        <h4 class="title m-0"><?php echo $howworks_item['single_how_works_title']; ?></h4>
                                    </div>
                                </div>
                                <div class="content">
                                    <p><?php echo $howworks_item['single_how_works_description']; ?></p>
                                </div>
                            </div>
                        </div>

                    <?php } ?>







                    </div>
                </div>
            </section>


            </div>




<?php 
		



    }



}

plugin::instance()->widgets_manager->register_widget_type( new HowitWorksWidget);