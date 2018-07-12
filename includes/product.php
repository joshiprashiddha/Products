<?php

class Product {

    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        if (defined('PRODUCT_VERSION')) {
            $this->version = PRODUCT_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'product';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {

        /**
         * actions and filters loading
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/product-loader.php';
        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/product-admin.php';
        /**
         * The class responsible for defining all actions that occur in the public or frontend.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/product-public.php';
        $this->loader = new Product_Loader();
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks() {

        $plugin_admin = new Product_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        $this->loader->add_action('admin_menu', $plugin_admin, 'product_plugin_create_menu');
        $this->loader->add_action('admin_init', $plugin_admin, 'register_product_import');
        $this->loader->add_action('admin_post_import_product', $plugin_admin, 'import_product_test');
        $this->loader->add_action('init', $plugin_admin, 'create_custom_post_type_product');
        $this->loader->add_action('admin_init', $plugin_admin, 'add_product_meta_box');
        $this->loader->add_action('save_post', $plugin_admin, 'add_product_meta_fields', 10, 2);
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks() {
        $plugin_public = new Testrest_Public($this->get_plugin_name(), $this->get_version());
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
        $this->loader->add_filter('single_template', $plugin_public, 'load_product_template');
        $this->loader->add_filter('archive_template', $plugin_public, 'get_custom_taxonomy_template');
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_loader() {
        return $this->loader;
    }

    public function get_version() {
        return $this->version;
    }

}
