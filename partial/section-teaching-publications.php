<section id="teaching-publications" class="pt-0">

	<div class="accordion bg-black col-md-12 mb-4" id="accordion-teaching-publications">
		<div class="accordion-item border-0 no-border-radius bg-black">
			<div class="accordion-header border-0 no-border-radius bg-black mt-4 mb-3" id="accordion-teaching-publications-heading">
				<h2 class="accordion-button collapsed bg-black border-0 no-border-radius px-0 cursor"
				    data-bs-toggle="collapse" data-id="teaching-publications"
				    data-bs-target="#accordion-teach-pubs" aria-expanded="false"
				    aria-controls="accordion-teach-pubs">
						Teaching and publications
				</h2>
			</div>
			<div id="accordion-teach-pubs" class="accordion-collapse collapse"
			     aria-labelledby="accordion-teaching-publications" data-bs-parent="#accordion-teaching-publications">
				<div class="row">
					<div class="col-md-12 mt-3 mb-4">
						<?php
						global $post;
						echo apply_filters(
							'the_content',
							get_post_meta( $post->ID, 'home_fields_teach', true )
						);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr class="mb-0 mt-0">
</section>