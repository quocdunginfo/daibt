<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bootstrap 3, from LayoutIt!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
    <!-- =====Layout===== -->
	<!--link rel="stylesheet/less" href="layoutit/less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="layoutit/less/responsive.less" type="text/css" /-->
	<!--script src="layoutit/js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="<?php echo get_template_directory_uri(); ?>/layoutit/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/layoutit/css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="layoutit/js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/layoutit/img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/layoutit/img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/layoutit/img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/layoutit/img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/layoutit/img/favicon.png">
  
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/layoutit/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/layoutit/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/layoutit/js/scripts.js"></script>
    <!-- =====END Layout===== -->
    <!-- MENU -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/uikit/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/uikit/jqwidgets/styles/jqx.metro.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/uikit/jqwidgets/styles/jqx.bootstrap.css" type="text/css" />
    <!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/uikit/scripts/jquery-1.10.2.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/uikit/scripts/demos.js"></script> -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/uikit/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/uikit/jqwidgets/jqxmenu.js"></script>

    <!-- END MENU -->
    <?php wp_head(); ?>
	<script>
    //Crack wonder plugin
	jQuery(document).ready(function () {
        // Create a jqxMenu
        $('a[href*="wonderplugin.com"]').hide();
    });
	</script>
</head>

<body style="padding-top: 0px;">
<div class="container" style="width: 1000px; margin-top: -32px;">
	<!-- HEADER -->
    <div class="row clearfix" style="z-index: 1;">
		<div class="col-md-3 column">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
    			     <img src="<?php echo ot_get_option('logo') ?>" width="200px" height="200px" alt="">
            </a>
		</div>
		<div class="col-md-9 column">
            <?php
            echo do_shortcode(ot_get_option('image_slider_shortcode')); ?>
		</div>
	</div>
    <!-- END HEADER -->
    
    <!-- BODY -->
	<div class="row clearfix" style="margin-top: 20px!important; z-index: 5;">
		<!-- LEFT -->
        <div class="col-md-3 column">
			<!-- MAIN MENU -->
            <div class="row clearfix">
				<div class="col-md-12 column">
                    <div class="panel panel-default">
                          <div class="panel-body" style="padding-left: 0px; padding-right: 0px; padding-top: 2px; padding-bottom: 2px;">
                            <script type="text/javascript">
                        $(document).ready(function () {
                            // Create a jqxMenu
                            $("#jqxMenu").jqxMenu({ width: '100%', mode: 'vertical', theme: 'metro'});
                            $("#jqxMenu").css('visibility', 'visible');
                            $("#jqxMenu").css('border', '0px');
                            //$("#jqxMenu").css('border-radius', '5px');
                            $("#jqxMenu").css('margin-left', '0px');
                            //$("#jqxMenu").css('background-color', '');
                        });
                    </script>
                    <div id='qd_jqxWidget' style='width:100%;'>

					<?php
                    $defaults = array(
                    	'theme_location'  => 'main_menu',
                    	'menu'            => '',
                    	'container'       => 'div',
                    	'container_class' => '',
                    	'container_id'    => 'jqxMenu',
                    	'menu_class'      => 'menu',
                    	'menu_id'         => '',
                    	'echo'            => true,
                    	'fallback_cb'     => 'wp_page_menu',
                    	'before'          => '',
                    	'after'           => '',
                    	'link_before'     => '',
                    	'link_after'      => '',
                    	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    	'depth'           => 0,
                    	'walker'          => ''
                    );
                    
                    wp_nav_menu( $defaults );
                    
                    ?>
                    </div>
                          </div>
                    </div>
                    
				</div>
			</div>
            <!--END MAIN MENU -->
			<div class="row clearfix">
				<div class="col-md-12 column">
					Menu 2
				</div>
			</div>
		</div>
        <!-- END LEFT -->