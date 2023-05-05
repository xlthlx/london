<section id="skills-education" class="pt-5">
	<div class="ms-auto text-end">
		<h2 class="mt-5 mb-3">Skills and education</h2>
	</div>
	<hr class="dotted mb-5 mt-4">

	<div class="row mt-3">
		<div class="col-md-12 mb-4">
			<h3 class="mb-4">Skills</h3>
			<hr class="mb-4 mt-0"/>
			<?php
			global $post;
			echo apply_filters(
				'the_content',
				get_post_meta( $post->ID, 'home_fields_skills', true )
			);
			?>
			<h3 class="mb-4 mt-5">Education</h3>
			<hr class="mb-4 mt-0"/>
			<?php
			echo apply_filters(
				'the_content',
				get_post_meta( $post->ID, 'home_fields_edu', true )
			);
			?>
		</div>
	</div>

	<div class="modal fade" id="containerModal" tabindex="-1"
	     aria-labelledby="containerModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header border-0 rounded-0">
					<button type="button" class="btn-close border-0 rounded-0"
					        data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<img id="inlineFrameImg" src="" alt=""/>
					<?php // @codingStandardsIgnoreStart ?>
					<iframe id="inlineFramePdf" src=""></iframe>
					<?php // @codingStandardsIgnoreEnd ?>
				</div>
			</div>
		</div>
	</div>

	<hr/>
</section>