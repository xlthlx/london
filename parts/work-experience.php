<?php
/**
 * Work Experience.
 *
 * @package London
 */

global $n, $job; ?>
	<?php if ( empty( $job['about'] ) ) { ?>
		<div class="col-md-12 mt-3 mb-4">
			<h3 class="mb-4"><?php echo $job['title']; ?></h3>
			<hr class="mb-4 mt-0">
		</div>
	<?php } ?>
	<?php if ( ! empty( $job['about'] ) ) { ?>
		<div class="accordion bg-black col-md-12 pb-2 mb-4"
			 id="accordion<?php echo $job['item_id']; ?>">
			<div class="accordion-item border-0 no-border-radius bg-black">
				<div class="accordion-header border-0 no-border-radius bg-black mb-3"
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
	<?php if ( 0 !== $n % 2 ) { ?>

	<div class="wp-block-media-text is-stacked-on-mobile">
		<?php if ( ! empty( $job['logo'] ) ) { ?>
			<figure class="wp-block-media-text__media">
				<img decoding="async" width="300" height="225"
					 src="<?php echo $job['logo']; ?>"
					 alt="<?php echo $job['title']; ?>" class="size-full"/>
			</figure>
		<?php } ?>
		<?php if ( ! empty( $job['images'] ) ) { ?>
			<figure class="wp-block-media-text__media">
				<img data-ref="modal<?php echo $job['item_id']; ?>" data-id="<?php echo $job['ID']; ?>" decoding="async" width="300" height="225" src="<?php echo $job['first_image']; ?>"
					 alt="<?php echo $job['first_image_alt']; ?>" class="size-full cursor"/>
				<p class="text-md-center mt-md-3 pt-0 mb-3 pb-3">
					<span data-ref="modal<?php echo $job['item_id']; ?>"
						  role="button" data-id="<?php echo $job['ID']; ?>"
						  class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0">view</span>
				</p>
			</figure>
			<div id="modal<?php echo $job['item_id']; ?>" class="modal fade border-0 rounded-0"
				 tabindex="-1" aria-labelledby="modal" aria-hidden="true">
			</div>
		<?php } ?>
		<div class="wp-block-media-text__content">
			<h4 class="wp-block-heading"><?php echo $job['job_title']; ?></h4>
			<h5 class="wp-block-heading has-grey-color has-text-color has-link-color">
				<?php echo $job['start_date']; ?> - <?php echo $job['end_date']; ?>
			</h5>
			<p><small><em><?php echo $job['location']; ?></em></small></p>
			<?php echo $job['content']; ?>

			<p class="has-grey-color has-text-color has-link-color">
				<em><?php echo $job['tech']; ?></em>
			</p>
		</div>
	</div>
	<?php } else { ?>
	<div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-top">
		<div class="wp-block-media-text__content">
			<h4 class="wp-block-heading"><?php echo $job['job_title']; ?></h4>
			<h5 class="wp-block-heading has-grey-color has-text-color has-link-color">
				<?php echo $job['start_date']; ?> - <?php echo $job['end_date']; ?>
			</h5>
			<p><small><em><?php echo $job['location']; ?></em></small></p>
			<?php echo $job['content']; ?>
			<p class="has-grey-color has-text-color has-link-color"><em><?php echo $job['tech']; ?></em></p>
		</div>
		<?php if ( ! empty( $job['logo'] ) ) { ?>
			<figure class="wp-block-media-text__media">
				<img decoding="async" width="300" height="225"
					 src="<?php echo $job['logo']; ?>"
					 alt="<?php echo $job['title']; ?>" class="size-full"/>
			</figure>
		<?php } ?>
		<?php if ( ! empty( $job['images'] ) ) { ?>
			<figure class="wp-block-media-text__media">
				<img data-ref="modal<?php echo $job['item_id']; ?>" data-id="<?php echo $job['ID']; ?>" decoding="async" width="300" height="225" src="<?php echo $job['logo']; ?>"
					 alt="<?php echo $job['first_image_alt']; ?>" class="size-full cursor"/>
				<p class="text-md-center mt-md-3 pt-0 mb-3 pb-3">
				<span data-ref="modal<?php echo $job['item_id']; ?>"
					  role="button" data-id="<?php echo $job['ID']; ?>"
					  class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0">view</span>
				</p>
			</figure>
			<div id="modal<?php echo $job['item_id']; ?>" class="modal fade border-0 rounded-0"
				 tabindex="-1" aria-labelledby="modal" aria-hidden="true">
			</div>
		<?php } ?>
	</div>
<?php } ?>
<hr class="mb-4 mt-4">
