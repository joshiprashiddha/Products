<?php
$product_ID = esc_html(get_post_meta(get_the_ID(), 'product_ID', true));
$product_price_currency = esc_html(get_post_meta(get_the_ID(), 'product_price_currency', true));
$product_price_price = esc_html(get_post_meta(get_the_ID(), 'product_price_price', true));
$product_URL = esc_html(get_post_meta(get_the_ID(), 'product_URL', true));
$product_image = esc_html(get_post_meta(get_the_ID(), 'product_image', true));
$product_cat_path = esc_html(get_post_meta(get_the_ID(), 'product_cat_path', true));
$product_category = esc_html(get_post_meta(get_the_ID(), 'product_category', true));
$product_property = esc_html(get_post_meta(get_the_ID(), 'product_property', true));
?>
<table>
    <tr>
        <td style='width: 100%'>product ID</td>
        <td><input type='text' size='80' name='product_ID' value='<?php echo $product_ID; ?>' /></td>
    </tr>
    <tr>
        <td style='width: 100%'>product price currency</td>
        <td><input type='text' size='80' name='product_price_currency' value='<?php echo $product_price_currency; ?>' /></td>
    </tr>
    <tr>
        <td style='width: 100%'>product price</td>
        <td><input type='text' size='80' name='product_price_price' value='<?php echo $product_price_price; ?>' /></td>
    </tr>
    <tr>
        <td style='width: 100%'>product URL</td>
        <td><input type='text' size='80' name='product_URL' value='<?php echo $product_URL; ?>' /></td>
    </tr>
    <tr>
        <td style='width: 100%'>product image</td>
        <td><input type='text' size='80' name='product_image' value='<?php echo $product_image; ?>' /></td>
    </tr>
    <tr>
        <td style='width: 100%'>product category path</td>
        <td><input type='text' size='80' name='product_cat_path' value='<?php echo $product_cat_path; ?>' /></td>
    </tr>
    <tr>
        <td style='width: 100%'>product category</td>
        <td><input type='text' size='80' name='product_category' value='<?php echo $product_category; ?>' /></td>
    </tr>
    <tr>
        <td style='width: 100%'>product property</td>
        <td><textarea style="width:100%;min-height:200px;" name='product_property'><?php echo $product_property; ?></textarea></td>
    </tr>
</table>

