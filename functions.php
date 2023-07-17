<?php

add_filter( 'woocommerce_shipping_calculator_enable_address', '__return_true' );

// Guardar la dirección en la sesión cuando se actualiza la calculadora de envío
function codigoverso_update_shipping_address() {
    if(isset($_POST['calc_shipping_address'])) {
        $address = sanitize_text_field($_POST['calc_shipping_address']);
        WC()->session->set('shipping_address_1', $address);
    }
}
add_action('woocommerce_calculated_shipping', 'codigoverso_update_shipping_address');

// Añadir la dirección guardada al formulario de pago
function codigoverso_custom_checkout_fields($fields) {
    if($address = WC()->session->get('shipping_address_1')) {
        $fields['shipping']['shipping_address_1']['default'] = $address;
    }
    return $fields;
}

add_action('plugins_loaded', function (){
    add_filter('woocommerce_checkout_fields', 'custom_checkout_fields',10,1);
});
