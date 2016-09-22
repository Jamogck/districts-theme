<?php 

/* Template Name: Giving Page */ 

get_header(); ?>
<section id="main">
    <div class="inner">
    	<div class="page_content">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/giving-template' );

			endwhile; // End of the loop.
			?>
		</div>

<?php
get_footer();