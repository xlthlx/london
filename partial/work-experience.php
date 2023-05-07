<?php
$jobs = ln_get_jobs( 'job' );
foreach ( $jobs as $job ) {
	?>
	<div class="row">
		<?php if ( empty( $job['about'] ) ) { ?>
			<div class="col-md-12 mt-3 mb-4">
				<h3 class="mb-4"><?php echo $job['title']; ?></h3>
				<hr class="mb-4 mt-0">
			</div>
		<?php } ?>
		<?php if ( ! empty( $job['about'] ) ) { ?>
			<div class="accordion bg-black col-md-12 mb-4"
			     id="accordion<?php echo $job['item_id']; ?>">
				<div class="accordion-item border-0 no-border-radius bg-black">
					<div class="accordion-header border-0 no-border-radius bg-black mb-2"
					     id="accordion<?php echo $job['item_id']; ?>-heading">
						<h3 class="accordion-button collapsed bg-black h3 border-0 no-border-radius mb-0 px-0 cursor"
						    data-bs-toggle="collapse" data-id="<?php echo $job['ID']; ?>"
						    data-bs-target="#accordion-<?php echo $job['item_slug']; ?>" aria-expanded="false"
						    aria-controls="accordion-<?php echo $job['item_slug']; ?>">
							<?php echo $job['title']; ?>
						</h3>
					</div>
					<div id="accordion-<?php echo $job['item_slug']; ?>" class="accordion-collapse collapse"
					     aria-labelledby="accordion<?php echo $job['item_id']; ?>"
					     data-bs-parent="#accordion<?php echo $job['item_id']; ?>">
						<p class="dark-grey-text pt-5">About the company</p>
						<?php echo apply_filters( 'the_content', get_post_meta( $job['ID'], 'job_fields_about', true ) ); ?>
					</div>
				</div>
				<hr class="mb-4 mt-0">
			</div>
		<?php } ?>
		<div class="col-md-3 mb-0">
			<?php if ( ! empty( $job['logo'] ) ) { ?>
				<picture>
					<img loading="lazy" width="300" height="225" src="<?php echo $job['logo']; ?>"
					     class="img-fluid mb-4" alt="<?php echo $job['title']; ?>"/>
				</picture>
			<?php } ?>
			<?php if ( ! empty( $job['images'] ) ) { ?>
				<picture>
					<img loading="lazy" width="300" height="225" src="<?php echo $job['first_image']; ?>"
					     class="img-fluid mb-4 cursor" alt="<?php echo $job['first_image_alt']; ?>"
					     data-ref="modal<?php echo $job['item_id']; ?>" data-id="<?php echo $job['ID']; ?>">
				</picture>
				<p class="text-center mt-3 pt-0 mb-3">
					<span data-ref="modal<?php echo $job['item_id']; ?>"
					      role="button" data-id="<?php echo $job['ID']; ?>"
					      class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0">view</span>
				</p>
				<div id="modal<?php echo $job['item_id']; ?>" class="modal fade border-0 rounded-0"
				     tabindex="-1" aria-labelledby="modal" aria-hidden="true">
				</div>
			<?php } ?>
		</div>

		<div class="col-md-9 mb-4">
			<h4><?php echo $job['job_title']; ?></h4>
			<div class="dark-grey-text">
				<h5><?php echo $job['start_date']; ?>
					- <?php echo $job['end_date']; ?></h5>
				<p>
					<small><em><?php echo $job['location']; ?></em></small>
				</p>
				<?php echo $job['content']; ?>
				<p class="dark-grey-text">
					<em><?php echo $job['tech']; ?></em></p>
			</div>
		</div>
	</div>
	<hr class="dotted mb-4 mt-4">
<?php }
