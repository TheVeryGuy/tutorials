<?php

spl_autoload_register(function ($class) {
    $prefix = 'App\\' ;

    $base_dir = __DIR__ . '/../';

    $len = strlen ($prefix);
    if ( strncmp ( $prefix , $class , $len ) !== 0 ) {
        return ;
    }

    $file =  $base_dir . str_replace('\\', '/', $class) . '.php';

    if ( file_exists ( $file )) {
        require  $file ;
    }
});


require_once __DIR__ . '/../vendor/autoload.php'
?>
