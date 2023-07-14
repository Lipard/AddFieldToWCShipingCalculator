# AddFieldToWCShipingCalculator
Añadimos un campo a la calculadora de envio que aparece en el carrito de woocommerce.

## Descripción
Añadimos un campo de texto a la calculadora de envio que aparece en el carrito de woocommerce. Este campo se guarda por defecto como dirección de envio del pedido.
Lo unico que hay que hacer es una copia de la funcion que se adjunta en el funcions.php y copiar el shiping-calculator.php en la carpeta woocommerce/cart/shipping-calculator.php de nuestro tema.

Basicamente lo que se ha añadido al archivo de shiping-calculator.php es lo siguiente:
```php
 <?php
        //Lo tenemos en false por defecto por que la funcionalidad nos la da nuestra funcion
        if ( apply_filters( 'woocommerce_shipping_calculator_enable_address', false ) ) : ?>
            <p class="form-row form-row-wide" id="calc_shipping_address_field">
                <label for="calc_shipping_address" class="screen-reader-text"><?php esc_html_e( 'Address:', 'woocommerce' ); ?></label>
                <input type="text" class="input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_address() ); ?>" placeholder="<?php esc_attr_e( 'Address', 'woocommerce' ); ?>" name="calc_shipping_address" id="calc_shipping_addres" />
            </p>
        <?php endif; ?>

```

Lo que nos permite añadir el campo address, pero se puede replicar este funcionamiento con cualquier campo deseado.
