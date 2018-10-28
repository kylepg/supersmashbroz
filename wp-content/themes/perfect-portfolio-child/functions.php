<?php
/**
 * Perfect Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Perfect_Portfolio
 */


add_filter('woocommerce_product_add_to_cart_text', function ($text) {
    global $product;
    if ($product->is_type('variable')) {
        $text = $product->is_purchasable() ? __('View product', 'woocommerce') : __('Read more', 'woocommerce');
    }
    return $text;
}, 10);
