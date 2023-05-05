<?php
/**
 * Template Name: Homepage
 *
 * @package London
 */

?>
<?php global $post; ?>
<?php get_header(); ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
		<section id="presentation">
			<div class="row text-left">
				<div class="col-md-12">
					<?php the_content(); ?>
				</div>
			</div>
			<hr class="mt-5"/>
		</section>
	<?php
	endwhile;
endif;

get_template_part( 'partial/section-skills-education' );
get_template_part( 'partial/section-work-experience' );
get_template_part( 'partial/section-wordpress-jobs' );
get_template_part( 'partial/section-teaching-publications' );
get_template_part( 'partial/section-wordpress-plugins' );
get_template_part( 'partial/section-contacts' );

get_footer();
