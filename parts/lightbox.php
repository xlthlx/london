<?php
/**
 * Lightbox functions.
 *
 * @package London
 */

header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: POST, GET' );
header( 'Access-Control-Allow-Credentials: true' );
header( 'Cache-Control: no-cache, no-store, must-revalidate' );
header( 'Pragma: no-cache' );
header( 'Expires: 0' );

define( 'WP_USE_THEMES', false );
require str_replace( '/wp-content/themes/london/parts', '', dirname( __FILE__ ) ) . '/wp-load.php';

$actual_id            = filter_var( $_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT );
$images[ $actual_id ] = get_post_meta( $actual_id, 'job_fields_images', true );
if ( empty( $images[ $actual_id ] ) ) {
	$images[ $actual_id ] = get_post_meta( $actual_id, 'work_fields_images', true );
}
?>
<div class="modal-dialog modal-dialog-centered modal-lg border-0 rounded-0">
	<div class="modal-content border-0 rounded-0">
		<div class="modal-header border-0 rounded-0">
			<div id="number" class="number-text">1/<?php echo count( $images[ $actual_id ] ); ?></div>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body border-0 no-border-radius">
			<?php 
			foreach ( $images[ $actual_id ] as $key => $url ) {
				$image_id = get_post( $key );
				$alt      = $image_id->post_title;
				if ( 'http://localhost:1030' === home_url() ) {
					$url = str_replace( 'http://localhost:1030/img/', 'http://localhost:1030/wp-content/themes/london/img/', $url );
				}
				?>
				<div class="slides">
					<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" style="width:100%">
				</div>
				<?php 
			}
			wp_reset_postdata(); 
			?>
			<a class="prev" onclick="prevNext(-1)">&#10094;</a>
			<a class="next" onclick="prevNext(1)">&#10095;</a>
		</div>
		<div id="caption" class="modal-footer d-block border-0 rounded-0"></div>
	</div>
</div>
