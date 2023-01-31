<?php
/**
 * The page template file
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header(); ?>

<?php
if ( have_posts() ) {
	// This is requried.
	while ( have_posts() ) {
		the_post();

	}
}
?>
<?php 
// The content is the most important call so that
// Elementor widgets can be loaded at thi section of
// the page
the_content(); 
?>
<?php
get_footer();