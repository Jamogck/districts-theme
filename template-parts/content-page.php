<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EFCA_District_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" class="page_content">
    
	<header class="entry-header">
		  

        
		<?php the_title( '<h1 class="entry-title">', '</h1>' );
		the_excerpt(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

			the_content();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

<?php 
    $posts = get_field('featured_content');

    if( $posts ): ?>
        <div class="page-block">
        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post);?>
            <div class="card  size1of3">
                <div class="card_img">
                    <a href="<?php the_permalink(); ?>"><img  class="media" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" /></a>
                </div>
                <div class="card_content">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="triangle">&#9658;</span></a></h3>
                    <?php the_excerpt(); ?>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    <?php endif; 
?>

			
