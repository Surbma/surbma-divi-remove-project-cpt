<?php

/*
Plugin Name: Surbma | Divi Remove Project CPT & Taxonomies
Plugin URI: https://surbma.com/wordpress-plugins/
Description: Removes the Project Custom Post Type and its Custom Taxonomies from Divi theme.

Version: 3.0

Author: Surbma
Author URI: https://surbma.com/

License: GPLv2

Text Domain: surbma-divi-remove-project-cpt
Domain Path: /languages/
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) exit( 'Good try! :)' );

// Localization
add_action( 'plugins_loaded', function() {
	load_plugin_textdomain( 'surbma-divi-remove-project-cpt', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
} );

add_action( 'init', function() {
	if ( wp_basename( get_bloginfo( 'template_directory' ) ) == 'Divi' ) {

		// Remove the Custom Post Type
		global $wp_post_types;
		if ( isset( $wp_post_types[ 'project' ] ) ) {
			unset( $wp_post_types[ 'project' ] );
		}

		// Remove the Custom Taxonomies
		global $wp_taxonomies;
		if ( isset( $wp_taxonomies['project_tag'] ) ) {
			unset( $wp_taxonomies['project_tag'] );
		}

		if ( isset( $wp_taxonomies['project_category'] ) ) {
			unset( $wp_taxonomies['project_category'] );
		}

	}
} );
