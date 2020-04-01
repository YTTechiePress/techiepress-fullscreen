<?php

/**
 * Plugin Name: TechiePress Disable Fullscreen Mode
 * Plugin URI: https://omukiguy.com
 * Author: Laurence Bahiirwa
 * Author URI: https://omukiguy.com
 * Description: This plugin disables default fullscreen mode setting in WordPress 5.4+
 * Version: 0.1.0
 * License: GPL2 or Later
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: prefix-plugin-name
*/
if( is_admin() ) {

    function techiepress_disable_fullscreen_mode() {
        $script = "jQuery( window ).load(
            function() { 
                const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); 
                
                if ( isFullscreenMode ) { 
                    wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); 
                } 
            }
        );";
        
        wp_add_inline_script( 'wp-blocks', $script );
    }
}

add_action( 'enqueue_block_editor_assets', 'techiepress_disable_fullscreen_mode' );