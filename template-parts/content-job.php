<?php
/**
 * Template part for displaying page job content in single-efca_job.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EFCA_District_Theme
 */

?>

<article id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<h2>Employment</h2>
		<?php the_post_thumbnail();
		the_title( '<h1 class="entry-title">', '</h1>' );
		$workplace = get_field('job_workplace');
		$workplace_link = get_field('job_workplace_link');
		$job_location = get_field('job_location');
		?>
		<a target="_blank" class="icon-outgoing" href="<?php echo $workplace_link; ?>" title="<?php echo $workplace; ?>"><?php echo $workplace; ?></a>
				<span class="field-location icon-location"><?php echo $job_location; ?></span>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'efca-district' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

