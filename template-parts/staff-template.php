<?php
/**
 * Template part for displaying page content in staff.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EFCA_District_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" class="page_content">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'efca-district' ),
				'after'  => '</div>',
			) );
		?>
		<?php if( have_rows('individual_person') ): 

			while( have_rows('individual_person') ): the_row(); 

				// vars
				$name        = get_sub_field( 'person_name' );
				$image       = get_sub_field('person_photo');
				$description = get_sub_field('person_description');
				$email       = get_sub_field('person_email');
				$phone       = get_sub_field('person_phone');

				?>

				<div class="media_block">
            		<div class="media_image">
    					<img src="<?php echo $image; ?>" alt="Photo of <?php echo $name; ?>" />
    					<div class="contact_info">
		                    <span class="toggler  btn  btn_green">Contact Info +</span>
		                    <ul>
		                        <li>EMAIL: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
		                        <li>TEL: <?php echo $phone; ?></li>
		                    </ul>
	                	</div>
	            	</div>

	            	<div class="media_description">
	            		<h3><?php echo $name; ?></h3>
	            		<?php echo $description; ?>
	            	</div>
	            </div>

			<?php endwhile; ?>

		<?php endif; ?>

	</div><!-- .entry-content -->
</article><!-- #post-## -->