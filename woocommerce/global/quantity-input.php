<?php
/**
 * Product quantity inputs
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	/* translators: %s: Quantity. */
	$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );
	?>
	<div class="quantity">
		<?php do_action( 'woocommerce_before_quantity_input_field' ); ?>
		<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
   		<div class="quantity-input dec-btn">-</div>
		<input
			type="text"
			id="<?php echo esc_attr( $input_id ); ?>"
			class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
            data-step="<?php echo esc_attr( $step ); ?>" 
            data-min="<?php echo esc_attr( $min_value ); ?>" 
            data-max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>" 
            name="<?php echo esc_attr( $input_name ); ?>" 
            value="<?php echo esc_attr( $input_value ); ?>" 
            title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" 
			size="4" 
			placeholder="<?php echo esc_attr( $placeholder ); ?>"
            pattern="<?php echo esc_attr( $pattern ); ?>" 
			inputmode="<?php echo esc_attr( $inputmode ); ?>"
			autocomplete="<?php echo esc_attr( isset( $autocomplete ) ? $autocomplete : 'on' ); ?>"
			aria-labelledby="<?php echo ( ! empty( $args['product_name'] ) ) ? sprintf( esc_attr__( '%s quantity', 'woocommerce' ), $args['product_name'] ) : ''; ?>" />
		<div class="quantity-input inc-btn">+</div>
		<?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
	</div>
	<?php
}
