<?php

add_filter( 'woocommerce_shipping_calculator_enable_address', '__return_true' );
add_action('woocommerce_calculated_shipping','codigoverso_add_calculated_shipping_fields');

/**
 * Añadimos a la calculadora el campo de dirección, previamente se ha modificado el shipping-calculator.php para añadirle este campo.
 */
function codigoverso_add_calculated_shipping_fields() {
    $address['street']     = isset( $_POST['address'] ) ? wc_clean( wp_unslash( $_POST['address'] ) ) : '';
    if($address['street'] != '') {
        WC()->customer->set_shipping_address( $address['street'] );
    }
}