(function($){
    
	// Site title and description
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a', '.site-title' ).text( to );
		});
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-desc' ).text( to );
		});
	} );

    // Footer text
    wp.customize('footer_text', function(value){
        value.bind( function( text ){
            $('.footer-copyright').text( text )
        });
    });
    
})(jQuery)