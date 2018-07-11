<?php

class Product_Import_Handler{
    private $import_url;
    
    public function __construct($import_url) {
        $this->import_url = $import_url;
    }
    
    public function importStart(){
                
        // remote data
        //$this->import_url='http://pf.tradetracker.net/?aid=1&encoding=utf-8&type=xml-v2&fid=381490&categoryType=2&additionalType=2';
        //$response = wp_remote_get($this->import_url);
        
        //$body = wp_remote_retrieve_body( $response );
        //if (is_wp_error($body)) return;
        
        /*
         * After saving the file and keeping the track of this file
         * in database
         * we can run the parser and importer in schedular
         * via cron job for the larger files
         *
         */
        //file_put_contents(plugin_dir_path( __FILE__ ).'/tmp/'.date('m-d-Y_hia').'.xml', $body);
        
        /*
         * for now i am going to parse it as online
         */
        //$products = new SimpleXMLElement($body);
        $data = file_get_contents('C:\wamp64\www\wordpress\wp-content\plugins\Products\admin\partials\tmp\07-11-2018_0933pm.xml');
        $products = new SimpleXMLElement($data);

        $author_id = get_current_user_id();
        
            
	foreach ($products as $product) {
            $post_id = -1;
            if (!current_user_can('publish_posts')) {
                return $post_id;
            }

            $ID = $product->attributes()->ID;
            $name = $product->name;
           
            $price_currency = $product->attributes()->currency;
            $price_price = $product->price;
            $URL = $product->URL;
            $product_image = $product->images->image;
            $product_description = $product->description;
            $product_cat_path = $product->categories->category->attributes()->path;
            $category = $product->categories->category;
            
            
            /*
             * wordpress post creation
             */
            if (!$author_id) {
                return $post_id;
            }
            
            $title = sanitize_text_field(wp_strip_all_tags($name)); // remove any junk
            $title = esc_html(wp_unslash($title));
            $slug = sanitize_title_with_dashes($title); // converts to a usable post_name
            $post_type = 'product';
            $content = $product_description;
            
            // If the page doesn't already exist, then create it (by title & slug)
            if (null == get_page_by_title($title) && empty(get_posts(array('name' => $slug)))) {
                $post_id = wp_insert_post(
                    array(
                        'post_name' => $slug,
                        'post_title' => $title,
                        'post_content' => $content,
                        'post_type' => $post_type,
                        'post_author' => $author_id,
                        'comment_status' => 'closed',
                        'ping_status' => 'closed',
                        'post_status' => 'publish',
                    )
                );

                if ($post_id && $post_id > 0) {
                    update_post_meta($post_id, 'product_ID', (string)$ID);
                    update_post_meta($post_id, 'product_price_currency', (string)$price_currency);
                    update_post_meta($post_id, 'product_price_price', (string)$price_price);
                    update_post_meta($post_id, 'product_URL', (string)$URL);
                    update_post_meta($post_id, 'product_image', (string)$product_image);
                    update_post_meta($post_id, 'product_cat_path', (string)$product_cat_path);
                    update_post_meta($post_id, 'product_category', (string)$category);
                }
                
                foreach($product->properties->property as $property){ 
                    $property_name = $property->attributes()->name;
                    $property_value = $property->value;
                    
                
                    if ($post_id && $post_id > 0) {
                        update_post_meta($post_id, 'product_property_name', (string)$property_name);
                        update_post_meta($post_id, 'product_'.$property_name.'_value', (string)$property_value);
                     }
                }
            echo "success";
                exit();
                    }
        }
    }
}