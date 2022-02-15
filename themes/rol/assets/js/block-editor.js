console.log("being loaded")

// wp.blocks.registerBlockStyle( 'core/quote', {
//     name: 'fancy-quote',
//     label: 'Fancy Quote',
// } );

wp.domReady( function () {

    wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
    wp.blocks.unregisterBlockStyle( 'core/quote', 'plain' );
    wp.blocks.unregisterBlockStyle( 'core/table', 'stripes' );
} );