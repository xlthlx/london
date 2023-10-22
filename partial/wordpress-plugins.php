<?php
$jobs = ln_get_jobs( 'plugins' );
foreach ( $jobs as $job ) {
	?>

	<div id="<?php echo $job['item_slug']; ?>" class="row">
		<div class="col-md-12">
			<h3 class="mt-3"><?php echo $job['title']; ?></h3>
			<hr class="mb-5 mt-4">
		</div>
		<div class="row mt-3">
			<div class="col-md-3 mb-0">
				<?php if ( ! empty( $job['logo'] ) ) { ?>
					<picture>
						<img loading="lazy" width="300" height="225" src="<?php echo $job['logo']; ?>"
						     class="img-fluid mb-4" alt="<?php echo $job['title']; ?>"/>
					</picture>
				<?php } ?>
			</div>
			<div class="col-md-9 mb-4">
				<div class="mb-5">
					<?php echo $job['content']; ?>
				</div>

				<?php if ( ! empty( $job['wp_url'] ) ) { ?>
					<a class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0"
					   href="<?php echo $job['wp_url']; ?>"
					   role="button" target="_blank">Get it on WordPress
						<svg width="20" height="20" aria-hidden="true" focusable="false" role="img"
						     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ml-2 pb-1">
							<path fill="currentColor"
							      d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z"></path>
						</svg>
					</a>
				<?php } ?>

				<?php if ( ! empty( $job['down_url'] ) ) { ?>
					<a class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0"
					   href="<?php echo $job['down_url']; ?>"
					   role="button" target="_blank">Download .zip
						<svg width="20" height="20" aria-hidden="true" focusable="false" role="img"
						     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ml-2 pb-1">
							<path fill="currentColor"
							      d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
						</svg>
					</a>
				<?php } ?>

				<?php if ( ! empty( $job['github_url'] ) ) { ?>
					<a href="<?php echo $job['github_url']; ?>"
					   role="button"
					   class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0"
					   target="_blank">
						View on GitHub
						<svg width="20" height="20" aria-hidden="true" focusable="false" role="img"
						     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="ml-2 pb-1">
							<path fill="currentColor"
							      d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path>
						</svg>
					</a>
				<?php } ?>

			</div>
			<div class="col-md-12 mb-4">
				<hr class="mb-4 mt-5">
				<?php echo $job['description']; ?>
			</div>

		</div>
	</div>
<?php } ?>

<hr/>