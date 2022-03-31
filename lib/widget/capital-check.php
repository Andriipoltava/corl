<?php 


// Capital check widget here



namespace Elementor;


class CapitalCheckWidget extends Widget_Base{


    public function get_name() {
        return "capital-check";
    }

	public function get_title() {
        return "Capital Check";
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
			'capital_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //Title
        $this->add_control(
			'capital_check_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Enter an amount and see how much capital you can access today', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        // Description
        $this->add_control(
			'capital_check_html',
			[
				'label' => __( 'Code', 'corl' ),
				'type' => Controls_Manager::CODE,
			]
		);

        
        



		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $capital_check_title = $settings['capital_check_title'];
        $capital_check_html = $settings['capital_check_html'];

    
       
        ?>

     <!-- Start Why Corl Section -->
     <section class=" calculator">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="section_heading">
                                <h2 class="m-0"><?php echo  $capital_check_title; ?></h2>
                            </div>
                        </div>
                    </div>


                    <?php echo $capital_check_html; ?>

 <div class="row">
                <!-- Start Why Corl Single Items -->
                <div class="col-12 col-md-12 col-lg-12">
                    <div class=" amount_chart_box row">
                        <div class="form_wrapper col-md-6 ">
                            <!-- Start revenue calculate form -->
                            
                                <div class="single_input">
                                    <h4 class="m-0">Monthly Revenue</h4>
                                    <div class="input-icon-wrap">
                                        <span class="input-icon">$</span>
                                        <input type="number" id="monthly-revenue" class="input-with-icon"  min="0" step="10000" placeholder="50,000" value="50000">
                                    </div>
                                </div>
                                <div class="single_input">
                                    <h4 class="m-0">Growth Rate <span class="title_growth_rate">(Annual)</span></h4>
                                    <div class="range-slider d-flex align-items-center">
                                        <input class="range-slider__range" type="range" value="25" min="0" max="100">
                                        
                                        <div class="slider_value">
                                            <div class="value_icon">%</div>
                                            <input type="hidden" id="growth-range" value="25">
                                            <span id="growth-rate" class="range-slider__value">25</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="single_input">
                                    <h4 class="m-0">Company Valuation</h4>
                                    <div class="input-icon-wrap">
                                        <span class="input-icon">$</span>
                                        <input type="number" id="company-valuation" class="input-with-icon" min="0" step="1000000" placeholder="50,00,000" value="5000000">
                                    </div>
                                </div>
                                <div class="single_input">
                                    <h4 class="m-0">Financing Amount</h4>
                                    <div class="input-icon-wrap">
                                        <span class="input-icon">$</span>
                                        <input type="number" id="financing-amount" class="input-with-icon" min="0" step="100000" placeholder="1,00,000" value="100000">
                                    </div>
                                </div>

                                <div class="checkCalculation"><button  id="checkbutton" class="check_button_style text-white">Check</button></div>
                            
                            <!-- Check terms -->
                            <div class="terms">
                                <h4>Terms</h4>
                                <div class="check_items d-flex justify-content-between">
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <div class="icon"><img src="https://devemon.com/projects/corl-wp/wp-content/themes/corl/assets/images/icons/check 1.png" alt=""></div>No
                                            fixed repayment date
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="icon"><img src="https://devemon.com/projects/corl-wp/wp-content/themes/corl/assets/images/icons/check 1.png" alt=""></div>No
                                            equity
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <div class="icon"><img src="https://devemon.com/projects/corl-wp/wp-content/themes/corl/assets/images/icons/check 1.png" alt=""></div>No
                                            personal guarantee
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="icon"><img src="https://devemon.com/projects/corl-wp/wp-content/themes/corl/assets/images/icons/check 1.png" alt=""></div>No
                                            hidden costs
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- End revenue calculate form -->
                        </div>

                        <!-- Revenue Chart Area -->
                        <div class="chart_wrapper col-md-6">
                            <div class="chart_area  ">
                                  <div style="height: 500px;">
                                    <canvas id="myChart"></canvas>
                                  </div>

                                  <p class="chart_save_value" >You would save <span id="savingsnumber">$31,777</span> by taking capital from Corl</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                    <div class="phone_chart_box  d-md-none d-lg-none pt-5 pb-5">

                        <div class="row">
                            <div class="col-12 ">
                                <div class="form_wrapper">
                                    <!-- Start revenue calculate form -->
                                    <form action="">
                                        <div class="single_input text-center">
                                            <h4 class="m-0">How much capital do you need?</h4>
                                            <div class="input-icon-wrap">
                                                <span class="input-icon">$</span>
                                                <input type="number" class="input-with-icon" placeholder="50,000">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h4>How will you spend it?</h4>
                                            <div class="chouse_option">
                                                <p>
                                                    <input type="radio" id="test1" name="radio-group" checked="">
                                                    <label for="test1">Buy more adds</label>
                                                </p>
                                                <p>
                                                    <input type="radio" id="test2" name="radio-group">
                                                    <label for="test2">Expand my team</label>
                                                </p>
                                                <p>
                                                    <input type="radio" id="test3" name="radio-group">
                                                    <label for="test3">Purchase Inventory</label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class=" text-center">
                                            <a href="" class="check_button_style text-white">Check</a>
                                        </div>
                                    </form>
                                    <!-- End revenue calculate form -->

                                    <!-- Check terms -->
                                    <div class="terms">
                                        <h4>Terms</h4>
                                        <div class="check_items d-flex justify-content-between">
                                            <ul>
                                                <li class="d-flex align-items-center">
                                                    <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/check 1.png" alt=""></div>No fixed repayment date</li>
                                                <li class="d-flex align-items-center">
                                                    <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/check 1.png" alt=""></div>No equity</li>
                                                <li class="d-flex align-items-center">
                                                    <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/check 1.png" alt=""></div>No personal gurantee</li>
                                                <li class="d-flex align-items-center">
                                                    <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/check 1.png" alt=""></div>No hidden costs</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Check terms -->
                                    <div class="your_offer text-center">
                                        <h5 class="offer-title">Your offer</h5>
                                        <div class="offters_count">
                                            <ul>
                                                <li class="d-flex align-items-center justify-content-between">
                                                    <div class="offer_title">Amount</div><span>$30000</span></li>
                                                <li class="d-flex align-items-center justify-content-between">
                                                    <div class="offer_title">Amount</div><span>$30000</span></li>
                                                <li class="d-flex align-items-center justify-content-between">
                                                    <div class="offer_title">Amount</div><span>$30000</span></li>
                                            </ul>
                                            <div class="check_eligibility text-center">
                                                <a href="" class="check_button_style text-white">Check eligibility</a>
                                            </div>
                                            <div class="get_started_btn text-center">
                                                <a href="">Get Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <div class="revenue_shapes">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/footer-shape-1.png" alt="" class="revenue_one">
                </div>
                <div class="fish_shape_wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_1.png" alt="" class="fist_right_to_left fist_right_to_left_1">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_2.png" alt="" class="fist_right_to_left fist_right_to_left_2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_3.png" alt="" class="fist_right_to_left fist_right_to_left_3">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_4.png" alt="" class="fist_right_to_left fist_right_to_left_4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_5.png" alt="" class="fist_right_to_left fist_right_to_left_5">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_6.png" alt="" class="fist_right_to_left fist_right_to_left_6">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_7.png" alt="" class="fist_right_to_left fist_right_to_left_7">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_8.png" alt="" class="fist_right_to_left fist_right_to_left_8">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_9.png" alt="" class="fist_right_to_left fist_right_to_left_9">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_10.png" alt="" class="fist_right_to_left fist_right_to_left_10">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_11.png" alt="" class="fist_right_to_left fist_right_to_left_11">
                </div> 
            </section>











<?php 
		

    }



}

plugin::instance()->widgets_manager->register_widget_type( new CapitalCheckWidget);