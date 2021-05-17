<?php
/**
 * Plugin Name: PDF Viewer by ThemeNcode
 * Plugin URI: https://themencode.com/pdf-viewer-by-themencode/
 * Description: The best PDF Reader Plugin for WordPress since 2014, Powers up your WordPress website with a smart and modern PDF Reader.
 * Version: 1.1.2
 * Author: ThemeNcode
 * Author URI: https://themencode.com
 * Text Domain: pdf-viewer-by-themencode
 *
 * @package  pdf-viewer-by-themencode
 */

defined( 'ABSPATH' ) || exit;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define constants.
define( 'PVFW_LITE_PLUGIN_NAME', 'PDF Viewer by ThemeNcode' );
define( 'PVFW_LITE_PLUGIN_DIR', 'pdf-viewer-by-themencode' );
define( 'PVFW_LITE_PLUGIN_VERSION', '1.1.2' );
define( 'PVFW_LITE_WEB_DIR', 'pdf-viewer-by-themencode/web' );
define( 'PVFW_LITE_BUILD_DIR', 'pdf-viewer-by-themencode/build' );
define( 'PVFW_LITE_RESOURCES_DIR', 'pdf-viewer-by-themencode/tnc-resources' );

// Include files.
require_once plugin_dir_path( __FILE__ ) . 'admin/tnc-pdf-viewer-options.php';
require_once plugin_dir_path( __FILE__ ) . '/includes/helper-functions.php';
require_once plugin_dir_path( __FILE__ ) . '/includes/cpt.php';
require_once plugin_dir_path( __FILE__ ) . '/includes/codestar-framework/codestar-framework.php';
require_once plugin_dir_path( __FILE__ ) . '/includes/pvfw-csf-options.php';
require_once plugin_dir_path( __FILE__ ) . '/includes/pvfw-csf-custom-field.php';
require_once plugin_dir_path( __FILE__ ) . '/includes/pvfw-csf-sc.php';
require_once plugin_dir_path( __FILE__ ) . '/includes/pvfw-new-shortcodes.php';
require_once plugin_dir_path( __FILE__ ) . '/includes/scripts.php';


register_activation_hook( __FILE__, 'pvfw_lite_activation' );
register_deactivation_hook( __FILE__, 'pvfw_lite_deactivation' );

/**
 * Activation function
 */
function pvfw_lite_activation() {
}

/**
 * Deactivation function
 */
function pvfw_lite_deactivation() {
	// Do Nothing Right Now.
}


if ( ! function_exists( 'tnc_pdf_iframe_responsive_fix' ) ){
	// Iframe Responsive Fix.
	function tnc_pdf_iframe_responsive_fix() {
		$get_pvfw_global_settings = get_option( 'pvfw_csf_options' );
		$get_iframe_fix    	= $get_pvfw_global_settings['general-iframe-responsive-fix'];
		
		if($get_iframe_fix == '1'){
			echo "<style type='text/css'>
				iframe{
					border: 0px;
				}
			</style>";
		} else {
			echo "<style type='text/css'>
				iframe{
					max-width: 100%;
					border: 0px;
				}
			</style>";
		}
	}

	add_action( 'wp_head', 'tnc_pdf_iframe_responsive_fix' );
}
