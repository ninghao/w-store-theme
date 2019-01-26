<?php

/**
 * Billing fields
 * 
 * billing_first_name
 * billing_last_name
 * billing_company
 * billing_address_1
 * billing_address_2
 * billing_city
 * billing_postcode
 * billing_country
 * billing_state
 * billing_email
 * billing_phone
 * 
 * Shipping fields
 * 
 * shipping_first_name
 * shipping_last_name
 * shipping_company
 * shipping_address_1
 * shipping_address_2
 * shipping_city
 * shipping_postcode
 * shipping_country
 * shipping_state
 * 
 * Field meta
 * 
 * type – type of field (text, textarea, password, select)
 * label – label for the input field
 * placeholder – placeholder for the input
 * class – class for the input
 * required – true or false, whether or not the field is require
 * clear – true or false, applies a clear fix to the field/label
 * label_class – class for the label element
 * options – for select boxes, array of options (key => value pairs)
 */
add_filter( 'woocommerce_checkout_fields' , 'w_store_override_checkout_fields' );

function w_store_override_checkout_fields( $fields ) {
  // make field optional.
  $fields['billing']['billing_country']['required'] = false;
  $fields['billing']['billing_last_name']['required'] = false;
  $fields['billing']['billing_email']['required'] = false;

  // modify field class.
  $fields['billing']['billing_first_name']['class'] = ['form-row-first'];
  $fields['billing']['billing_phone']['class'] = ['form-row-last'];
  $fields['billing']['billing_state']['class'] = ['form-row-first'];
  $fields['billing']['billing_city']['class'] = ['form-row-last'];

  // using css to hide un wanted field
  $fields['billing']['billing_country']['class'][] = 'hidden-field';

  // reorder billing fields
  $fields['billing']['billing_phone']['priority'] = 21;
  return $fields;
}

/**
 * modify default address fields.
 */
add_action( 'woocommerce_default_address_fields', 'w_store_default_address_fields' );

function w_store_default_address_fields( $fields ) {
  // change field order
  $fields['first_name']['priority'] = 10;
  $fields['last_name']['priority'] = 20;
  $fields['country']['priority'] = 30;
  $fields['state']['priority'] = 40;
  $fields['city']['priority'] = 50;
  $fields['address_1']['priority'] = 60;
  $fields['postcode']['priority'] = 70;

  // set field to not required.
  $fields['last_name']['required'] = false;
  $fields['country']['required'] = false;

  // using css to hide fields.
  $fields['last_name']['class'][] = 'hidden-field';
  $fields['country']['class'][] = 'hidden-field';

  return $fields;
}

/**
 * woocommerce_address_to_edit
 */
add_filter('woocommerce_address_to_edit', 'w_store_address_to_edit');

function w_store_address_to_edit( $fields ) {
  // modify field class.
  $fields['billing_first_name']['class'] = [];
  $fields['billing_state']['class'] = ['form-row-first'];
  $fields['billing_city']['class'] = ['form-row-last'];
  return $fields;
}

/**
 * chinese address output
 */
add_filter( 'woocommerce_localisation_address_formats', 'woocommerce_custom_address_format', 20 );

function woocommerce_custom_address_format( $formats ) {
  $formats[ 'CN' ]  = "<strong>{name}</strong>：{state}，{city}，{address_1}，{postcode}";
    
  return $formats;
}

/**
 * woocommerce_show_page_title
 */
add_filter( 'woocommerce_show_page_title', 'w_store_show_page_title' );

function w_store_show_page_title() {
  return !is_front_page();
}

/**
 * woocommerce_before_shop_loop
 */
add_action( 'woocommerce_before_shop_loop', 'w_store_before_shop_loop', 1 );

function w_store_before_shop_loop() {
  remove_action( 'woocommerce_before_shop_loop', 'storefront_sorting_wrapper', 9 );
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
  remove_action( 'woocommerce_before_shop_loop', 'storefront_woocommerce_pagination', 30 );
  remove_action( 'woocommerce_before_shop_loop', 'storefront_sorting_wrapper_close', 31 );
}

/**
 * woocommerce_before_shop_loop
 */
add_action( 'woocommerce_after_shop_loop', 'w_store_after_shop_loop', 1 );

function w_store_after_shop_loop() {
  remove_action( 'woocommerce_after_shop_loop', 'storefront_sorting_wrapper', 9 );
  remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
  remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
  // add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 30 );
  remove_action( 'woocommerce_after_shop_loop', 'storefront_sorting_wrapper_close', 31 );
}
