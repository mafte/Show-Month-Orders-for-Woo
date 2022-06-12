<?php
session_start();

add_action('wp_enqueue_scripts', 'coffe_gold_enqueue_styles');
function coffe_gold_enqueue_styles() {
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_filter('woocommerce_valid_order_statuses_for_cancel', 'custom_valid_order_statuses_for_cancel', 10, 2);
function custom_valid_order_statuses_for_cancel($statuses, $order) {

	// Set HERE the order statuses where you want the cancel button to appear
	$custom_statuses    = array('completed', 'pending', 'processing', 'on-hold', 'failed');

	return $custom_statuses;
}

add_filter('woocommerce_order_cancelled_notice', 'ow_filter_notice');
function ow_filter_notice($message) {
	return 'Orden de <span class="show-order-message">' . wp_get_current_user()->user_email . '</span> cancelada';
}


add_action('wp_head', 'add_links');
function add_links() {
?>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital@0;1&family=Quicksand:wght@300&display=swap" rel="stylesheet">
<?php
};
