<?php
/**
 * WordPress Jobs.
 *
 * @package London
 */

global $n, $job; ?>
<?php if ( 0 !== $n % 2 ) { ?>
	<div class="wp-block-media-text is-stacked-on-mobile pt-4 pb-4">
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
			<h4 class="wp-block-heading"><?php echo $job['title']; ?></h4>
			<p><em>Contract</em></p>
			<h5 class="wp-block-heading has-grey-color has-text-color has-link-color">
				<?php echo $job['text_date']; ?>
			</h5>
			<?php echo $job['content']; ?>
		</div>
	</div>
<?php } else { ?>
	<div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-top pt-4 pb-4">
		<div class="wp-block-media-text__content">
			<h4 class="wp-block-heading"><?php echo $job['title']; ?></h4>
			<p><em>Contract</em></p>
			<h5 class="wp-block-heading has-grey-color has-text-color has-link-color">
				<?php echo $job['text_date']; ?>
			</h5>
			<?php echo $job['content']; ?>
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
