<?php
session_start();

define('DSN', 'mysql:host=db;dbname=myapp;charset=utf8mb4');
define('DB_USER', 'myappuser');
define('DB_PASS', 'myapppass');
define('SITE_URl', 'http://localhost:8562');

// require_once(__DIR__ . '/Token.php');
// require_once(__DIR__ . '/Utils.php');
// require_once(__DIR__ . '/Database.php');
// require_once(__DIR__ . '/Todo.php');

spl_autoload_register(function($class){
    $fileName=sprintf(__DIR__.'/%s.php',$class);

    if(file_exists($fileName)){
        require($fileName); 
    }else{
        echo 'ファイルがありません';
        exit;
    }
})
?>