<?php

// function my_plugin_autoloader( $class ) {
//     $base_namespace = 'Inc\\';
//     $base_path      = plugin_dir_path( dirname( __FILE__ ) ) . 'includes/';

//     if ( strpos( $class, $base_namespace ) === 0 ) {

//         $relative_class = substr( $class, strlen( $base_namespace ) );

//         $file_path = str_replace( '\\', '/', $relative_class );
//         $file_path = str_replace( '_', '-', strtolower( $file_path ) );
//         $full_path = $base_path . "class-" . $file_path  . '.php';

//         echo '<pre>';
//         print_r($class);
//         echo '</pre>';
//         die();

//         if ( file_exists( $full_path ) ) {
//             require_once $full_path;
//         }
//     }
// }

// spl_autoload_register( 'my_plugin_autoloader' );

// autoload.php

function gen_plug_autoloader( $class ) {
    $prefix   = 'Inc\\';
    $base_dir = plugin_dir_path( dirname( __FILE__ ) ) . 'includes' . DIRECTORY_SEPARATOR;

    if ( strpos( $class, $prefix ) === 0 ) {

        $file       = "";
        $classParts = explode( '\\', strtolower( $class ) );

        foreach ( $classParts as $fileName ) {
            $fileName = str_replace( '_', '-', $fileName );
        }

        if ( 3 == count( $classParts ) ) {;
            $file = $base_dir . $classParts[1] . DIRECTORY_SEPARATOR . 'class-' . $fileName . '.php';

        } else if ( 2 == count( $classParts ) ) {
            $file = $base_dir . 'class-' . $fileName . '.php';
        }

        if ( file_exists( $file ) ) {
            require_once $file;
        }
    }
};

spl_autoload_register( "gen_plug_autoloader" );