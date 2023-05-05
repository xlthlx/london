<section id="teaching-publications" class="pt-5">
	<div class="ms-auto text-end">
		<h2 class="mt-5 mb-3">Teaching and publications</h2>
	</div>
	<hr class="dotted mb-5 mt-4">

	<div class="row">
		<div class="col-md-12 mb-4">
			<?php
			global $post;
			echo apply_filters(
				'the_content',
				get_post_meta( $post->ID, 'home_fields_teach', true )
			);
			?>
		</div>
	</div>

	<hr/>
</section>