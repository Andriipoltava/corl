<?php

//Initialize elementor widget

class ElementorCustommElement
{
    
	Private static $instance = null;

	public static function get_instance()
	{
		if(!self::$instance){

			self::$instance = new self;
			return self::$instance;

		}
	}

	public function init()
	{
		add_action('elementor/widgets/widgets_registered', array($this, 'widgets_registered'));
	}

	public function widgets_registered()
	{
		//we check if the elementor plugin has been installed ./. activated.

		if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')) {

			// we look for any theme overrides for this custom elementor element. if no theme overrides are found we use the default one in this plugin.

			$widget_file = get_template_directory() . '/lib/custom-elementor-widget.php';

			$template_file = locate_template($widget_file);

			if(!$template_file || !is_readable($template_file)){

				$template_file = get_template_directory() . '/lib/custom-elementor-widget.php';





			}

			if($template_file && is_readable($template_file )) {

				require_once $template_file;

			}

		}
	}




}

ElementorCustommElement::get_instance()->init();






function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'corl-theme',
		[
			'title' => __( 'Corl Theme', 'plugin-name' ),
			'icon' => 'fa fa-plug',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );