<?php
/**
 * Template Name: Trang liên hệ (Style 1)
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
                    <div class="pull-right"></div>
                </h3>
              </div>
              <!-- Override WPCF7 CSS display: inline-block gây thiếu WIDTH khi bấm nút gửi mà trường đó bắt require -->
                <style>
                .wpcf7 span {
                    display: inline-block !important;
                    width: 100%;
                    
                }
                </style>
              <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php
                            echo do_shortcode(ot_get_option('contact_form_shortcode')); ?>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <?php the_content();?>
                            </div>
                            <?php
                            echo do_shortcode(ot_get_option('google_map_shortcode')); ?>
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
