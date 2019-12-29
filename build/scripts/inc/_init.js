/*  
    ////  --|    INIT JS

    * Set-up JavaScript
*/


/*  ////  --|    Global vars

    * Used throughout the Shiftr JS functions
*/ 

let header    = document.querySelector( '.site-header' ),    
    head      = document.getElementsByTagName( 'head' )[0],
    body      = document.body;


function on_load( fn = e => {} ) {

    document.addEventListener( 'DOMContentLoaded', e => {
        fn;
    });
}

function createEl( el ) {

    return document.createElement( el );
}


/**  
 *  strToBool
 *
 *  Perform regex against string for true|false and return boolean
 *
 *  @since 1.0
 *
 *  @param str str The string to check against
 *  @return bool|str Boolean if match found, string if no match
 */

function strToBool( str ) {

    if ( str.match( /^true$/i ) ) {
        return true;

    } else if ( str.match( /^false$/i ) ) {
        return false;

    } else {
        return str;
    }
}


/*  ////  --|    Return window size

    * Twin functions, one for width and another for height
*/

function vw() {
    return window.innerWidth;
}


function vh() {
    return window.innerHeight;
}




/*  ////  --|    Width Breakpoint - the JS equivilant to CSS media queries

    * Ensure breakpoint settings match those set in the styles
*/

let s 	= 's';
let m 	= 'm';
let l 	= 'l';
let xl 	= 'xl';
let max = 'max';


function x( width, fn, callback = () => {}, runOnce = false ) {

	var value;

	switch ( width ) {
		case s:     value = 450; break;
		case m: 	value = 768; break;
		case l: 	value = 1024; break;
		case xl: 	value = 1600; break;
        case max:   value = 1920; break;
		default:  	value = width;
	}

	let run = () => {
		
		var allow = false;

		if ( vw() >= value ) {

			if ( runOnce === true && allow === false ) return;

			fn();

			allow = false;

		} else {
			
			if ( runOnce === true && allow === true ) return;

			callback();

			allow = true;
		} 
	}


	document.addEventListener( 'DOMContentLoaded', run );
	window.addEventListener( 'resize', run );
	window.addEventListener( 'orientationchange', run );
}


//  ////  --|    Admin Shortcut

( () => {

    const alias = { a: 65, e: 69, option: 18 };
    var theKeys = {};

    document.addEventListener( 'keydown', e => {

        theKeys[e.keyCode] = true;

        switch ( true ) {

            // Admin home
            case theKeys[alias.option] && theKeys[alias.a]:
                open_admin_url( shiftr.shortcuts.admin );
                break;

            // Edit current page
            case theKeys[alias.option] && theKeys[alias.e]:
                if ( ! shiftr.vars.archive ) {
                    open_admin_url( shiftr.shortcuts.edit );
                }
                break;
        }
    });

    document.addEventListener( 'keyup', e => {
        delete theKeys[e.keyCode];
    });

    function open_admin_url( url ) {

        // Clear all keys
        theKeys = {};

        // Open the url in a new tab
        window.open( url, '_blank' );
    }

})();

    