<?php
    session_start();
    define('ROOT_PATH', "/pendu-projet/");
    $request = str_replace(ROOT_PATH, "", $_SERVER['REQUEST_URI']);
    $request = strtok($request, '?');
    $request = trim($request, '/'); 
    $segments = array_filter(explode('/', $request));

    // Log les segments pour débogage # log en plus
    error_log(print_r($segments, true));

    if (!count($segments) or $segments[0] == 'index' or $segments[0] == 'index.php')
    {
        $segments[0] = 'accueil';
    }

    define('REQ_TYPE', $segments[0] ?? Null);
    define('REQ_TYPE_ID', $segments[1] ?? Null);
    define('REQ_ACTION', $segments[2] ?? Null);

    $file = 'Controllers/'.REQ_TYPE.'.php';

    // Log le chemin du fichier pour débogage
    error_log("Trying to include file: " . $file);

    if(file_exists($file))
    { 
        require $file;
        exit();
    }
    else 
    {
        error_log("File not found: " . $file);
        require 'controllers/error.php';
        exit();
    }
?>