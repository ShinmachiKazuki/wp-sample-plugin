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
		register_activation_hook( __FILE__, array( $this, 'create_table' ) );
		add_action( 'admin_init', array( $this, 'admin_init'));
		add_action( 'admin_menu', array( $this, 'admin_menu'));
	}

	/**
	*Create Table.
	*
	* @version 1.0.0.
	* @since  1.0.0.`
	*/
	public function create_table(){
		
	}

	/**
	*Add admin initialize.
	*
	* @version 1.0.0.
	* @since  1.0.0.`
	*/
	public function admin_init(){
		wp_register_style( 'sample-plugin-style', plugins_url( 'css/style.css', __FILE__ ),array(), '1.0.0' );
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
			'dashicons-format-view-status'
		);
		$list_page = add_submenu_page(
			__FILE__,
			'サンプル一覧',
			'サンプル一覧',
			'manage_options',
			plugin_basename( __FILE__),
			array( $this, 'list_page_render'),
			'dashicons-format-view-status'
		);
		add_submenu_page(
			__FILE__,
			'サンプル登録',
			'サンプル登録',
			'manage_options',
			plugin_dir_path( __FILE__) . 'includes/wp-sample-plugin-post.php',
			array( $this, 'post_page_render'),
			'dashicons-format-view-status'
		);
		add_action( 'admin_print_styles-' . $list_page, array( $this, 'add_style' ) );
	}

	/**
	*Rendaring List Page.
	*
	* @version 1.0.0
	* @since  1.0.0
	*/
	public function list_page_render(){
		require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-sample-plugin-list.php');
		new Sample_Plugin_List();
	}

	/**
	*Add style.
	*
	* @version 1.0.0
	* @since  1.0.0
	*/
	public function add_style(){
		wp_enqueue_style( 'sample-plugin-style' );
	}
}
