<?php

namespace Inc;

class Gen_Plug_Activator {
	function init(): void {
		register_activation_hook( GEN_PLUG_ROOT . 'gen_plug.php', array( $this, 'plugin_activation' ) );
	}
	
	static function plugin_activation(): void {
	
	}
}
