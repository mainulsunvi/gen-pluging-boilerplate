<?php

namespace Inc;

class Gen_Plug_Translator {
	public function load_plugin_textdomain(): void {
		load_plugin_textdomain( 'gen-plug', false, GEN_PLUG_ROOT . 'languages/' );
	}
	
	
}
