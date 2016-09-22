<?php
/**
 * The template for displaying archive job postings.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EFCA_District_Theme
 */

get_header(); ?>

	<section id="main">
    	<div class="inner">
    		<div class="page_content">
				<header class="entry-header">
					<h1>Employment</h1>
				</header>
    		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>
				<h2 class="list entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" class="link-block"><?php the_title(); ?></a></h2>
				<?php 
				$workplace = get_field('job_workplace');
				$workplace_link = get_field('job_workplace_link');
				$job_location = get_field('job_location');
				?>

				<a target="_blank" class="icon-outgoing" href="<?php echo $workplace_link; ?>" title="<?php echo $workplace; ?>"><?php echo $workplace; ?></a>
				<span class="field-location icon-location"><?php echo $job_location; ?></span>


			<?php endwhile;

		else : ?>
			<p>No jobs posted at this time.</p>
		<?php endif; ?>
			</div> <!-- end .page_content -->

<?php get_footer();