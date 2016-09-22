<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EFCA_District_Theme
 */

?>

<article id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<?php the_post_thumbnail();
		the_title( '<h1 class="entry-title">', '</h1>' );
		the_excerpt(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
			<?php get_page_children( $page_id, $pages ) ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

			
