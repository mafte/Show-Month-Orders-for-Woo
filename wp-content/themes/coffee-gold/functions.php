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

	// Set HERE the delay (in days)
	$duration = 3; // 3 days

	// UPDATE: Get the order ID and the WC_Order object
	if (isset($_GET['order_id']))
		$order = wc_get_order(absint($_GET['order_id']));

	$delay = $duration * 24 * 60 * 60; // (duration in seconds)
	$date_created_time  = strtotime($order->get_date_created()); // Creation date time stamp
	$date_modified_time = strtotime($order->get_date_modified()); // Modified date time stamp
	$now = strtotime("now"); // Now  time stamp

	// Using Creation date time stamp
	if (($date_created_time + $delay) >= $now) {

		$_GET['redirect'] = "http://lexart-labs.local/my-account/orders/";
		$_SESSION['message_cancel_order'] = true;
		return $custom_statuses;
	} else return $statuses;
}


add_action('wp_head', 'add_links');
function add_links() {
?>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital@0;1&family=Quicksand:wght@300&display=swap" rel="stylesheet">
<?php
};
