<?php
/**
 * Work Experience.
 *
 * @package London
 */

global $n, $job; ?>
	<?php if ( empty( $job['about'] ) ) { ?>
		<div class="col-md-12 mt-3 mb-4">
            <h3 class="py-3"><?php echo esc_attr( $job['title'] ); ?></h3>
			<hr class="mb-4 mt-4">
		</div>
	<?php } ?>
	<?php if ( ! empty( $job['about'] ) ) {
		$about = wp_strip_all_tags( get_post_meta( $job['ID'], 'job_fields_about', true ) );
        ?>
        <div class="col-md-12 mt-3 mb-4">
            <h3 class="py-3">
                <abbr title="<?php echo esc_html( $about ); ?>"><?php echo esc_attr( $job['title'] ); ?></abbr>
            </h3>
            <hr class="mb-4 mt-4">
        </div>
	<?php } ?>
	<?php if ( 0 !== $n % 2 ) { ?>

	<div class="wp-block-media-text is-stacked-on-mobile">
		<?php if ( ! empty( $job['logo'] ) && empty( $job['images'] ) ) { ?>
			<figure class="wp-block-media-text__media">
				<img decoding="async" width="300" height="225"
					 src="<?php echo $job['logo']; ?>"
					 alt="<?php echo $job['title']; ?>" class="size-full"/>
			</figure>
		<?php } ?>
		<?php if ( ! empty( $job['logo'] )&& ! empty( $job['images'] ) ) { ?>
			<figure class="wp-block-media-text__media">
				<img data-ref="modal<?php echo $job['item_id']; ?>" data-id="<?php echo $job['ID']; ?>" decoding="async" width="300" height="225" src="<?php echo $job['logo']; ?>"
					 alt="<?php echo $job['title']; ?>" class="size-full cursor"/>
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
		<?php if ( ! empty( $job['logo'] ) && empty( $job['images'] ) ) { ?>
			<figure class="wp-block-media-text__media">
				<img decoding="async" width="300" height="225"
					 src="<?php echo $job['logo']; ?>"
					 alt="<?php echo $job['title']; ?>" class="size-full"/>
			</figure>
		<?php } ?>
		<?php if ( ! empty( $job['logo'] )&& ! empty( $job['images'] ) ) { ?>
			<figure class="wp-block-media-text__media">
				<img data-ref="modal<?php echo $job['item_id']; ?>" data-id="<?php echo $job['ID']; ?>" decoding="async" width="300" height="225" src="<?php echo $job['logo']; ?>"
					 alt="<?php echo $job['title']; ?>" class="size-full cursor"/>
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
