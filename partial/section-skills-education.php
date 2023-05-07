<section id="skills-education" class="pt-0">

	<div class="accordion bg-black col-md-12 mb-4" id="accordion-skills-education">
		<div class="accordion-item border-0 no-border-radius bg-black">
			<div class="accordion-header border-0 no-border-radius bg-black mt-4 mb-3"
			     id="accordion-skills-education-heading">
				<h2 class="accordion-button collapsed bg-black border-0 no-border-radius px-0 cursor"
				    data-bs-toggle="collapse" data-id="skills-education"
				    data-bs-target="#accordion-skills-edu" aria-expanded="false"
				    aria-controls="accordion-skills-edu">
						Skills and education
				</h2>
			</div>
			<div id="accordion-skills-edu" class="accordion-collapse collapse"
			     aria-labelledby="accordion-skills-education" data-bs-parent="#accordion-skills-education">
				<div class="row">
					<div class="col-md-12 mt-3 mb-4">
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
			</div>
		</div>
	</div>
	<hr class="mb-0 mt-0">
</section>