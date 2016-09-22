<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mogck_Homes
 */

get_header(); ?>
	

	<section class="main">
        <div class="inner">
            <div class="page-block">
                <div class="large-size1of2">
                    <img src="<?php the_field( 'district_map' ); ?>" alt="EFCA district map" />
                </div>
                <div class="size1of1  large-size1of2  flex-centered">
                    <p>
                        <?php the_field( 'district_description' ); ?>
                    </p>
                    <a class="btn btn_green" href="#">Find a church</a>
                </div>
            </div>
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
        </div>
    </section>
    <div class="hero  flex  inner">
        <span class="animated-layer">
        </span>
        <div class="hero_text">
            <h2>What we believe</h2>
            <a class="btn_rounded" href="/statement-of-faith/">View our statement of faith</a>
        </div>
    </div>
    <section class="main">
        <div class="inner">
            <?php get_template_part( 'template-parts/efca-content'); ?>

<?php
get_footer();