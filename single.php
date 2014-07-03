<?php
/**
 * The Template for displaying all single posts
 *
 * @package DAIBT
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<!-- RIGHT -->
<div class="col-md-9 column">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<?php
    		// Start the Loop.
    		while ( have_posts() ) : the_post(); ?>
    
    			<div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo the_title(); ?>
                        <div class="pull-right">
                            
                            Đăng bởi <?php the_author(); ?>, <?php the_date(); ?>
                        </div>
                    </h3>
                  </div>
                  <div class="panel-body">
                        <?php echo the_content(); ?>
                        
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
<!-- END RIGHT -->
<?php
get_footer();
