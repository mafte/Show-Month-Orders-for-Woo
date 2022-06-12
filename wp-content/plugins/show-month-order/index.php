<?php

/**
 * Show Month Orders (for Woo)
 *
 * @package           ShowMonthOrders
 * @author            Manuel Castillo
 * @copyright         2019 Manuel Castillo
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Show Month Orders (for Woo)
 * Plugin URI:        https://github.com/mafte/Show-Month-Orders-for-Woo
 * Description:       Lista las ordenes de compra correspondientes al mes actual
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Manuel Castillo
 * Author URI:        https://github.com/mafte
 * Text Domain:       show-month-orders
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:
 */


add_action('admin_enqueue_scripts', 'load_admin_styles');
function load_admin_styles() {
    wp_enqueue_style('show-orders-styles', plugin_dir_url(__FILE__) . 'style.css', false, '1.0.0');
}

class ShowOrders {
    private $show_orders_options;

    public function __construct() {
        add_action('admin_menu', array($this, 'show_orders_add_plugin_page'));
        add_action('admin_init', array($this, 'show_orders_page_init'));
    }

    public function show_orders_add_plugin_page() {
        add_menu_page(
            'Show Month Orders', // page_title
            'Show Month Orders', // menu_title
            'manage_options', // capability
            'show-orders', // menu_slug
            array($this, 'show_orders_create_admin_page'), // function
            'dashicons-archive', // icon_url
            2 // position
        );
    }

    public function show_orders_create_admin_page() {
        $this->show_orders_options = get_option('show_orders_option_name'); ?>

        <style>
            #show-orders {}
        </style>

        <div class="wrap container-show-orders">
            <h2 class="title">Show Month Orders</h2>

            <?php include('orders.php'); ?>
        </div>
<?php }

    public function show_orders_page_init() {
        register_setting(
            'show_orders_option_group', // option_group
            'show_orders_option_name', // option_name
            array($this, 'show_orders_sanitize') // sanitize_callback
        );
    }
}
if (is_admin())
    $show_orders = new ShowOrders();


/**
 * Check if WooCommerce is activated
 */
if (!function_exists('is_woocommerce_activated')) {
    function is_woocommerce_activated() {
        if (class_exists('woocommerce')) {
            return true;
        } else {
            return false;
        }
    }
}
