<?php 


// why chooes revenue section widget here

namespace Elementor;


class whyRevenueWidget extends Widget_Base{


    public function get_name() {
        return "why-revenue-widget";
    }

	public function get_title() {
        return "Why Revenue";
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
			'whyrevenue_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //Title
        $this->add_control(
			'why_revenue_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Why choose revenue-based financing?', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

       

        // sigle item

        $repeater = new Repeater();


        $repeater->add_control(
			'why_revenue_single_icon', [
				'label' => esc_html__( 'Upload Icon/image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'why_revenue_single_title', [
				'label' => esc_html__( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Aligned Interests' , 'corl' ),
				'label_block' => true,
			]
		);


        $repeater->add_control(
			'why_revenue_single_description', [
				'label' => esc_html__( 'Content', 'corl' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'With revenue sharing, we grow as you grow -no equity, no control, no personal guarantees, no fees, no nonsense
                ' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'why_revenue_single_icon_color',
			[
				'label' => esc_html__( 'Icon BG Color', 'realput' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .title_icon .icon' => 'background: {{VALUE}}'
				],
			]
		);

       

        $this->add_control(
			'why_revenue_list',
			[
				'label' => esc_html__( 'Why Revenue List', 'corl' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ why_revenue_single_title }}}',
			]
		);

        


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $why_revenue_title = $settings['why_revenue_title'];
        $why_revenue_list = $settings['why_revenue_list'];

    
       
        ?>

<section class="why_choose">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="section_title">
                            <h2 class="m-0"><?php echo $why_revenue_title;  ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                <?php foreach($why_revenue_list as $revenue_single_item){ ?>
                    <!-- Start Why Corl Single Items -->
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="why_corl_single_items elementor-repeater-item-<?php echo esc_attr( $revenue_single_item['_id'] ) ?>">
                            <div class="title_icon d-flex flex-wrap align-items-center">
                                <div class="icon">
                                    <img src="<?php echo $revenue_single_item['why_revenue_single_icon']['url']; ?>" alt="">
                                </div>
                                <h4 class="title m-0"><?php echo $revenue_single_item['why_revenue_single_title']; ?></h4>
                            </div>
                            <div class="content">
                                <p><?php echo $revenue_single_item['why_revenue_single_description']; ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- End Why Corl Single Items -->

                    <?php } ?>

                   

                    
                </div>


            </div>
        </section>







<?php 
		

    }



}

plugin::instance()->widgets_manager->register_widget_type( new whyRevenueWidget);