<?php 


// compare table widget here

namespace Elementor;


class CompareTableWidget extends Widget_Base{


    public function get_name() {
        return "compare-table-widget";
    }

	public function get_title() {
        return "Compare Table";
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
			'compare_table_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //Title
        $this->add_control(
			'compare_table_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'How do we compare?', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);


        $this->add_control(
			'compare_table_buttton_text',
			[
				'label' => __( 'Button Text', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Let\'s Grow', 'corl' ),
			]
		);

        $this->add_control(
			'compare_table_buttton_url',
			[
				'label' => __( 'Button URL', 'corl' ),
				'type' => Controls_Manager::URL,
			]
		);


    


		$this->end_controls_section();

        $this->start_controls_section(
			'compare_table_single_item_one',
			[
				'label' => __( 'First Column Items', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        

        

        // here all first colum items
        $repeater = new \Elementor\Repeater();

		


        $repeater->add_control(
            'first_colunm_text_icon',
            [
                'label' => esc_html__('Text or Icon', 'corl'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'none' => [
                        'title' => esc_html__('None', 'corl'),
                        'icon' => 'fa fa-ban',
                    ],
                    'textcell' => [
                        'title' => esc_html__('Text', 'corl'),
                        'icon' => 'eicon-number-field',
                    ],
                    'iconcell' => [
                        'title' => esc_html__('Icon', 'corl'),
                        'icon' => 'fa fa-info-circle',
                    ],
                    
                ],
                'default' => 'text',
                'toggle' => true,
            ]
        );

        

        $repeater->add_control(
            '1st_column_cell_item_text',
            [
                'label' => esc_html__('Text', 'corl'),
                'type' => Controls_Manager::TEXT,
                'dynamic'     => [ 'active' => true ],
                'condition' => [
                    'first_colunm_text_icon' => 'textcell',
                ],
            ]
        );

        $repeater->add_control(
            '1st_column_cell_item_icon',
            [
                'label' => esc_html__('Icon', 'corl'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'first_colunm_text_icon' => 'iconcell',
                ],
            ]
        );

		




		$this->add_control(
			'first_list',
			[
				'label' => esc_html__( 'Cloumn List', 'corl' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ first_colunm_text_icon }}}',
			]
		);




        

        $this->end_controls_section();


        $this->start_controls_section(
			'compare_table_single_item_two',
			[
				'label' => __( 'Second Column Items', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        // here all second colum items
        $repeater2 = new \Elementor\Repeater();

		


        $repeater2->add_control(
            'second_colunm_text_icon',
            [
                'label' => esc_html__('Text or Icon', 'corl'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'secondnone' => [
                        'title' => esc_html__('None', 'corl'),
                        'icon' => 'fa fa-ban',
                    ],
                    'secondtextcell' => [
                        'title' => esc_html__('Text', 'corl'),
                        'icon' => 'eicon-number-field',
                    ],
                    'secondiconcell' => [
                        'title' => esc_html__('Icon', 'corl'),
                        'icon' => 'fa fa-info-circle',
                    ],
                    
                ],
                'default' => 'text',
                'toggle' => true,
            ]
        );

        

        $repeater2->add_control(
            'second_column_cell_item_text',
            [
                'label' => esc_html__('Text', 'corl'),
                'type' => Controls_Manager::TEXT,
                'dynamic'     => [ 'active' => true ],
                'condition' => [
                    'second_colunm_text_icon' => 'secondtextcell',
                ],
            ]
        );

        $repeater2->add_control(
            'second_column_cell_item_icon',
            [
                'label' => esc_html__('Icon', 'corl'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'second_colunm_text_icon' => 'secondiconcell',
                ],
            ]
        );

		




		$this->add_control(
			'second_list',
			[
				'label' => esc_html__( 'Second Cloumn List', 'corl' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'title_field' => '{{{ second_colunm_text_icon }}}',
			]
		);

        

        $this->end_controls_section();


        $this->start_controls_section(
			'compare_table_single_item_threee',
			[
				'label' => __( 'Third Column Items', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        // here all 3rd colum items

        $repeater3 = new \Elementor\Repeater();

		


        $repeater3->add_control(
            'third_colunm_text_icon',
            [
                'label' => esc_html__('Text or Icon', 'corl'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'thirdnone' => [
                        'title' => esc_html__('None', 'corl'),
                        'icon' => 'fa fa-ban',
                    ],
                    'thirdtextcell' => [
                        'title' => esc_html__('Text', 'corl'),
                        'icon' => 'eicon-number-field',
                    ],
                    'thirdiconcell' => [
                        'title' => esc_html__('Icon', 'corl'),
                        'icon' => 'fa fa-info-circle',
                    ],
                    
                ],
                'default' => 'text',
                'toggle' => true,
            ]
        );

        

        $repeater3->add_control(
            'third_column_cell_item_text',
            [
                'label' => esc_html__('Text', 'corl'),
                'type' => Controls_Manager::TEXT,
                'dynamic'     => [ 'active' => true ],
                'condition' => [
                    'third_colunm_text_icon' => 'thirdtextcell',
                ],
            ]
        );

        $repeater3->add_control(
            'third_column_cell_item_icon',
            [
                'label' => esc_html__('Icon', 'corl'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'third_colunm_text_icon' => 'thirdiconcell',
                ],
            ]
        );

		




		$this->add_control(
			'third_list',
			[
				'label' => esc_html__( 'Third Cloumn List', 'corl' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater3->get_controls(),
				'title_field' => '{{{ third_colunm_text_icon }}}',
			]
		);

        

        $this->end_controls_section();

        $this->start_controls_section(
			'compare_table_single_item_fourth',
			[
				'label' => __( 'Fourth Column Items', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        // here all 4th colum items

        $repeater4 = new \Elementor\Repeater();

		


        $repeater4->add_control(
            'fourth_colunm_text_icon',
            [
                'label' => esc_html__('Text or Icon', 'corl'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'fourthnone' => [
                        'title' => esc_html__('None', 'corl'),
                        'icon' => 'fa fa-ban',
                    ],
                    'fourthtextcell' => [
                        'title' => esc_html__('Text', 'corl'),
                        'icon' => 'eicon-number-field',
                    ],
                    'fourthiconcell' => [
                        'title' => esc_html__('Icon', 'corl'),
                        'icon' => 'fa fa-info-circle',
                    ],
                    
                ],
                'default' => 'text',
                'toggle' => true,
            ]
        );

        

        $repeater4->add_control(
            'fourth_column_cell_item_text',
            [
                'label' => esc_html__('Text', 'corl'),
                'type' => Controls_Manager::TEXT,
                'dynamic'     => [ 'active' => true ],
                'condition' => [
                    'fourth_colunm_text_icon' => 'fourthtextcell',
                ],
            ]
        );

        $repeater4->add_control(
            'fourth_column_cell_item_icon',
            [
                'label' => esc_html__('Icon', 'corl'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'fourth_colunm_text_icon' => 'fourthiconcell',
                ],
            ]
        );

		




		$this->add_control(
			'fourth_list',
			[
				'label' => esc_html__( 'Fourth Cloumn List', 'corl' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater4->get_controls(),
				'title_field' => '{{{ fourth_colunm_text_icon }}}',
			]
		);

        

        $this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $compare_table_title = $settings['compare_table_title'];
        $compare_table_buttton_text = $settings['compare_table_buttton_text'];
        $compare_table_buttton_url = $settings['compare_table_buttton_url']['url'];

        
        $first_list = $settings['first_list'];
        $second_list = $settings['second_list'];
        $third_list = $settings['third_list'];
        $fourth_list = $settings['fourth_list'];

    
       
        ?>

        <!-- Start How It Works Section -->
        <section class="we_compare revene_compare">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="section_title">
                            <h2 class="m-0"><?php echo $compare_table_title;?></h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="table_scroll">
                            <div class="compare_table">
                                <div class="signle_items">
                                    <ul>

                                       <?php foreach($first_list as $first_item){

                                           $text_item = $first_item['1st_column_cell_item_text'];
                                           $icon_item = $first_item['1st_column_cell_item_icon'];
                                           if($text_item){
                                            echo '<li>'. $text_item.'</li>';
                                           }elseif($icon_item){
                                            echo '<li><i class="'. $icon_item['value'].'"></i></li>';
                                           }else{
                                            echo '<li></li>';
                                           }

                                           

                                            

                                       } ?>

                                        
                                    </ul>
                                </div>

                                <div class="signle_items">
                                    <ul>
                                    <?php foreach($second_list as $second_item){

                                        $second_text_item = $second_item['second_column_cell_item_text'];
                                        $second_icon_item = $second_item['second_column_cell_item_icon'];
                                        if($second_text_item){
                                        echo '<li>'. $second_text_item.'</li>';
                                        }elseif($second_icon_item){
                                        echo '<li><i class="'. $second_icon_item['value'].'"></i></li>';
                                        }else{
                                        echo '<li></li>';
                                        }



                                        

                                        } ?>
                                    </ul>
                                </div>

                                <div class="signle_items">
                                    <ul>
                                    <?php foreach($third_list as $third_item){

                                        $third_text_item = $third_item['third_column_cell_item_text'];
                                        $third_icon_item = $third_item['third_column_cell_item_icon'];
                                        if($third_text_item){
                                        echo '<li>'. $third_text_item.'</li>';
                                        }elseif($third_icon_item){
                                        echo '<li><i class="'. $third_icon_item['value'].'"></i></li>';
                                        }else{
                                        echo '<li></li>';
                                        }





                                        } ?>
                                    </ul>
                                </div>

                                <div class="signle_items">
                                    <ul>
                                    <?php foreach($fourth_list as $fourth_item){

                                        $fourth_text_item = $fourth_item['fourth_column_cell_item_text'];
                                        $fourth_icon_item = $fourth_item['fourth_column_cell_item_icon'];
                                        if($fourth_text_item){
                                        echo '<li>'. $fourth_text_item.'</li>';
                                        }elseif($fourth_icon_item){
                                        echo '<li><i class="'. $fourth_icon_item['value'].'"></i></li>';
                                        }else{
                                        echo '<li></li>';
                                        }





                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 text-center">
                        <?php if($compare_table_buttton_text){?>
                        <div class="button_style">
                            <a href="<?php echo $compare_table_buttton_url; ?>" class="button_style_1"><?php echo $compare_table_buttton_text; ?></a>
                        </div>
                        <?php }  ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End How It Works Section -->






<?php 
		

    }



}

plugin::instance()->widgets_manager->register_widget_type( new CompareTableWidget);