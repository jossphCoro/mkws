<?php
class Rutas
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/' , $url);

        if (empty($url[0])) {
            $rutaControllers = 'controller/login.php';
            require_once $rutaControllers;
            $Controllers = new Login();
            return false;
        }

        $rutaControllers = 'controller/' . $url[0] . '.php';

        if (file_exists($rutaControllers)) {

            require_once $rutaControllers;
            $Controllers = new $url[0];
            
            if (isset($url[1])){
                $Controllers->{$url[1]}();
            }
        }else
        {
            require_once 'controller/notfound.php';
            $Controllers = new Notfound();
        }

    }
}