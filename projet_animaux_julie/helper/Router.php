<?php
namespace Helper;
use \Controller\Dispatcher as Dispatcher;

class Router 
{
    private function trimUri($uri) {
        $uriArray = explode('/', $uri);
        array_splice($uriArray, 0, 1);
        return $uriArray;
    }

    public function route() {
        $uri = $this->trimUri($_SERVER['REQUEST_URI']);
        $dispatcher = new Dispatcher();
        $route = $uri[0];
        if (method_exists($dispatcher, $route)) {
            $dispatcher::$route($uri[1]);
        } else {
            $dispatcher::code404();
        }
    }
}