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
                        <h3 class="panel-title">
                            <?php echo the_title(); ?>
                        </h3>
                      </div>
                      <div class="panel-body">
                            <?php echo the_content(); ?>
                      </div>
                    </div>
					
				<?php endwhile; ?>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					Sub Content
				</div>
			</div>
		</div>
	

<?php
get_footer();
