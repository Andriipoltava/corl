<?php 


// office location widget here

namespace Elementor;


class OfficeLocationWidget extends Widget_Base{


    public function get_name() {
        return "officelocation-widget";
    }

	public function get_title() {
        return "Office Location";
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
			'office_content_section',
			[
				'label' => __( 'Content', 'corl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


        //Title
        $this->add_control(
			'office_location_title',
			[
				'label' => __( 'Title', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Our offices', 'corl' ),
				'placeholder' => __( 'Type Title here', 'corl' ),
			]
		);

        // sigle item

        $repeater = new Repeater();


        $repeater->add_control(
			'location_area_name', [
				'label' => esc_html__( 'Location Area Name', 'corl' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Toronto', 'corl' ),
				'label_block' => true,
			]
		);


        $repeater->add_control(
			'location_are', [
				'label' => esc_html__( 'Full Location', 'corl' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( '180 John Street, Suite 402
                Toronto, ON, M5T 1X5
                Canada' , 'corl' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'location_are_map', [
				'label' => esc_html__( 'Embedded The Map Here', 'corl' ),
				'type' => Controls_Manager::CODE,
			]
		);

        


        $this->add_control(
			'location_list',
			[
				'label' => esc_html__( 'Location List', 'corl' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ location_area_name }}}',
			]
		);

        


    


		$this->end_controls_section();








    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $office_location_title = $settings['office_location_title'];
        $location_list = $settings['location_list'];

    
       
        ?>



  <!-- Start Why Corl Section -->
  <section class="contact_map">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="section_title">
                            <h2 class="m-0"><?php echo $office_location_title; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="map_wrapper">
                    <form action="">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="d-flex align-items-start contact_map_locations">


                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                    <?php $i= 0; foreach($location_list as $location_item){ ?>

                                        <?php  $i= ++$i;?>
                                        <button class="nav-link <?php if($i==1){echo "active";} ?>" id="offceloaction-id-<?php echo esc_attr( $location_item['_id'] ) ?>-tab" data-bs-toggle="pill" data-bs-target="#offceloaction-id-<?php echo esc_attr( $location_item['_id'] ) ?>" type="button" role="tab" aria-controls="offceloaction-id-<?php echo esc_attr( $location_item['_id'] ) ?>" aria-selected="true">
                                            <div class="location_name">
                                                <h4><?php echo $location_item['location_area_name'];?></h4>
                                                <p><?php echo $location_item['location_are'];?></p>
                                            </div>

                                        </button>


                                    <?php }?>


                                       

                                    </div>


                                    <div class="tab-content" id="v-pills-tabContent">

                                       <?php $f= 0; foreach($location_list as $location_item){ ?>

                                        <?php  $f= ++$f;?>
                                        <div class="tab-pane fade <?php if($f==1){echo "show active";} ?>" id="offceloaction-id-<?php echo esc_attr( $location_item['_id'] ) ?>" role="tabpanel" aria-labelledby="offceloaction-id-<?php echo esc_attr( $location_item['_id'] ) ?>-tab">
                                            <div class="location_map">
                                               <?php echo $location_item['location_are_map'];?>
                                            </div>

                                        </div>

                                        <?php }?>

                                        


                                       


                                    </div>
                                </div>
                                    
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </section>






<?php 
		

    }



}

plugin::instance()->widgets_manager->register_widget_type( new OfficeLocationWidget);