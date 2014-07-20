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
 //taxonomy query
define('thietbi', 'qd-thiet-bi');
define('danhmuc', 'qd-danh-muc-thiet-bi');
//css pagination
define('css_current_background', 'antiquewhite');

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

//WIDGET
function arphabet_widgets_init() {
	register_sidebar(
        array(
    		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
    		'id'            => 'sidebar-1',
    		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
    		//'before_widget' => '<aside id="%1$s" class="widget %2$s" style="width: 250px; margin-right: 100px">',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h5 class="widget-title">',
    		'after_title'   => '</h5>'
    	)
    );
    register_sidebar(
        array(
    		'name'          => __( 'Footer Sidebar', 'twentyfourteen2' ),
    		'id'            => 'sidebar-2',
    		'description'   => __( 'Footer sidebar that appears on the left.', 'twentyfourteen2' ),
    		//'before_widget' => '<aside id="%1$s" class="widget %2$s" style="width: 250px; margin-right: 100px">',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h5 class="widget-title">',
    		'after_title'   => '</h5>'
    	)
    );
    register_sidebar(
        array(
    		'name'          => __( 'Sidebar 3', 'twentyfourteen3' ),
    		'id'            => 'sidebar-3',
    		'description'   => __( 'Sidebar 3', 'twentyfourteen3' ),
    		//'before_widget' => '<aside id="%1$s" class="widget %2$s" style="width: 250px; margin-right: 100px">',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h5 class="widget-title">',
    		'after_title'   => '</h5>'
    	)
    );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

//custom query vars
function add_query_vars_filter( $vars ){
  $vars[] = "order_by";
  $vars[] = "order_rule";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

//ORDER
/**
 * qd_request_active_class()
 * Trả về tên class là active nếu như khớp với ORDER
 * @param string $register
 * @return 'active' || ''
 */
function qd_request_active_class($register='id,DESC')
{
    $order_by = get_query_var('order_by','id');
    $order_rule = get_query_var('order_rule','DESC');
    $compare = $order_by.','.$order_rule;
    if(strtoupper($compare)===strtoupper($register))
    {
        return 'active';
    }
    return '';
}
//ORDER
/**
 * qd_request_active_class()
 * Trả về tên công khai nếu như khớp với ORDER
 * @param string $register
 * @return 'active' || ''
 */
function qd_request_active_name()
{
    $order_by = get_query_var('order_by','id');
    $order_rule = get_query_var('order_rule','DESC');
    $compare = $order_by.','.$order_rule;
    
    return qd_request_element_name($compare);
}

/**
 * qd_request_element_name()
 * Trả về tên tương ứng với order register
 * @param string $register
 * @return void
 */
function qd_request_element_name($register='id,DESC')
{
    $register = strtoupper($register);
    switch($register)
    {
        case 'ID,DESC': return 'Mới nhất trước';
        case 'ID,ASC': return 'Cũ nhất trước';
        case 'PRICE,DESC': return 'Giá giảm dần';
        case 'PRICE,ASC': return 'Giá tăng dần';
        case 'TITLE,ASC': return 'Tên A > Z';
        case 'TITLE,DESC': return 'Tên Z > A';
        default: return $register;
    }
}
function qd_order_is_meta_key($field_name='id')
{
    return strpos(qd_request_alias($field_name), 'wpcf-')!==false;
}
function qd_request_alias($field_name='id')
{
    switch($field_name)
    {
        case 'price': return 'wpcf-qd-meta-gia';
        default: return $field_name;
    }
}
function qd_request_element_url($register='id,DESC', $base_url='')
{
    $orders = explode(',', $register);
    if(sizeof($orders)<2)
    {
        return $base_url;
    }
    $order_by = $orders[0];
    $order_rule = $orders[1];
    $tmp = add_query_arg('order_by', $order_by, $base_url);
    $tmp = add_query_arg('order_rule', $order_rule, $tmp);
    
    return $tmp;
}

/**
 * qd_order_item_li()
 * Hỗ trợ echo tự động
 * @param string $register
 * @param string $base_url
 * @return void
 */
function qd_order_item_li($register='id,DESC', $base_url='')
{
    ?>
    <li class="<?php echo qd_request_active_class($register); ?>">
        <a href="<?php echo qd_request_element_url($register, $base_url); ?>">
            <?php echo qd_request_element_name($register); ?>
        </a>
    </li>
    <?php
}
//END ORDER

//BREADCUM
function qd_breadcrum()
{
    $delimiter = ' » ';
    $obj = get_queried_object();
    $array = array();
    array_push($array,$obj);
    while(true)
    {
        if($obj->parent<=0)
        {
            break;
        }
        $obj = get_term($obj->parent,$obj->taxonomy);
        array_push($array,$obj);
    }
    
    $array = array_reverse($array);
    $count = count($array);
    for($i=0;$i<$count;$i++)
    {
        $item = $array[$i];
        $link = get_term_link($item, $item->taxonomy);
        if($i<$count-1)
        {
            echo $item->name.$delimiter;
        }
        else
        {
            echo $item->name;
        }
    }
}

