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
                $( '.site-desc' ).hide().addClass('screen-reader-text');
            }
            else {
                $( '.site-desc' ).show().removeClass('screen-reader-text');
            }
        });
    });
    
    // Palette
    wp.customize('palette', function( value ){
        value.bind( function( to ) {
            if( to == 'winter' ){
	            $( 'html' ).removeAttr('class');
                	$( 'html' ).addClass('palette-2');
            }
            else if( to == 'spring' ){
	            $( 'html' ).removeAttr('class');
                	$( 'html' ).addClass('palette-3');
            }
            else if( to == 'fall' ){
	            $( 'html' ).removeAttr('class');
                	$( 'html' ).addClass('palette-4');
            }
            else if( to == 'summer' ){
	            $( 'html' ).removeAttr('class');
                	$( 'html' ).addClass('palette-5');
            }
            else if( to == 'vineyard' ){
	            $( 'html' ).removeAttr('class');
                	$( 'html' ).addClass('palette-6');
            }
            else if( to == 'darkpink' ){
	            $( 'html' ).removeAttr('class');
                	$( 'html' ).addClass('palette-7');
            }
            else if( to == 'darkyellow' ){
	            $( 'html' ).removeAttr('class');
                	$( 'html' ).addClass('palette-8');
            }
            else {
	            $( 'html' ).removeAttr('class');
                	$( 'html' ).addClass('palette-1');
            }
        });
    });
    
    //Layout
    wp.customize('layout_option', function( value ){
        value.bind( function( to ) {
            if( to == 'version2' ){
	            $( '#wrapper' ).removeClass('header-v1').removeClass('header-v3');
                	$( '#wrapper' ).addClass('header-v2');
            }
            else if( to == 'version3' ){
	            $( '#wrapper' ).removeClass('header-v1').removeClass('header-v2');
                	$( '#wrapper' ).addClass('header-v3');
            }
            else {
	            $( '#wrapper' ).removeClass('header-v2').removeClass('header-v3');
                	$( '#wrapper' ).addClass('header-v1');
            }
        });
    });
    
    
    
    // WP Credits
    wp.customize('display_wp', function( value ){
        value.bind( function( to ) {
            if( to ){
                $( '.wp-love' ).show();
            }
            else {
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