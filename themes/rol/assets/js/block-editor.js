// Unregistering block styles
wp.domReady( function () {

    wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
    wp.blocks.unregisterBlockStyle( 'core/quote', 'plain' );
    wp.blocks.unregisterBlockStyle( 'core/table', 'stripes' );
} );