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
					<?php
    				// Start the Loop.
    				while ( have_posts() ) : the_post(); ?>

					<div class="panel panel-default">
                      <div class="panel-heading">
                        <h1 class="panel-title pull-left">
                            <?php echo the_title(); ?>
                        </h1>
                        <div class="pull-right">
                            Đăng bởi <?php the_author(); ?>, <?php the_date(); ?>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="panel-body">
                            <div class="row clearfix">
                                <div class="thumbnail" style="border: 0px;">
            					  <img style="height: 300px;" src="<?php echo types_render_field('qd-meta-hinhanh-thietbi', array('url'=>'true')); ?>" alt="">
            					  <div class="caption">
                                        <h2 class="qd-title-size">
											Giá:
                                            <?php echo types_render_field('qd-meta-gia', array('raw'=>'true')); ?>
										</h2>
                                        <div>
                                            <?php echo the_content() ?>
                                        </div>
            					  </div>
            					</div>
                            </div>
                            <div class="row clear-fix">
                                <?php
                                    $prev_post = get_previous_post();
                                    $next_post = get_next_post();
                                    
                                ?>
                                <div class="col-md-6 column">
                                    <a <?php if(-1==get_the_ID()) echo 'style="display: none;"'; ?> class="pull-left btn btn-primary btn-sm" href="<?php echo get_permalink($prev_post); ?>"  role="button">Trước</a>
                                </div>
                                <div class="col-md-6 column">
                                    <a class="pull-right btn btn-primary btn-sm" href="<?php echo get_permalink($next_post); ?>" role="button">Kế tiếp</a>
                                </div>
                            </div>
                      </div>
                    </div>
					
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	

<?php
get_footer();
