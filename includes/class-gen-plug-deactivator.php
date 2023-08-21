<?php

namespace Inc;

class Gen_Plug_Deactivator {
	function init(): void {
		register_activation_hook( GEN_PLUG_ROOT . 'gen_plug.php', array($this, 'deactivate' ));
	}
    public static function deactivate() {

    }

}
