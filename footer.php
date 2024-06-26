<?php
/**
 * The template for displaying the footer
 *
 * @package London
 */

?>

</div>
</main>

<footer>
	<div class="footer-copyright py-2 text-end">

		<div class="container">
			<div class="row">
				<div class="kb-club col-10 py-3 text-start">
					<a target="blank" href="https://512kb.club" title="512KB Club Blue Team">
						<span class="kb-club-no-bg">512KB Club</span><span class="kb-club-bg">Blue Team</span>
					</a>
				</div>
				<div class="col-2 mb-0">
					<span style="display:none" id="top-arrow" class="top-arrow mt-3 mb-3">
						<a title="Back to top" href="#top">
							<svg width="25" height="25" data-icon="arrow-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path></svg>
						</a>
					</span>
				</div>
			</div>
		</div>

	</div>
</footer>


<div class="modal fade" id="containerModal" tabindex="-1"
	 aria-labelledby="containerModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header border-0 rounded-0">
				<button type="button" class="btn-close border-0 rounded-0"
						data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img id="inline-frame--img" src="" alt=""/>
				<?php // @codingStandardsIgnoreStart ?>
                <iframe id="inline-frame--pdf" src=""></iframe>
				<?php // @codingStandardsIgnoreEnd ?>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
<span id="fdd535028a359764030f8e3dc405859e"></span>
</body>
</html>
