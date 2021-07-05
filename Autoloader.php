<?php
    class Autoloader
    {
        static function register()
        {
            spl_autoload_register(array(__CLASS__, "autoload"));
        }
        static function autoload($classe)
        {
            $classe=str_replace("\\", "/", $classe);
            echo $classe;
            require_once $classe.".php";
        }
    }
    Autoloader::register();
?>