<?php

/*
Plugin Name: Ladda for WordPress
Plugin URI: http://www.broobe.com/plugins/ladda
Description: Implementation of Ladda on WordPress
Version: 1.2
Author: lpadula
Author URI: http://www.broobe.com/
License: Creative Commons Attribution-ShareAlike

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

*/

//Call this on the page you wish to use the ladda plugin.
add_action('wp_head', 'ladda_wp_head');
add_action('wp_footer', 'ladda_wp_foot');

//Goes in the Header
function ladda_wp_head() {
	//The Additional Styles
	echo'<link rel="stylesheet" href="'. get_bloginfo('wpurl') .'/wp-content/plugins/ladda/dist/ladda.min.css" type="text/css" media="screen" />';
}


//Goes in the Footer
function ladda_wp_foot() {
	//The plugin scripts
	echo'
	<script type="text/javascript" src="'. get_bloginfo('wpurl') .'/wp-content/plugins/ladda/dist/spin.min.js"></script>
	<script type="text/javascript" src="'. get_bloginfo('wpurl') .'/wp-content/plugins/ladda/dist/ladda.min.js"></script>
	<script>
			Ladda.bind( "div:not(.progress-demo) button", { timeout: 2000 } );
			Ladda.bind( "div.progress-demo button", {
				callback: function( instance ) {
					var progress = 0;
					var interval = setInterval( function() {
						progress = Math.min( progress + Math.random() * 0.1, 1 );
						instance.setProgress( progress );

						if( progress === 1 ) {
							instance.stop();
							clearInterval( interval );
						}
					}, 200 );
				}
			} );
		</script>
	';
}

?>