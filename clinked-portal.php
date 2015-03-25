<?php
/*
Plugin Name: Clinked Client Portal
Plugin URI: http://clinked.com/client-area
Description: The Clinked Client Portal plugin is a great addition to the popular <a href="http://clinked.com">Clinked application</a> - a branded, feature rich client portal. Using the plugin couldn't be easier. Simply include the shortcode <strong>[clinked_portal]</strong> in the desired page and you're done. If you don't already have an account visit our website and <a href="http://clinked.com/packages">sign up</a> for a free trial.
Author: Clinked
Version: 1.0
Author URI: http://clinked.com
License: GPLv2
*/

function shortcode_handler($atts) {

	wp_register_style('clinked-portal-style', plugin_dir_url(__FILE__).'app/styles/clinked-portal.css');
	wp_enqueue_style('clinked-portal-style');
	wp_enqueue_script('json2');
	wp_enqueue_script('jquery');
	wp_register_script('clinked-portal-script', plugin_dir_url(__FILE__).'app/clinked-portal.js');
	wp_enqueue_script('clinked-portal-script');

	ob_start();
	?>
		<div id="clinked-portal" data-appurl="<?= plugin_dir_url(__FILE__); ?>app">
		    <div class="header marginal hidden">
				<span class="left"></span>
				<span class="right"></span>
				<input class="form-control hidden" type="search">
			</div>
			<div data-marginals="0" class="wrapper">
				<div class="loader hidden">
					<span></span>
				</div>
				<a href="#" class="notifications hidden">
					<span class="badge"></span>
				</a>
				<div class='refresh'><!-- TODO move to native --></div>
				<div class='view'></div>
			</div>
			<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="modalLabel"></h4>
						</div>
						<div class="modal-body">
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	return ob_get_clean();
}

add_shortcode('clinked_portal', 'shortcode_handler');

?>
