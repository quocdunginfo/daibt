<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
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
                <h1 class="panel-title qd-title-size">
                    <?php echo the_title(); ?>
                </h1>
              </div>
              <div class="panel-body qd-content-size">
                    <?php echo the_content(); ?>
              </div>
            </div>
			
		<?php endwhile; ?>
		</div>
	</div>
	<div class="row clearfix" style="display: none;">
		<div class="col-md-12 column">
			Sub Content
		</div>
	</div>
</div>
<!-- END RIGHT -->
<?php
get_footer();
