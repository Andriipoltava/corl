<?php

namespace WP_Rocket\Helpers\static_files\exclude\exclude_elementor_uploaded_css;

// Standard plugin security, keep this line in place.
defined( 'ABSPATH' ) or die();
/**
 * Exclude CSS uploaded files by Elementor from the Optimize CSS Delivery feature
 *
 * @author Jorge Martinez
 *
 * */

function get_elementor_uploaded_css(): array {

	$css_files = array();
	$uploads_dir = wp_upload_dir( null, false);
	$uploads_path = "";

	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'){
		$uploads_path = strval(str_replace (substr(str_replace("/","\\",ABSPATH), 0, -1),"",$uploads_dir["basedir"]));
	} else {
		$uploads_path = strval(str_replace (substr(ABSPATH, 0, -1),"",$uploads_dir["basedir"]));
	}
	$css_uploads  =  scandir(wp_upload_dir( null, false)["basedir"]."/elementor/css");
	foreach($css_uploads as $css){

		$filepath = strval($uploads_dir["basedir"])."/elementor/css".$css;
		$file = pathinfo($filepath);

		if (array_key_exists("extension", $file) ){
			if ($file["extension"] == "css" && $file["filename"] != "cssglobal"){
				$css = $uploads_path."/elementor/css/".$css;
				array_push ( $css_files , $css );
			}
		}
	}
	return $css_files;

}
add_filter( 'rocket_exclude_async_css', __NAMESPACE__ . '\get_elementor_uploaded_css' );