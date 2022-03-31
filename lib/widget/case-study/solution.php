<?php 


// Solution widget

namespace Elementor;


class SolutionWidget extends Widget_Base{


    public function get_name() {
        return "solution-widget";
    }

	public function get_title() {
        return "Solution";
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
			'solution_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //subTitle
        $this->add_control(
			'solution_sub_title',
			[
				'label' => __( 'Sub Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Solution', 'corl' ),
				'placeholder' => __( 'Type Sub Title here', 'corl' ),
			]
		);

        //title
        $this->add_control(
			'solution_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Bootstrapped Bridger was already turning a revenue.', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        //content
        $this->add_control(
			'solution_first_content',
			[
				'label' => __( 'Content', 'corl' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Corl provided Bridger with growth capital to build its core team and bring on new hires. This in return, allowed the company to take on more projects and expand its business.', 'corl' ),
				'placeholder' => __( 'Type Content here', 'corl' ),
			]
		);

        // sigle item

        $repeater = new Repeater();

        $repeater->add_control(
			'solution_single_icon', [
				'label' => esc_html__( 'Upload Icon', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'solution_single_title', [
				'label' => esc_html__( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Use of funds' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'solution_single_sub_title', [
				'label' => esc_html__( 'Sub Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Hiring' , 'corl' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'solution_list',
			[
				'label' => esc_html__( 'Solution List', 'corl' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ solution_single_title }}}',
			]
		);

        //content
        $this->add_control(
			'solution_bottom_content',
			[
				'label' => __( 'Bottom Content', 'corl' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Bridger is just getting started; they plan to become a global competitor to the top 5 major firms that exist today.', 'corl' ),
				'placeholder' => __( 'Type Content here', 'corl' ),
			]
		);




    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $solution_sub_title = $settings['solution_sub_title'];
        $solution_title = $settings['solution_title'];
        $solution_first_content = $settings['solution_first_content'];
        $solution_list = $settings['solution_list'];
        $solution_bottom_content = $settings['solution_bottom_content'];
       

    
       
        ?>

<section class="how_it_works case_study_works">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="section_title">
                            <span><?php  echo $solution_sub_title; ?></span>
                            <h2 class="m-0"><?php echo $solution_title; ?></h2>
                            <p><?php echo $solution_first_content; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex flex-wrap how_work_three_four justify-content-between work_single_item_wrapper">


                     <?php foreach($solution_list as $solution_single_item){ ?>


                    <!-- Start how_it_works Single Items -->
                    <div class="how_it_works_single_items  text-center elementor-repeater-item-<?php echo esc_attr( $revenue_single_item['_id'] ) ?>">
                        <div class="icon">
                            <img src="<?php echo $solution_single_item['solution_single_icon']['url']; ?>" alt="">
                        </div>
                        <div class="content">
                            <p><?php echo $solution_single_item['solution_single_title']; ?></p>
                            <h4 class="title m-0"><?php echo $solution_single_item['solution_single_sub_title']; ?></h4>
                        </div>
                    </div>
                    <!-- End how_it_works Single Items -->
                    <?php } ?>

                   
                </div>
                <div class="col-12">
                    <div class="case_study_works_bottom text-center">
                        <p><?php echo $solution_bottom_content; ?></p>
                    </div>
                </div>
            </div>
        </section>




<?php 
		

    }



}

plugin::instance()->widgets_manager->register_widget_type( new SolutionWidget);