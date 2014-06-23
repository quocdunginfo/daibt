<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package quocdunginfo
 * @subpackage DAIBT
 * @since DAIBT v1.0
 */

function daibt_scripts() {
    $prepath = get_template_directory_uri();
    $prepath_js = $prepath.'/layoutit/js/';
    $prepath_css = $prepath.'/layoutit/css/';
    
    $prepath_js_uikit = $prepath . '/uikit/jqwidgets/';
    $prepath_css_uikit = $prepath . '/uikit/jqwidgets/styles/';
	if ( is_front_page()) {
		//js
        //layoutit
        //wp_enqueue_script( 'daibt-layout1', $prepath_js . 'bootstrap.min.js', array(), false, false );
        //wp_enqueue_script( 'daibt-layout2', $prepath_js . 'scripts.js', array(), false, false );
        //uikit menu
        //wp_enqueue_script( 'daibt-uikit1', $prepath_js_uikit . 'jqxcore.js', array(), false, false );
        //wp_enqueue_script( 'daibt-uikit2', $prepath_js_uikit . 'jqxmenu.js', array(), false, false );
        //wp_enqueue_script( 'daibt-uikit3', $prepath.'/uikit/scripts/' . 'demos.js', array(), false, false );
        

        //css
        //layoutit
        //wp_enqueue_style( 'daibt-layout-css1', $prepath_css . 'bootstrap.min.css', array(), false );
        //wp_enqueue_style( 'daibt-layout-css2', $prepath_css . 'style.css', array(), false );
        //uikit menu
        //wp_enqueue_style( 'daibt-uikit-css1', $prepath_css_uikit . 'jqx.base.css', array(), false );
        
        
	}

}
add_action( 'wp_enqueue_scripts', 'daibt_scripts' );
register_nav_menus( array(
	'main_menu' => 'Main nenu',
	'sub_menu' => 'Sub menu'
) );

