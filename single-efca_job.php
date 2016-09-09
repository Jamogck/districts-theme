<?php
/**
 * The template for displaying a single job posting.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EFCA_District_Theme
 */

get_header(); ?>

	<section id="main">
    	<div class="inner">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-job');

		endwhile; // End of the loop.

get_footer();