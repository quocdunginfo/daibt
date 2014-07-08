<?php /** * The Template for displaying all single posts * * @package DAIBT * @subpackage Twenty_Fourteen * @since Twenty Fourteen 1.0 */
get_header(); ?>
	<div class="col-md-9 column">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title pull-left" style="padding-top: 10px;">
							<?php echo single_term_title(); ?>
						</h3>
                        <?php
                        //GET FROM URL QUERY
                        $current_page = get_query_var('page', '1');
                        $current_page = $current_page==''?'1':$current_page;
                        $order_field = get_query_var('order_by', 'id');
                        $order_rule = get_query_var('order_rule', 'DESC');
                        
                        
                        $qd_cat_id = get_queried_object()->term_id;//ID DANH MUC
                        $curent_url = get_term_link($qd_cat_id, danhmuc);//URL DANH MUC
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
                            <?php qd_order_item_li('price,ASC', $base_link); ?>
                            <?php qd_order_item_li('price,DESC', $base_link); ?>
                            <li class="divider"></li>
                            <?php qd_order_item_li('title,ASC', $base_link); ?>
                            <?php qd_order_item_li('title,DESC', $base_link); ?>
                          </ul>
                        </div>
                        <!-- END ORDER COMBOBOX -->
                        <div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<?php
                        
                        //USER PRESET
                        $per_page = 3;
                        $per_row = 4;
                        ////COUNT TOTAL BY CONDITION
                        $args = array_merge(
                            $wp_query->query_vars,
                            //FILTER FOR COUNT IF NEEDED
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
                            qd_order_is_meta_key($order_field)?
                            //CHOOSE ORDER METHOD
                            array(
                                'orderby' => 'meta_value_num',
                                'meta_key'=> qd_request_alias($order_field),
                                'order' => $order_rule
                            )
                            :
                            array(
                                'orderby' => $order_field,
                                'order' => $order_rule
                            ),
                            //END CHOOSE ORDER METHOD
                            //FILTER FOR PAGE VIEW
                            array(
                                'posts_per_page' => $per_page,
                                'paged' => $current_page
                            )
                        );
                        //var_dump($args);
                        query_posts($args);
                        $pointer = 1;
                        while ( have_posts() ) : the_post();
                        ?>
							
                            
                            <div class="col-md-4 column" style="float: left;">
                                <div class="row clearfix">
								<!--Product CELL -->
								<div class="thumbnail" style="">
									<img style="height: 144px;" src="<?php echo types_render_field('qd-meta-hinhanh-thietbi', array('url'=>'true', 'size'=>'medium')); ?>" alt="" />
									<a href="<?php echo the_permalink(); ?>">
                                    <div class="caption">
										<h4 style="word-wrap: break-word;">
											<?php echo the_title(); ?>
										</h4>
										<p>
											<?php echo types_render_field('qd-meta-gia', array('raw'=>'true')); ?>
										</p>
										<p>
											<a href="<?php echo the_permalink(); ?>" class="btn btn-primary btn-sm pull-right" role="button">Xem chi tiết</a>
										</p>
                                        <div class="clearfix"></div>
									</div>
                                    </a>
								</div>
								<!-- end Product CELL -->
                                </div>
							</div>
							<?php
                            if(($pointer+1)%$per_row==0)
                            {
                                ?>
                                
                                <div class="clearfix"></div>
                                
                                <?php
                            }
                            $pointer++; ?>
                            
                            <?php
                            endwhile;
                            wp_reset_query(); ?>
                            
                    <!-- pagination -->
                    <style>
                      ul.pagination li a.current{
                        background-color: <?php echo css_current_background; ?>;
                      }
                      </style>
                    <div class="clearfix"></div>
                    <div class="row clearfix">
                		<div class="col-md-12 column" style="text-align: center;">
                			<ul class="pagination">
                			  <!-- <li><a href="#">&laquo;</a></li> -->
                              
                              <?php
                              
                              
                              $base_link = add_query_arg( 'order_by', $order_field, $curent_url);
                              $base_link = add_query_arg( 'order_rule', $order_rule, $base_link);                              
                              $base_link = add_query_arg( 'page', '=', $base_link);
                              
                              $qd_arg = array(
                              'base'         => $base_link. '%_%',
                              'format'       => '%#%',
                              'current' => $current_page,
                              'total'   => $total_page,
                              'next_text' => '>',
                              'prev_text' => '<',
                              'before_page_number' => '',
                              'after_page_number' => '',
                              'end_size' => 2,
                              'mid_size' => 3
                              
                              );
                              $qd_page_links = paginate_links($qd_arg);
                              $qd_page_links = str_replace('<span','<a', $qd_page_links);
                              $qd_page_links = str_replace('<a','<li><a', $qd_page_links);
                              //$qd_page_links = str_replace('current','active', $qd_page_links);
                              
                              
                              echo $qd_page_links;
                              ?>
                			</ul>
                		</div>
                	</div>
                    <!-- end pagination -->
					</div>
				</div>
			</div>
		</div>
        
	</div>
	<?php get_footer();