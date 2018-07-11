<?php

/**
 * Plugin Name:       Products
 * Plugin URI:
 * Description:       Consumes the api for products, saves and displays the product in front end.
 * Version:           1.0.0
 * Author:            Prashiddha Raj Joshi
 * Author URI:
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       products
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('PRODUCT_VERSION', '1.0.0');

function activate_product() {
    require_once plugin_dir_path(__FILE__) . 'includes/product-activator.php';
    Product_Activator::activate();
}

function deactivate_product() {
    require_once plugin_dir_path(__FILE__) . 'includes/product-deactivator.php';
    Product_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_product');
register_deactivation_hook(__FILE__, 'deactivate_product');

require plugin_dir_path(__FILE__) . 'includes/product.php';

function run_product() {
    $product = new Product();
    $product->run();
}

run_product();