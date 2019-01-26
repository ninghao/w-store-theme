<?php

/**
 * storefront_sticky_single_add_to_cart
 */
function storefront_sticky_single_add_to_cart() {
	global $product;

	if ( class_exists( 'Storefront_Sticky_Add_to_Cart' ) || true !== get_theme_mod( 'storefront_sticky_add_to_cart' ) ) {
		return;
	}

	if ( ! is_product() ) {
		return;
	}

	$params = apply_filters(
		'storefront_sticky_add_to_cart_params', array(
			'trigger_class' => 'entry-summary',
		)
	);

	wp_localize_script( 'storefront-sticky-add-to-cart', 'storefront_sticky_add_to_cart_params', $params );

	wp_enqueue_script( 'storefront-sticky-add-to-cart' );
	?>
		<section class="storefront-sticky-add-to-cart">
			<div class="col-full">
				<div class="storefront-sticky-add-to-cart__content">
					<?php echo wp_kses_post( woocommerce_get_product_thumbnail() ); ?>
					<div class="storefront-sticky-add-to-cart__content-product-info">
						<span class="storefront-sticky-add-to-cart__content-title"><strong><?php the_title(); ?></strong></span>
						<span class="storefront-sticky-add-to-cart__content-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></span>
						<?php echo wp_kses_post( wc_get_rating_html( $product->get_average_rating() ) ); ?>
					</div>
					<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="storefront-sticky-add-to-cart__content-button button alt">
						<?php echo esc_attr( $product->add_to_cart_text() ); ?>
					</a>
				</div>
			</div>
		</section><!-- .storefront-sticky-add-to-cart -->
	<?php
}