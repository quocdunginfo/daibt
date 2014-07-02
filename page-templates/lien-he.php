<?php
/**
 * Template Name: Trang liên hệ
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
                    <div class="pull-right">234324</div>
                </h3>
              </div>
              <!-- Override WPCF7 CSS display: inline-block gây thiếu WIDTH khi bấm nút gửi mà trường đó bắt require -->
                <style>
                .wpcf7 span {
                    display: block !important;
                    
                }
                </style>
              <div class="panel-body">
                    
                    <?php echo the_content(); ?>
              </div>
            </div>
			
		<?php endwhile; ?>
		</div>
	</div>
</div>
<!-- END RIGHT -->

<?php
get_footer();
