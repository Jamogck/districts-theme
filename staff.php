<?php 

/* Template Name: Staff Page */ 

get_header(); ?>
<section id="main">
    <div class="inner">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/staff-template' );

			endwhile; // End of the loop.
			?>

<?php
get_footer();