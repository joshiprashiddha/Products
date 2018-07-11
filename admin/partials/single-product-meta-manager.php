<?php
    $product_ID = esc_html( get_post_meta( $product->ID, 'product_ID', true ) );
    $product_price_currency = esc_html( get_post_meta( $product->ID, 'price_currency', true ) );
    ?>
    <table>
        <tr>
            <td style="width: 100%">Product ID</td>
            <td><input type="text" size="80" name="product_ID" value="<?php echo $product_ID; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Price Currency</td>
            <td><input type="text" size="80" name="price_currency" value="<?php echo $price_currency; ?>" /></td>
        </tr>
    </table>

