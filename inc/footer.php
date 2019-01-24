<?php

// add_action( 'storefront_footer', 'w_store_remove_parent_footer_action' );

// function w_store_remove_parent_footer_action() {
//     remove_action( 'storefront_header', 'storefront_credit', 20 );
// }

function storefront_credit() {
    ?>
    <div class="site-info">
        <?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) ) ); ?>
        <?php if ( apply_filters( 'storefront_credit_link', true ) ) { ?>
        <?php } ?>
    </div><!-- .site-info -->
    <?php
}