<?php


// compare table widget here

namespace Elementor;


class CompareTableWidget extends Widget_Base
{


    public function get_name()
    {
        return "compare-table-widget";
    }

    public function get_title()
    {
        return "Compare Table";
    }

    public function get_icon()
    {
        return "eicon-favorite";
    }

    public function get_categories()
    {
        return ['corl-theme'];
    }


    //public function get_script_depends() {}

    //public function get_style_depends() {}

    protected function register_controls()
    {

        $this->start_controls_section(
            'compare_table_section',
            [
                'label' => __('Content', 'corl'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        //Title
        $this->add_control(
            'compare_table_title',
            [
                'label' => __('Title', 'corl'),
                'type' => Controls_Manager::TEXT,
                'default' => __('How do we compare?', 'corl'),
                'placeholder' => __('Type Title here', 'corl'),
            ]
        );


        $this->add_control(
            'compare_table_buttton_text',
            [
                'label' => __('Button Text', 'corl'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Let\'s Grow', 'corl'),
            ]
        );

        $this->add_control(
            'compare_table_buttton_url',
            [
                'label' => __('Button URL', 'corl'),
                'type' => Controls_Manager::URL,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'compare_table_single_item_one',
            [
                'label' => __('First Column Items', 'corl'),
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
                    'textAndIcon' => [
                        'title' => esc_html__('Text and Icon', 'corl'),
                        'icon' => 'fa  fa-icons',
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
                'dynamic' => ['active' => true],
                'condition' => [
                    'first_colunm_text_icon' => ['textcell', 'textAndIcon'],
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
                    'first_colunm_text_icon' => ['iconcell', 'textAndIcon'],
                ],
            ]
        );

        $repeater->add_control(
            '1st_column_icon_color',
            [
                'label' => esc_html__('Icon Color', 'corl'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .icon' => 'color: {{VALUE}}',
                ],


            ]
        );
        $repeater->add_control(
            '1st_icon_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Icon Padding', 'corl'),
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $repeater->add_control(
            '1st_column_position_textAndIcon',
            [
                'label' => esc_html__('Position', 'corl'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'icon_top' => [
                        'title' => esc_html__('Icon Top', 'corl'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'icon_left' => [
                        'title' => esc_html__('Icon Left', 'corl'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'icon_right' => [
                        'title' => esc_html__('Icon Right', 'corl'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'icon_top',
                'toggle' => true,
                'condition' => [
                    'first_colunm_text_icon' => ['textAndIcon'],
                ],
            ]
        );


        $this->add_control(
            'first_list',
            [
                'label' => esc_html__('Cloumn List', 'corl'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ first_colunm_text_icon }}}',
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'compare_table_single_item_two',
            [
                'label' => __('Second Column Items', 'corl'),
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
                    'secondtextAndIcon' => [
                        'title' => esc_html__('Text and Icon', 'corl'),
                        'icon' => 'fa  fa-icons',
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
                'dynamic' => ['active' => true],
                'condition' => [
                    'second_colunm_text_icon' => ['secondtextcell', 'secondtextAndIcon'],
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
                    'second_colunm_text_icon' => ['secondiconcell', 'secondtextAndIcon'],
                ],
            ]
        );
        $repeater2->add_control(
            '2st_column_icon_color',
            [
                'label' => esc_html__('Icon Color', 'corl'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .icon' => 'color: {{VALUE}}',
                ],


            ]
        );
        $repeater2->add_control(
            '2st_title_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Icon Padding', 'corl'),
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $repeater2->add_control(
            '2st_column_position_textAndIcon',
            [
                'label' => esc_html__('Position', 'corl'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'icon_top' => [
                        'title' => esc_html__('Icon Top', 'corl'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'icon_left' => [
                        'title' => esc_html__('Icon Left', 'corl'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'icon_right' => [
                        'title' => esc_html__('Icon Right', 'corl'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'icon_left',
                'toggle' => true,
                'condition' => [
                    'second_colunm_text_icon' => ['secondtextAndIcon'],
                ],
            ]
        );


        $this->add_control(
            'second_list',
            [
                'label' => esc_html__('Second Cloumn List', 'corl'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'title_field' => '{{{ second_colunm_text_icon }}}',
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'compare_table_single_item_threee',
            [
                'label' => __('Third Column Items', 'corl'),
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
                    'thirdtextAndIcon' => [
                        'title' => esc_html__('Text and Icon', 'corl'),
                        'icon' => 'fa  fa-icons',
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
                'dynamic' => ['active' => true],
                'condition' => [
                    'third_colunm_text_icon' => ['thirdtextcell', 'thirdtextAndIcon'],
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
                    'third_colunm_text_icon' => ['thirdiconcell', 'thirdtextAndIcon'],
                ],
            ]
        );
        $repeater3->add_control(
            '3st_column_icon_color',
            [
                'label' => esc_html__('Icon Color', 'corl'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .icon' => 'color: {{VALUE}}',
                ],


            ]
        );
        $repeater3->add_control(
            '3st_title_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Icon Padding', 'corl'),
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $repeater3->add_control(
            '3st_column_position_textAndIcon',
            [
                'label' => esc_html__('Position', 'corl'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'icon_top' => [
                        'title' => esc_html__('Icon Top', 'corl'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'icon_left' => [
                        'title' => esc_html__('Icon Left', 'corl'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'icon_right' => [
                        'title' => esc_html__('Icon Right', 'corl'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'icon_top',
                'toggle' => true,
                'condition' => [
                    'third_colunm_text_icon' => ['thirdtextAndIcon'],
                ],
            ]
        );


        $this->add_control(
            'third_list',
            [
                'label' => esc_html__('Third Cloumn List', 'corl'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater3->get_controls(),
                'title_field' => '{{{ third_colunm_text_icon }}}',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'compare_table_single_item_fourth',
            [
                'label' => __('Fourth Column Items', 'corl'),
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
                    'fourthtextAndIcon' => [
                        'title' => esc_html__('Text and Icon', 'corl'),
                        'icon' => 'fa  fa-icons',
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
                'dynamic' => ['active' => true],
                'condition' => [
                    'fourth_colunm_text_icon' => ['fourthtextcell', 'fourthtextAndIcon'],
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
                    'fourth_colunm_text_icon' => ['fourthiconcell', 'fourthtextAndIcon'],
                ],
            ]
        );
        $repeater4->add_control(
            '4st_column_icon_color',
            [
                'label' => esc_html__('Icon Color', 'corl'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .icon' => 'color: {{VALUE}}',
                ],


            ]
        );
        $repeater4->add_control(
            '4st_title_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Icon Padding', 'corl'),
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $repeater4->add_control(
            '4st_column_position_textAndIcon',
            [
                'label' => esc_html__('Position', 'corl'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                        'icon_top' => [
                    'title' => esc_html__('Icon Top', 'corl'),
                    'icon' => 'eicon-v-align-top',
                ],
                    'icon_left' => [
                        'title' => esc_html__('Icon Left', 'corl'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'icon_right' => [
                        'title' => esc_html__('Icon Right', 'corl'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'icon_top',
                'toggle' => true,
                'condition' => [
                    'fourth_colunm_text_icon' => ['fourthtextAndIcon'],
                ],
            ]
        );


        $this->add_control(
            'fourth_list',
            [
                'label' => esc_html__('Fourth Cloumn List', 'corl'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater4->get_controls(),
                'title_field' => '{{{ fourth_colunm_text_icon }}}',
            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {

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
                            <h2 class="m-0"><?php echo $compare_table_title; ?></h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="table_scroll">
                            <div class="compare_table">
                                <div class="signle_items">
                                    <ul>
                                        <?php foreach ($first_list as $first_item) {
                                            $text_item = $first_item['1st_column_cell_item_text'];
                                            $icon_item = $first_item['1st_column_cell_item_icon'];
                                            $icon_item = $icon_item ? '<i  class="icon ' . $icon_item['value'] . '"></i>' : '';
                                            if ($first_item['first_colunm_text_icon'] == 'textAndIcon') {
                                                echo '<li class="elementor-repeater-item-' . $first_item['_id'] . ' '.($first_item['1st_column_position_textAndIcon'] == 'icon_top'?"flex-column":"").'">';
                                                if ($first_item['1st_column_position_textAndIcon'] == 'icon_right') {
                                                    echo $text_item . $icon_item;
                                                } else {
                                                    echo $icon_item . $text_item;
                                                }
                                                echo '</li>';
                                            } elseif ($text_item) {
                                                echo '<li>' . $text_item . '</li>';
                                            } elseif ($icon_item) {
                                                echo '<li>' . $icon_item . '</li>';
                                            } else {
                                                echo '<li></li>';
                                            }

                                        } ?>


                                    </ul>
                                </div>

                                <div class="signle_items">
                                    <ul>
                                        <?php foreach ($second_list as $second_item) {

                                            $second_text_item = $second_item['second_column_cell_item_text'];
                                            $second_icon_item = $second_item['second_column_cell_item_icon'];
                                            $second_icon_item = $second_icon_item ? '<i  class="icon ' . $second_icon_item['value'] . '"></i>' : '';

                                            if ($second_item['second_colunm_text_icon'] == 'secondtextAndIcon') {
                                                echo '<li class="elementor-repeater-item-' . $second_item['_id'] . ' '.($second_item['2st_column_position_textAndIcon'] == 'icon_top'?"flex-column":"").'">';
                                                if ($second_item['2st_column_position_textAndIcon'] == 'icon_right') {
                                                    echo $second_text_item . $second_icon_item;
                                                } else {
                                                    echo $second_icon_item . $second_text_item;
                                                }
                                                echo '</li>';
                                            } elseif ($second_text_item) {
                                                echo '<li>' . $second_text_item . '</li>';
                                            } elseif ($second_icon_item) {
                                                echo '<li>' . $second_icon_item . '</li>';
                                            } else {
                                                echo '<li></li>';
                                            }


                                        } ?>
                                    </ul>
                                </div>

                                <div class="signle_items">
                                    <ul>
                                        <?php foreach ($third_list as $third_item) {

                                            $third_text_item = $third_item['third_column_cell_item_text'];
                                            $third_icon_item = $third_item['third_column_cell_item_icon'];
                                            $third_icon_item = $third_icon_item ? '<i  class="icon ' . $third_icon_item['value'] . '"></i>' : '';

                                            if ($third_item['third_colunm_text_icon'] == 'thirdtextAndIcon') {
                                                echo '<li class="elementor-repeater-item-' . $third_item['_id'] . ' '.($third_item['3st_column_position_textAndIcon'] == 'icon_top'?"flex-column":"").'">';
                                                if ($third_item['3st_column_position_textAndIcon'] == 'icon_right') {
                                                    echo $third_text_item . $third_icon_item;
                                                }  else {
                                                    echo $third_icon_item . $third_text_item;
                                                }
                                                echo '</li>';
                                            } elseif ($third_text_item) {
                                                echo '<li>' . $third_text_item . '</li>';
                                            } elseif ($third_icon_item) {
                                                echo '<li>' . $third_icon_item . '</li>';
                                            } else {
                                                echo '<li></li>';
                                            }


                                        } ?>
                                    </ul>
                                </div>

                                <div class="signle_items">
                                    <ul>
                                        <?php foreach ($fourth_list as $fourth_item) {

                                            $fourth_text_item = $fourth_item['fourth_column_cell_item_text'];
                                            $fourth_icon_item = $fourth_item['fourth_column_cell_item_icon'];
                                            $fourth_icon_item = $fourth_icon_item ? '<i  class="icon ' . $fourth_icon_item['value'] . '"></i>' : '';

                                            if ($fourth_item['fourth_colunm_text_icon'] == 'fourthtextAndIcon') {
                                                echo '<li class="elementor-repeater-item-' . $fourth_item['_id'] . ' '.($fourth_item['4st_column_position_textAndIcon'] == 'icon_top'?"flex-column":"").'">';
                                                if ($fourth_item['4st_column_position_textAndIcon'] == 'icon_right') {
                                                    echo $fourth_text_item . $fourth_icon_item;
                                                }  else {
                                                    echo $fourth_icon_item . $fourth_text_item;
                                                }
                                                echo '</li>';
                                            } elseif ($fourth_text_item) {
                                                echo '<li>' . $fourth_text_item . '</li>';
                                            } elseif ($fourth_icon_item) {
                                                echo '<li>' . $fourth_icon_item . '</li>';
                                            } else {
                                                echo '<li></li>';
                                            }


                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 text-center">
                        <?php if ($compare_table_buttton_text) { ?>
                            <div class="button_style">
                                <a href="<?php echo $compare_table_buttton_url; ?>"
                                   class="button_style_1"><?php echo $compare_table_buttton_text; ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End How It Works Section -->


        <?php


    }


}

plugin::instance()->widgets_manager->register_widget_type(new CompareTableWidget);