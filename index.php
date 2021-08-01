<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage London
 */

?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<section id="presentation">
		<div class="row text-left">
			<div class="col-md-12">
				<?php the_content(); ?>
			</div>
		</div>
		<hr class="mt-5"/>
	</section>
<?php endwhile;
endif; ?>

<?php get_footer();
