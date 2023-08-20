<?php

namespace Inc;

class Gen_Plug_i18n {

	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'gen-plug',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
