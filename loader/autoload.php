<?php

function gen_plug_autoloader( $class ): void {
	$prefix   = 'Inc\\';
	$base_dir = plugin_dir_path( dirname( __FILE__ ) ) . 'includes' . DIRECTORY_SEPARATOR;
	
	if ( str_starts_with( $class, $prefix ) ) {
		
		$classParts = explode( '\\', strtolower( $class ) );
		
		foreach ( $classParts as $fileName ) {
			$fileName = str_replace( '_', '-', $fileName );
		}
		
		if ( 3 == count( $classParts ) ) {
			;
			$file = $base_dir . $classParts[1] . DIRECTORY_SEPARATOR . 'class-' . $fileName . '.php';
			
		} else if ( 2 == count( $classParts ) ) {
			$file = $base_dir . 'class-' . $fileName . '.php';
		}
		
		if ( file_exists( $file ) ) {
			require_once $file;
		}
	}
}

spl_autoload_register( "gen_plug_autoloader" );
