<?php
namespace Helper;
use \Controller\Dispatcher as Dispatcher;

class Router 
{
    //Method to remove / from uri and put it into an array
    private function trimUri($uri) {
        return substr($uri, 1);
    }

    public function route() {
        $uri = $this->trimUri($_SERVER['REQUEST_URI']);
        $dispatcher = new Dispatcher();
        if (method_exists($dispatcher, 'getView')) {
            $dispatcher::getView($uri);
        } else {
            $dispatcher::code404();
        }
    }
}