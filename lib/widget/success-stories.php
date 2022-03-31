<?php 


// Success Stories widget here



namespace Elementor;


class SuccessStoriesWidget extends Widget_Base{


    public function get_name() {
        return "success-stories";
    }

	public function get_title() {
        return "Succes Stories";
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
			'suceess_stories_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Success stories', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        // sigle item

        $repeater = new Repeater();


        $repeater->add_control(
			'sucess_stories_single_icon', [
				'label' => esc_html__( 'Upload Icon/Image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'sucess_stories_single_title', [
				'label' => esc_html__( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Collective' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'sucess_stories_single_description', [
				'label' => esc_html__( 'Description', 'corl' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem Ipsum has been the dmy industry\'s standard dummy. ' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'sucess_stories_single_buton_text', [
				'label' => esc_html__( 'Button Text', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'collective.com' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'sucess_stories_single_buton_url', [
				'label' => esc_html__( 'Button URL', 'corl' ),
				'type' => Controls_Manager::URL,
			]
		);

        $this->add_control(
			'sucess_stories_list',
			[
				'label' => esc_html__( 'Sucess Client List', 'corl' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ sucess_stories_single_title }}}',
			]
		);

        // button

        $this->add_control(
			'suceess_stories_button_text',
			[
				'label' => __( 'Button Text', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Get started', 'corl' ),
			]
		);

        $this->add_control(
			'suceess_stories_button_url',
			[
				'label' => __( 'Button URL', 'corl' ),
				'type' => Controls_Manager::URL,
			]
		);


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $suceess_stories_title = $settings['suceess_stories_title'];
        $sucess_stories_list = $settings['sucess_stories_list'];
        $suceess_stories_button_text = $settings['suceess_stories_button_text'];
        $suceess_stories_button_url = $settings['suceess_stories_button_url']['url'];

    
       
        ?>

<section class="success_stories">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="section_title">
                                <h2 class="m-0"><?php echo $suceess_stories_title;?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="row success_stories_wrapper">



                    <?php foreach( $sucess_stories_list as $single_item ) { ?>
                        <!-- Start success stories Single Items -->
                        <div class="success_stories_single_items text-center">
                            <div class="stories_item_wrapper">
                                <div class="icon">
                                    <img src="<?php echo $single_item['sucess_stories_single_icon']['url']; ?>" alt="">
                                </div>
                                <div class="content">
                                    <h4 class="title m-0"><?php echo $single_item['sucess_stories_single_title']; ?></h4>
                                    <p><?php echo $single_item['sucess_stories_single_description']; ?></p>
                                    <span><a href="<?php echo $single_item['sucess_stories_single_buton_url']['url']; ?>" title=""><?php echo $single_item['sucess_stories_single_buton_text']; ?></a></span>
                                </div>
                            </div>
                        </div>
                        <!-- End success stories Single Items -->
                        <?php } ?>

                        

                        

                        

                        

                       
                        <div class="button_style">
                            <a href="<?php echo $suceess_stories_button_url;?>" class="button_style_1"><?php echo $suceess_stories_button_text;?></a>
                        </div>
                    </div>

                </div>
                <div class="story_shape">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/story-shape.png" alt="" class="shape_one">
                </div>
            </section>







<?php 
		

    }



}

plugin::instance()->widgets_manager->register_widget_type( new SuccessStoriesWidget);