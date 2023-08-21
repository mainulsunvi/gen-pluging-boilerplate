<?php

namespace Inc;

class Gen_Plug_Admin {
	
	private string $plugin_name;
	private string $version;
	
	public function __construct( $plugin_name, $version ) {
		
		$this -> plugin_name = $plugin_name;
		$this -> version     = $version;
		
	}
	
	public function enqueue_styles(): void {
		
		wp_enqueue_style( $this -> plugin_name, GEN_PLUG_ROOT_URL . 'assets/admin/css/gen-plug-admin.css', array(), $this -> version, 'all' );
		
	}
	
	public function enqueue_scripts(): void {
		
		wp_enqueue_script( $this -> plugin_name, GEN_PLUG_ROOT_URL . 'assets/admin/js/gen-plug-admin.js', array( 'jquery' ), $this -> version, false );
		
	}
	
}
