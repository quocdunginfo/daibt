<?php
/**
 * The Template for displaying all single posts
 *
 * @package DAIBT
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
    <div class="col-md-9 column">
			<div class="row clearfix">
				<div class="col-md-12 column">
                <!-- <script>
                $(function(){
                    // Check the initial Poistion of the Sticky Header
                    var stickyHeaderTop = $('#fixednav').offset().top;
            
                    $(window).scroll(function(){
                            if( $(window).scrollTop() > stickyHeaderTop ) {
                                    $('#fixednav').css({position: 'fixed', top: '0px'});
                            } else {
                                    $('#fixednav').css({position: 'static', top: '0px'});
                            }
                    });
                });
                </script> -->
                <!-- style="z-index: 1000; width: 720px;" -->
                <div id="fixednav" class="panel panel-default" >
                      <div class="panel-heading">
                        <h1 class="panel-title pull-left qd-title-size" style="padding-top: 10px;">
                            <?php //echo single_term_title(); ?>
                            <?php echo qd_breadcrum(); ?>
                        </h1>
                        <?php
                        //GET FROM URL QUERY
                        $current_page = get_query_var('page', '1');
                        $current_page = $current_page==''?'1':$current_page;
                        $order_field = get_query_var('order_by', 'id');
                        $order_rule = get_query_var('order_rule', 'DESC');
                        
                        
                        $qd_cat_obj = get_queried_object();//ID DANH MUC
                        $curent_url = get_term_link($qd_cat_obj, $qd_cat_obj->taxonomy);//URL DANH MUC
                        $base_link = add_query_arg( 'page', '1', $curent_url);//always page=1 when switch order condition
                        ?>
                        <!-- ORDER COMBOBOX -->
                        <div class="btn-group pull-right" style="margin: 0px;">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          <?php echo qd_request_active_name(); ?>
                          <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <?php qd_order_item_li('id,DESC', $base_link); ?>
                            <?php qd_order_item_li('id,ASC', $base_link); ?>
                            <li class="divider"></li>
                            <?php qd_order_item_li('title,ASC', $base_link); ?>
                            <?php qd_order_item_li('title,DESC', $base_link); ?>
                          </ul>
                        </div>
                        <!-- END ORDER COMBOBOX -->
                        <div class="clearfix"></div>
                      </div>
                </div>
				<?php
                

                //USER PRESET
                $per_page = 9;
                //COUNT TOTAL BY CONDITION
                $args = array_merge(
                    $wp_query->query_vars,
                    //FILTER FOR COUNT
                    array(
                        
                    )
                );
                query_posts($args);
                $total_records = $wp_query->post_count;
                
                $total_page = (int)($total_records/$per_page);
                $total_page += $total_records % $per_page > 0?1:0;

                //GET RECORDS FOR CURRENT PAGE
                $args = array_merge(
                    $args,
                    //FILTER FOR PAGE VIEW
                    array(
                        'posts_per_page' => $per_page,
                        'paged' => $current_page,
                        'orderby' => $order_field,
                        'order' => $order_rule
                    )
                );
                query_posts($args);
                
                while ( have_posts() ) : the_post();
                ?>

					<div class="panel panel-default">
                      <div class="panel-heading">
                        <h2 class="panel-title qd-title-size">
                            <?php echo the_title(); ?>
                        </h2>
                      </div>
                      <div class="panel-body">
                            <div class="qd-content-size">
                            <?php echo the_content(); ?>
                            </div>
                            <div class="row clear-fix">
                                <div class="col-md-12 column">
                                    <a class="pull-right btn btn-primary btn-sm" href="<?php echo get_permalink($next_post); ?>" role="button">
                                        Xem chi tiết
                                    </a>
                                    <div class="clear-fix"></div>
                                </div>
                            </div>
                      </div>
                      
                    </div>
					
				<?php endwhile; ?>
				</div>
			</div>
              <style>
              li a.current{
                background-color: <?php echo css_current_background; ?>;
              }
              </style>
            <div class="row clearfix">
                <div class="col-md-12 column" style="text-align: center;">
                    <ul class="pagination">
        			  <!-- <li><a href="#">&laquo;</a></li> -->
                      
                      <?php
                      
                      $base_link = add_query_arg( 'page', '=', $curent_url);
                      
                      $qd_arg = array(
                      'base'         => $base_link. '%_%',
                      'format'       => '%#%',
                      'current' => $current_page,
                      'total'   => $total_page,
                      'next_text' => '>',
                      'prev_text' => '<',
                      'before_page_number' => '',
                      'after_page_number' => ''
                      
                      );
                      $qd_page_links = paginate_links($qd_arg);
                      $qd_page_links = str_replace('<span','<a', $qd_page_links);
                      $qd_page_links = str_replace('<a','<li><a', $qd_page_links);
                      
                      echo $qd_page_links;
                      ?>
        			</ul>
                </div>
            </div>
		</div>
	

<?php
get_footer();
