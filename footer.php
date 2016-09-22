<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EFCA_District_Theme
 */

?>

		</div> <!-- end .inner -->
    </section> <!-- end #main -->
	<footer id="page-footer">
		<div class="page-block  inner">
			<div class="container">
				<h4>Contact Us</h4>
				<a href="mailto: <?php the_field( 'contact_email', 'option'); ?>"><?php the_field( 'contact_email', 'option'); ?></a>
				
				<p>
					<a href="#">Check out our leadership page&rarr;</a>
				</p>
			</div>
			
			<?php if( have_rows('social_media_links', 'option') ): ?>
			<div class="container">
				<h4>Stay in Touch</h4>
					<nav>
						<ul>
					<?php // loop through the rows of data
    					while ( have_rows('social_media_links', 'option') ) : the_row(); ?>
							<li><a href="<?php the_sub_field( 'social_media_link', 'option'); ?>"><?php the_sub_field( 'social_media_label', 'option'); ?></a></li>
						<?php endwhile; ?>
					</ul>
				</nav>
			</div>
			<?php endif; ?>
			<?php 
                if ( get_field('include_newsletter', 'option') == 'yes' ) { 
                    $subscription_link = get_field( 'subscription_link', 'option' );
                    $newsletter_desc   = get_field( 'newsletter_description', 'option' ); ?>
                    <div class="container">
		                <h4>Get our Newsletter</h4>
						<p>
							<?php echo $newsletter_desc; ?>
						</p>
						<a class="btn btn_green" href="<?php echo $subscription_link; ?>">Subscribe</a>
					</div>
            <?php }; ?>
		</div>
	</footer><!-- #page-footer -->
  </div> <!-- end page -->
</div> <!-- end wrap -->

<?php wp_footer(); ?>

</body>
</html>
