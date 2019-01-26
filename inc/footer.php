<?php

/**
 * storefront_credit
 */
function storefront_credit() {
  ?>
  <div class="site-info">
      <?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) ) ); ?>
      <?php if ( apply_filters( 'storefront_credit_link', true ) ) { ?>
      <?php } ?>
  </div><!-- .site-info -->
  <?php
}
