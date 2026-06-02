<?php
/**
 * Plugin Name: HoverDepth Cards
 * Description: HoverDepth parallax card widget for Elementor.
 * Version: 1.0.0
 * Author: Depth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Depth_Parallax_Elementor_Bootstrap {
	const WIDGET_SLUG = 'depth_parallax_widget';

	public static function init() {
		add_action( 'elementor/frontend/after_register_styles', [ __CLASS__, 'register_assets' ] );
		add_action( 'elementor/frontend/after_register_scripts', [ __CLASS__, 'register_assets' ] );
		add_action( 'elementor/widgets/register', [ __CLASS__, 'register_widget' ] );
	}

	public static function register_assets() {
		$base_url  = plugin_dir_url( __FILE__ );
		$base_path = plugin_dir_path( __FILE__ );

		wp_register_style(
			'depth-reset-2',
			'https://public.codepenassets.com/css/reset-2.0.min.css',
			[],
			null
		);

		wp_register_style(
			'depth-style',
			$base_url . 'style.css',
			[ 'depth-reset-2' ],
			file_exists( $base_path . 'style.css' ) ? filemtime( $base_path . 'style.css' ) : '1.0.0'
		);

		wp_register_script(
			'depth-script',
			$base_url . 'script.js',
			[],
			file_exists( $base_path . 'script.js' ) ? filemtime( $base_path . 'script.js' ) : '1.0.0',
			true
		);
	}

	public static function register_widget( $widgets_manager ) {
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}

		require_once __DIR__ . '/class-depth-parallax-widget.php';
		$widgets_manager->register( new \Depth_Parallax_Widget() );
	}
}

Depth_Parallax_Elementor_Bootstrap::init();
