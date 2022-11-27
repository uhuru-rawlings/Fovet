<?php
    session_start();
    define ('ROOT_PATH', realpath(dirname(__FILE__)));

    if($_SERVER['HTTP_HOST'] == "127.0.0.1" || $_SERVER['HTTP_HOST'] == "localhost"){
        define('BASE_URL', 'http://localhost/Fovet/');
    }else{
        define('BASE_URL', 'https://www.fovet.co/');
    }
    

?>