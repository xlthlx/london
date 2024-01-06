<?php
/**
 * Page template.
 *
 * @package London
 */

get_header(); ?>

<?php 
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post(); 
		?>
		<section id="main">
			<?php the_content(); ?>
		</section>
		<?php
	endwhile;
endif;

get_footer();
