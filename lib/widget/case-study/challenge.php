<?php 


// Challenge case study widget

namespace Elementor;


class ChallengeWidget extends Widget_Base{


    public function get_name() {
        return "challenge-widget";
    }

	public function get_title() {
        return "Challenge Case Study";
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
			'challenge_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //subTitle
        $this->add_control(
			'challenge_sub_title',
			[
				'label' => __( 'Sub Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Challenge', 'corl' ),
				'placeholder' => __( 'Type Sub Title here', 'corl' ),
			]
		);

        //Title
        $this->add_control(
			'challenge_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Bootstrapped Bridger was<br> already turning a revenue.', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        //image
        $this->add_control(
			'challenge_image',
			[
				'label' => __( 'Upload image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				
			]
		);

        //logo
        $this->add_control(
			'challenge_logo',
			[
				'label' => __( 'Upload logo', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				
			]
		);

        //type

        $this->add_control(
			'challenge_type',
			[
				'label' => __( 'Type', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'B2B', 'corl' ),
				'placeholder' => __( 'Type Type here', 'corl' ),
				
			]
		);

        //website

        $this->add_control(
			'challenge_website_url',
			[
				'label' => __( 'Website URL', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'www.collective.com', 'corl' ),
				'placeholder' => __( 'Type url here', 'corl' ),
				
			]
		);

        //content
        $this->add_control(
			'challenge_description',
			[
				'label' => __( 'Content', 'corl' ),
				'type' => Controls_Manager::WYSIWYG,
			]
		);



        

        


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $challenge_sub_title = $settings['challenge_sub_title'];
        $challenge_title = $settings['challenge_title'];
        $challenge_image = $settings['challenge_image']['url'];
        $challenge_logo = $settings['challenge_logo']['url'];
        $challenge_type = $settings['challenge_type'];
        $challenge_website_url = $settings['challenge_website_url'];
        $challenge_description = $settings['challenge_description'];

    
       
        ?>

<section class="capital_opportunities">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <div class="capital_opportunities_title">
                            <span><?php echo $challenge_sub_title; ?></span>
                            <h2 class="m-0"><?php echo $challenge_title; ?></h2>
                            <div class="capital_banner_wrapper">
                                <?php if($challenge_image){echo '<img src="'.$challenge_image.'" alt="" class="img-fluid">';} ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="opportunities_right">
                            <div class="case_study_info d-flex">
                                <ul>
                                    <li>Logo</li>
                                    <li><?php if($challenge_logo){echo '<img src="'.$challenge_logo.'" alt="">';} ?></li>
                                </ul>
                                <ul>
                                    <li>Type</li>
                                    <li><?php echo $challenge_type; ?></li>
                                </ul>
                                <ul>
                                    <li>Website</li>
                                    <li><?php echo $challenge_website_url; ?></li>
                                </ul>
                            </div>
                            <div class="opportunitie_two_content">
                                <p><?php echo $challenge_description; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
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

plugin::instance()->widgets_manager->register_widget_type( new ChallengeWidget);