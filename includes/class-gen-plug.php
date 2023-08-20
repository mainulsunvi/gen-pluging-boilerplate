<?php

namespace Inc;

use Inc\Gen_Plug_Admin;
use Inc\Gen_Plug_Public;

class Gen_Plug {

    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        if ( defined( 'GEN_PLUG_VERSION' ) ) {
            $this->version = GEN_PLUG_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'gen-plug';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();

    }

    private function load_dependencies() {
        $this->loader = new Gen_Plug_Loader();
    }

    private function set_locale() {

        $plugin_i18n = new Gen_Plug_i18n();

        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

    }

    private function define_admin_hooks() {

        $plugin_admin = new Gen_Plug_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

    }

    private function define_public_hooks() {

        $plugin_public = new Gen_Plug_Public( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_loader() {
        return $this->loader;
    }

    public function get_version() {
        return $this->version;
    }

}
