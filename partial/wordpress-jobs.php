<?php
$jobs = ln_get_jobs( 'work' );
foreach ( $jobs as $job ) {
	?>
	<div class="row">
		<div class="col-md-3 mt-5 mb-4">
			<?php if ( ! empty( $job['logo'] ) ) { ?>
				<picture>
					<img loading="lazy" width="300" height="225" src="<?php echo $job['logo']; ?>"
					     class="img-fluid" alt="<?php echo $job['title']; ?>"/>
				</picture>
			<?php } ?>
			<?php if ( ! empty( $job['images'] ) ) { ?>
				<picture>
					<img loading="lazy" width="300" height="225" src="<?php echo $job['first_image']; ?>"
					     class="img-fluid cursor" alt="<?php echo $job['first_image_alt']; ?>"
					     data-ref="modal<?php echo $job['item_id']; ?>" data-id="<?php echo $job['ID']; ?>">
				</picture>
				<p class="text-center mt-4 pt-3 mb-0">
					<span data-ref="modal<?php echo $job['item_id']; ?>" role="button"
					      data-id="<?php echo $job['ID']; ?>"
					      class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0">view</span>
				</p>
				<div id="modal<?php echo $job['item_id']; ?>" class="modal fade border-0 rounded-0"
				     tabindex="-1" aria-labelledby="modal" aria-hidden="true">
				</div>
			<?php } ?>
		</div>
		<div class="col-md-9 mt-5 mb-4">
			<h3 class="mb-4"><?php echo $job['title']; ?></h3>
			<h4 class="h5 dark-grey-text"><?php echo $job['text_date']; ?></h4>
			<?php echo $job['content']; ?>
		</div>
	</div>
<?php }
