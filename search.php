<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package EFCA_District_Theme
 */

get_header(); ?>

	<section id="main">
    	<div class="inner">
    		<div class="page_content">

				<?php
				if ( have_posts() ) : ?>

					<h2><?php printf( esc_html__( 'Search results for: %s', 'efca-district' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div> <!-- end .page_content -->

<?php
get_footer();
