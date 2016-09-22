<?php 

/* Template Name: Parent Page 
*  Shows lists of child pages
*/ 

get_header(); ?>
<section id="main">
    <div class="inner">
    	<div class="page_content">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content-parent' );

			endwhile; // End of the loop.
			?>
		</div>

<?php
get_footer();