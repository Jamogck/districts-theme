<?php
/**
 * Template part for displaying page content in giving.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EFCA_District_Theme
 */

?>

<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
	</header><!-- .entry-header -->
		<?php

			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'efca-district' ),
				'after'  => '</div>',
			) );
		?>
	<?php

		// check if the repeater field has rows of data
		if( have_rows('giving_accounts') ): ?>
			<div class="des-check">
				<h3>Select your designation</h3>
        		<form>
			<?php while ( have_rows('giving_accounts') ) : the_row(); 
				$account_id = get_sub_field('account_id');
			?>
			        <input type="radio" name="designation" id="<?php echo $account_id; ?>" />
	            	<label for="<?php echo $account_id; ?>"><?php the_sub_field( 'account_name' ); ?></label>
		     <?php endwhile; ?>
				</form>
			</div>
			<div id="genfund-form" class="form-container is-selected"></div>
			<div id="fairshare-form" class="form-container"></div>
			
		<?php endif;
		if( have_rows('giving_forms') ): ?>
			<?php while ( have_rows('giving_forms') ) : the_row(); ?>
				
				<?php the_sub_field( 'form_script' ); ?>
			<?php endwhile;
		endif; ?>

	