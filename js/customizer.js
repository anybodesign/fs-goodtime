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
	wp.customize( 'welcome_title', function( value ) {
		value.bind( function( to ) {
			$( '.fs-welcome-title' ).text( to );
		});
	} );
	wp.customize( 'welcome_text', function( value ) {
		value.bind( function( to ) {
			$( '.fs-welcome-text' ).text( to );
		});
	} );

	// Tagline
    wp.customize('hide_tagline', function( value ){
        value.bind( function( to ) {
            if( to ){
                $( '.site-desc' ).hide();
            }
            else{
                $( '.site-desc' ).show();
            }
        });
    });
    
    // Scroll
    wp.customize('scrolldown', function( value ){
        value.bind( function( to ) {
            if( to ){
                $( '.scroll-down' ).show();
            }
            else{
                $( '.scroll-down' ).hide();
            }
        });
    });
    
    // Hide Welcome
    wp.customize('hide_welcome', function( value ){
        value.bind( function( to ) {
            if( to ){
                $( '.fs-welcome' ).hide();
            }
            else{
                $( '.fs-welcome' ).show();
            }
        });
    });
    
    // WP Credits
    wp.customize('display_wp', function( value ){
        value.bind( function( to ) {
            if( to ){
                $( '.wp-love' ).show();
            }
            else{
                $( '.wp-love' ).hide();
            }
        });
    });
    
    // Footer text
    wp.customize('footer_text', function( value ){
        value.bind( function( text ){
            $('.footer-copyright').text( text )
        });
    });
    
})(jQuery)