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
	<section id="skills-education" class="pt-5">
		<div class="ms-auto text-end">
			<h2 class="mt-5 mb-3 h2-responsive">Skills and education</h2>
		</div>
		<hr class="dotted mb-5 mt-4">

		<div class="row mt-3">
			<div class="col-md-12 mb-4">
				<h3 class="mb-4">Skills</h3>
				<hr class="mb-4 mt-0"/>
				<?php echo apply_filters( 'the_content', get_post_meta( $post->ID, 'home_fields_skills', true ) ); ?>
				<h3 class="mb-4 mt-5">Education</h3>
				<hr class="mb-4 mt-0"/>
				<?php echo apply_filters( 'the_content', get_post_meta( $post->ID, 'home_fields_edu', true ) ); ?>
			</div>
		</div>
		<hr/>
	</section>

	<section id="work-experience" class="pt-5">
		<div class="ms-auto text-end">
			<h2 class="mt-5 mb-3 h2-responsive">Work experience</h2>
		</div>
		<hr class="dotted mb-5 mt-4">
		<?php $jobs = ln_get_jobs( 'job' );
		foreach ( $jobs as $job ) {
			?>
			<div class="row mt-3">
				<?php if ( empty( $job['about'] ) ) { ?>
					<div class="col-md-12 mb-4">
						<h3 class="mb-4"><?php echo $job['title']; ?></h3>
						<hr class="mb-4 mt-0">
					</div>
				<?php } ?>
				<?php if ( ! empty( $job['about'] ) ) { ?>
					<div class="accordion bg-black col-md-12 mb-4" id="accordion<?php echo $job['item_id']; ?>">
						<div class="accordion-item border-0 no-border-radius bg-black">
							<div class="accordion-header border-0 no-border-radius bg-black mb-2"
								 id="accordion<?php echo $job['item_id']; ?>-heading">
								<h3 class="accordion-button collapsed bg-black h3 border-0 no-border-radius mb-0 px-0"
									type="button" data-bs-toggle="collapse" data-id="<?php echo $job['ID']; ?>"
									data-bs-target="#accordion-<?php echo $job['item_slug']; ?>"
									aria-expanded="false" aria-controls="accordion-<?php echo $job['item_slug']; ?>">
									<?php echo $job['title']; ?>
								</h3>
							</div>
							<div id="accordion-<?php echo $job['item_slug']; ?>" class="accordion-collapse collapse"
								 aria-labelledby="accordion<?php echo $job['item_id']; ?>"
								 data-bs-parent="#accordion<?php echo $job['item_id']; ?>"></div>
						</div>
						<hr class="mb-4 mt-0">
					</div>
				<?php } ?>
				<div class="col-md-3 mb-0">
					<?php if ( ! empty( $job['logo'] ) ) { ?>
						<picture>
							<img loading="lazy" width="300" height="225" src="<?php echo $job['logo']; ?>"
								 class="img-fluid mb2" alt="<?php echo $job['title']; ?>"/>
						</picture>
					<?php } ?>
					<?php if ( ! empty( $job['images'] ) ) { ?>
						<picture>
							<img loading="lazy" width="300" height="225"
								 src="<?php echo $job['first_image']; ?>"
								 class="img-fluid mb2 cursor"
								 alt="<?php echo $job['first_image_alt']; ?>"
								 data-ref="modal<?php echo $job['item_id']; ?>"
								 data-id="<?php echo $job['ID']; ?>">
						</picture>
						<p class="text-center mt-4 pt-2">
					<span data-ref="modal<?php echo $job['item_id']; ?>" role="button"
						  data-id="<?php echo $job['ID']; ?>"
						  class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0">view</span>
						</p>
						<div id="modal<?php echo $job['item_id']; ?>" class="modal fade border-0 rounded-0"
							 tabindex="-1"
							 aria-labelledby="modal" aria-hidden="true">
						</div>
					<?php } ?>
				</div>

				<div class="col-md-9 mb-4">
					<h4><?php echo $job['job_title']; ?></h4>
					<div class="dark-grey-text">
						<h5><?php echo $job['start_date']; ?> - <?php echo $job['end_date']; ?></h5>
						<p><small><em><?php echo $job['location']; ?></em></small></p>
						<?php echo $job['content']; ?>
						<p class="dark-grey-text"><em><?php echo $job['tech']; ?></em></p>
					</div>
				</div>
			</div>
			<hr class="dotted mb-4 mt-0">
		<?php } ?>
	</section>

	<section id="wordpress-works" class="pt-5">
		<div class="ms-auto text-end"><h2 class="mt-5 mb-3 h2-responsive">WordPress works</h2></div>
		<hr class="dotted mb-5 mt-4">
		<p class="text-end">Other websites managed as a contractor</p>
		<?php $jobs = ln_get_jobs( 'work' );
		foreach ( $jobs as $job ) {
			?>
			<hr class="mb-5 mt-4">
			<div class="row mt-3">
				<div class="col-md-3 mb-4">
					<?php if ( ! empty( $job['logo'] ) ) { ?>
						<picture>
							<img loading="lazy" width="300" height="225" src="<?php echo $job['logo']; ?>"
								 class="img-fluid mb2" alt="<?php echo $job['title']; ?>"/>
						</picture>
					<?php } ?>
					<?php if ( ! empty( $job['images'] ) ) { ?>
						<picture>
							<img loading="lazy" width="300" height="225"
								 src="<?php echo $job['first_image']; ?>"
								 class="img-fluid mb2 cursor"
								 alt="<?php echo $job['first_image_alt']; ?>"
								 data-ref="modal<?php echo $job['item_id']; ?>"
								 data-id="<?php echo $job['ID']; ?>">
						</picture>
						<p class="text-center mt-4 pt-2">
					<span data-ref="modal<?php echo $job['item_id']; ?>" role="button"
						  data-id="<?php echo $job['ID']; ?>" class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0">view</span>
						</p>
						<div id="modal<?php echo $job['item_id']; ?>" class="modal fade border-0 rounded-0"
							 tabindex="-1"
							 aria-labelledby="modal" aria-hidden="true">
						</div>
					<?php } ?>
				</div>
				<div class="col-md-9 mb-4">
					<h3 class="mb-4"><?php echo $job['title']; ?></h3> <h5
						class="dark-grey-text"><?php echo $job['text_date']; ?></h5>
					<?php echo $job['content']; ?>
				</div>
			</div>
		<?php } ?>
		<hr>
	</section>

	<section id="teaching-publications" class="pt-5">
		<div class="ms-auto text-end">
			<h2 class="mt-5 mb-3 h2-responsive">Teaching and publications</h2>
		</div>
		<hr class="dotted mb-5 mt-4">

		<div class="row">
			<div class="col-md-12 mb-4">
				<?php echo apply_filters( 'the_content', get_post_meta( $post->ID, 'home_fields_teach', true ) ); ?>
			</div>
		</div>

		<hr class="mb-5">
	</section>

	<section id="contacts" class="pt-5">
		<div class="ms-auto text-end">
			<h2 class="mt-5 mb-3 h2-responsive">Contacts</h2>
		</div>
		<hr class="dotted mb-5 mt-4">

		<div class="row">
			<div class="col-md-12 mb-4">
				<?php echo apply_filters( 'the_content', get_post_meta( $post->ID, 'home_fields_contact', true ) ); ?>
			</div>
		</div>

		<hr class="mb-5">
	</section>

<?php get_footer();
