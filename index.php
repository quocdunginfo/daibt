<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package quocdunginfo
 * @subpackage DAIBT
 * @since DAIBT v1.0
 */

get_header(); ?>
        <div class="col-md-9 column">
			<div class="row clearfix">
				<div class="col-md-12 column">
					Main
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