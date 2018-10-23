<?php
/*
Plugin Name: WordPress Sample Plugin
Plugin URI: https://github.com/ShinmachiKazuki/wp-sample-plugin
Description: WordPress sample build.
Version: (プラグインのバージョン番号。例: 1.0)
Author: Kazuki Shinmachi
Author URI: https://github.com/ShinmachiKazuki
License: GPLv2 or later
*/
new Sample_Plugin();
class Sample_Plugin{
	/**
	*Constructor
	*
	* @version 1.0.0.
	* @since  1.0.0.`
	*/
	public function __construct(){
		add_action( 'admin_menu', array( $this, 'admin_menu'));
	}
	/**
	*Add admin menus.
	*
	* @version 1.0.0.
	* @since  1.0.0.`
	*/
	public function admin_menu(){
		add_menu_page(
			'サンプルA',
			'サンプルB',
			'manage_options',
			plugin_basename( __FILE__),
			array( $this, 'list_page_render'),
			'dashicons-format-gallery'
		);
	}
}
