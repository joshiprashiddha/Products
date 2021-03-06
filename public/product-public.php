<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <email@example.com>
 */
class Testrest_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/pagination.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/pagination.min.js', array('jquery'), $this->version, false);
    }

    function load_product_template($template) {
        global $wp_query, $post;
        if ($post->post_type == "product") {
            if (file_exists(plugin_dir_path(__FILE__) . '/partials/single-product.php')) {
                return plugin_dir_path(__FILE__) . "/partials/single-product.php";
            }
        }
        return $template;
    }

    public function get_custom_taxonomy_template() {
        global $url;
        if (file_exists(plugin_dir_path(__FILE__) . '/partials/product.php')) {
            $url = get_option('home') . '/wp-json/wp/v2/products-api?per_page=5&page=1';
            //$response = wp_remote_get($url);
            //if (is_wp_error($response)) {
            //    return;
            //}
            //$products = json_decode(wp_remote_retrieve_body($response));
            //if (empty($products)) {
            //    return;
            //}
            return plugin_dir_path(__FILE__) . "/partials/product.php";
        }
        return $template;
    }

}
