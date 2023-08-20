<?php

namespace Inc;

class Gen_Plug_Public {

    private $plugin_name;

    private $version;

    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

    }

    public function enqueue_styles() {

        wp_enqueue_style( $this->plugin_name, GEN_PLUG_ROOT_URL . 'assets/public/css/public.css', array(), $this->version, 'all' );

    }

    public function enqueue_scripts() {

        wp_enqueue_script( $this->plugin_name, GEN_PLUG_ROOT_URL . 'assets/public/js/gen-plug-public.js', array( 'jquery' ), $this->version, false );

    }

}
