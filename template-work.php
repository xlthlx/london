<?php
/**
 * Template Name: Work Experience
 *
 * @package London
 */

get_header(); ?>

<?php 
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post(); 
		?>
	<section id="presentation">
		<?php the_content(); ?>
	</section>
		<?php
	endwhile;
endif; 
?>
	<section id="work-experience">
		<h2 class="title">Work Experience</h2>
		<hr class="mb-4 mt-0">
<?php
$jobs = ln_get_jobs();
$n    = 0;
foreach ( $jobs as $job ) {
	$n ++;
	if ( 'job' === $job['type'] ) {
		get_template_part( 'parts/work-experience' );
	} else {
		get_template_part( 'parts/wordpress-jobs' );
	} 
	?>
	</section>
	<?php 
}
get_footer();
