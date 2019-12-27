insert this in an appropriate place in header.php where you want the icon to appear.
<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php
    }
        ?></a>
 
<?php } ?>

After adding the above code, go to functions.php and add the following at the end:
 

function themename_add_to_cart_fragment( $fragments) {
    ob_start();
    $count= WC()->cart->cart_contents_count;
    ?><a class="cart-contents"href="<?php echo WC()->cart->get_cart_url(); ?>"title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if( $count> 0 ) {
        ?>
        <span class="cart-contents-count"><?php echoesc_html( $count); ?></span>
        <?php           
    }
        ?></a><?php
    $fragments['a.cart-contents'] = ob_get_clean();
    
    return$fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'themename_add_to_cart_fragment');

 
 
The above code will enable ajax refresh of cart contents in header. It’s not required, if you do not want it.
