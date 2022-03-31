<?php 


// about Team widget



namespace Elementor;


class AboutTeamWidget extends Widget_Base{


    public function get_name() {
        return "aboutus-team-widget";
    }

	public function get_title() {
        return "Team Member";
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
			'team_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //Title
        $this->add_control(
			'team_section_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Meet Our Dedicated Heros', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        // sigle Team

        $repeater = new Repeater();

        $repeater->add_control(
			'team_memeber_image', [
				'label' => esc_html__( 'Upload Member Image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'team_member_name', [
				'label' => esc_html__( 'Member Name', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Mike Edward' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'team_member_desiganation', [
				'label' => esc_html__( 'Member Designation', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Chief Executive Officer & Director' , 'corl' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'team_list',
			[
				'label' => esc_html__( 'Team List', 'corl' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ team_member_name }}}',
			]
		);


        $this->add_control(
			'advisor_team_title',
			[
				'label' => __( 'Advisor Title(if have)', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Our Advisors', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        // sigle advisor Team

        $repeater2 = new Repeater();

        $repeater2->add_control(
			'advisor_memeber_image', [
				'label' => esc_html__( 'Upload Member Image', 'corl' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

        $repeater2->add_control(
			'advisor_member_name', [
				'label' => esc_html__( 'Member Name', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Mike Edward' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater2->add_control(
			'advisormember_desiganation', [
				'label' => esc_html__( 'Member Designation', 'corl' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Chief Executive Officer & Director' , 'corl' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'advisor_list',
			[
				'label' => esc_html__( 'Advisor List', 'corl' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'title_field' => '{{{ advisor_member_name }}}',
			]
		);





        

        


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $team_section_title = $settings['team_section_title'];
        $team_list = $settings['team_list'];

        $advisor_team_title = $settings['advisor_team_title'];
        $advisor_list = $settings['advisor_list'];

    
       
        ?>



<section class="our_team">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading">
                            <h2 class="m-0"><?php echo $team_section_title; ?></h2>
                        </div>
                    </div>


                    <?php foreach($team_list as $singleteam){ ?>

                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="team_single_member">
                             <div class="user_profile">
                                <img src="<?php echo $singleteam['team_memeber_image']['url']; ?>" alt="" class="img-fluid">
                            </div>
                            <div class="team_member_info">
                                <h4 class="name m-0"><?php echo $singleteam['team_member_name']; ?></h4>
                                <span><?php echo $singleteam['team_member_desiganation']; ?></span>
                            </div>
                        </div>
                    </div>

                    <?php } ?>

                    
                    

                    
                    

                    
                    

                    
                    

                   
                    

                </div>

                <?php if($advisor_team_title){ ?>

                <div class="row our_advisors">
                    <div class="col-12">
                        <div class="section_heading">
                            <h2 class="m-0"><?php echo $advisor_team_title; ?></h2>
                        </div>
                    </div>


                    <?php foreach($advisor_list as $singleadvisor){ ?>

                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="team_single_member">
                                <div class="user_profile">
                                    <img src="<?php echo $singleadvisor['advisor_memeber_image']['url']; ?>" alt="" class="img-fluid">
                                </div>
                                <div class="team_member_info">
                                    <h4 class="name m-0"><?php echo $singleadvisor['advisor_member_name']; ?></h4>
                                    <span><?php echo $singleadvisor['advisormember_desiganation']; ?></span>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                   

                   

                    

                    

                </div>

                <?php } ?>


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

plugin::instance()->widgets_manager->register_widget_type( new AboutTeamWidget);