<div class="wrap">
<h1>Product</h1>
<form action="<?php echo admin_url( 'admin-post.php' ); ?>">
<?php settings_fields( 'product-settings-group' ); ?>
<?php do_settings_sections( 'product-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Product API</th>
        <td><input type="hidden" name="action" value="import_product">
        <input type="text" size="140" name="url" value="">
        </td>
        </tr>
        <tr valign="top">
            <th>
                <?php submit_button( 'Import My Products' ); ?>
            </th>
        </tr>
</form>
   