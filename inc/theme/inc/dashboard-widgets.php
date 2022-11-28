<?php
/**
 * Dashboard widgets.
 *
 * @package London
 */

/**
 * Add a new dashboard widget.
 *
 * @return void
 */
function ln_add_dashboard_widgets() {
	wp_add_dashboard_widget( 'plausible_widget', 'Plausible statistics', 'ln_plausible_widget_callback' );
}

add_action( 'wp_dashboard_setup', 'ln_add_dashboard_widgets' );

/**
 * Output the contents of the dashboard widget.
 *
 * @return void
 */
function ln_plausible_widget_callback() {  ?>
	<div>
		<p>Click the button below to toggle your exclusion in analytics for this site.</p>
		<p>You currently <span id="plausible_not">are not</span><span id="plausible_yes">are</span>
			excluding your visits.<br/>
			<a id="plausible_button" href="javascript:toggleExclusion()">Exclude my visits</a></p>
	</div>

	<script>
		window.addEventListener('load', function () {
			let exclusionState = window.localStorage.plausible_ignore === "true"

			if ( exclusionState ) {
				document.getElementById("plausible_not").style.display = "none"
				document.getElementById("plausible_yes").style.display = "inline"
				document.getElementById("plausible_button").innerHTML = 'Stop excluding my visits'
			} else {
				document.getElementById("plausible_yes").style.display = "none"
				document.getElementById("plausible_not").style.display = "inline"
				document.getElementById("plausible_button").innerHTML = 'Exclude my visits'
			}
		});

		function toggleExclusion() {
			let exclusionState = window.localStorage.plausible_ignore === "true"

			if ( exclusionState ) {
				delete window.localStorage.plausible_ignore
				document.getElementById("plausible_yes").style.display = "none"
				document.getElementById("plausible_not").style.display = "inline"
				document.getElementById("plausible_button").innerHTML = 'Exclude my visits'
			} else {
				window.localStorage.plausible_ignore = "true"
				document.getElementById("plausible_not").style.display = "none"
				document.getElementById("plausible_yes").style.display = "inline"
				document.getElementById("plausible_button").innerHTML = 'Stop excluding my visits'
			}
		}
	</script>
	<?php
}
