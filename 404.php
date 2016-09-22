<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package EFCA_District_Theme
 */

get_header(); ?>

<section id="main">
    <div class="inner">
    	<div class="page_content">
    		<h1>Page Not Found</h1>
    		<p>The page you're looking for isn't here. Searching for it below may help get you closer.</p>
					<?php
						get_search_form();
					?>

		</div>
	</div>
</section>

<?php
get_footer();
