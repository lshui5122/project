<?php
//spl_autoload_register(function ($class_name) {    
//    include $_SERVER['DOCUMENT_ROOT'] . "/m5Project/" .$class_name . '.php';
//});

spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . "/m5Project/" .str_replace('\\', '/', $class_name) . '.php';
    //include "/Library/WebServer/Documents/m5Project/" .str_replace('\\', '/', $class_name) . '.php';
    
});


?>