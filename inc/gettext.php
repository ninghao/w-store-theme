<?php

/**
 * gettext_with_context
 * https://codex.wordpress.org/Plugin_API/Filter_Reference/gettext_with_context
 */
function w_store_gettext( $translated, $text,  $domain ) {
  if ( $domain == 'woocommerce' ) {
    switch ( $text ) {
      case '':
        // alter text or translated text string.
        break;
    }
  }
  return $translated;
}
add_filter( 'gettext', 'w_store_gettext', 20, 3 );

function w_store_ngettext( $translation, $single, $plural, $number, $domain ) {
  if ( $domain == 'woocommerce' ) {
    switch ( $plural ) {
      case '%d: total results':
        $translation = '%d 个结果';
        break;
    }

    switch ( $single ) {
      case 'Showing the single result':
        $translation = '%d 个结果';
        break;
    }
  }

  return $translation;
}
add_filter( 'ngettext', 'w_store_ngettext', 20, 5 );
