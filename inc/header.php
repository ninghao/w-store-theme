<?php

/**
 * storefront
 */
add_action( 'storefront_header', 'w_store_header' );

function w_store_header() {
  add_action( 'storefront_header', 'storefront_header_container', 1 );
  add_action( 'storefront_header', 'storefront_primary_navigation', 31 );
  add_action( 'storefront_header', 'storefront_site_branding', 40 );

  add_action( 'storefront_header', 'w_store_header_toolbar_wrapper', 50 );
  add_action( 'storefront_header', 'storefront_product_search', 51 );
  add_action( 'storefront_header', 'storefront_secondary_navigation', 52 );
  add_action( 'storefront_header', 'storefront_header_cart', 53 );
  add_action( 'storefront_header', 'w_store_header_toolbar_wrapper_close', 54 );

  add_action( 'storefront_header', 'storefront_header_container_close', 90 );
}

/**
 * storefront_header
 */
add_action( 'storefront_header', 'w_store_remove_parent_header_action' );

function w_store_remove_parent_header_action() {
  remove_action( 'storefront_header', 'storefront_header_container', 0 );
  remove_action( 'storefront_header', 'storefront_skip_links', 5 );
  remove_action( 'storefront_header', 'storefront_social_icons', 10 );
  remove_action( 'storefront_header', 'storefront_site_branding', 20 );
  remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
  remove_action( 'storefront_header', 'storefront_product_search', 40 );
  remove_action( 'storefront_header', 'storefront_header_container_close', 41 );
  remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42 );
  remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
  remove_action( 'storefront_header', 'storefront_header_cart', 60 );
  remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 68 );
}

/**
 * storefront_skip_links
 */
function storefront_skip_links() {
  // override
}

/**
 * storefront_primary_navigation
 */
function storefront_primary_navigation() {
  ?>
  <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'storefront' ); ?>">
  <button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span></span></button>
      <?php
      wp_nav_menu(
          array(
              'theme_location'  => 'primary',
              'container_class' => 'primary-navigation',
          )
      );

      wp_nav_menu(
          array(
              'theme_location'  => 'handheld',
              'container_class' => 'handheld-navigation',
          )
      );
      ?>
  </nav><!-- #site-navigation -->
  <?php
}

/**
 * w_store_header_toolbar_wrapper
 */
function w_store_header_toolbar_wrapper() {
  echo '<div class="site-toolbar">';
}

/**
 * w_store_header_toolbar_wrapper_close
 */
function w_store_header_toolbar_wrapper_close() {
  echo '</div>';
}
