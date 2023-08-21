<?php

namespace Inc;

class Gen_Plug {
	
	protected object $loader;
	protected string $plugin_name;
	protected string $version;
	
	public function __construct($loader) {
		$this -> version = GEN_PLUG_DATA['Version'];
		$this -> plugin_name = GEN_PLUG_DATA['TextDomain'];
		$this->loader = $loader;
		
		$this -> set_locale();
		$this -> define_admin_hooks();
		$this -> define_public_hooks();
	}
	
	private function set_locale(): void {
		
		$plugin_i18n = new Gen_Plug_Translator();
		
		$this -> loader -> add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
		
	}
	
	private function define_admin_hooks(): void {
		
		$plugin_admin = new Gen_Plug_Admin( $this -> get_plugin_name(), $this -> get_version() );
		
		$this -> loader -> add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this -> loader -> add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		
	}
	
	private function define_public_hooks(): void {
		
		(new Gen_Plug_Activator())->init();
		(new Gen_Plug_Deactivator())->init();
		
		$plugin_public = new Gen_Plug_Public( $this -> get_plugin_name(), $this -> get_version() );
		
		$this -> loader -> add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this -> loader -> add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		
	}
	
	public function run(): void {
		$this -> loader -> run();
	}
	
	public function get_plugin_name(): string {
		return $this -> plugin_name;
	}
	
	public function get_version(): string {
		return $this -> version;
	}
	
}
