<?php
namespace Helper; //Indique dans quel contexte (dossier) la classe se situe
use \Controller\Dispatcher as Dispatcher; //Renvoie sur Dispatcher

class Router 
{
    //Méthode qui sert à supprimer le / avant l'uri
    private function trimUri($uri) {
        return substr($uri, 1);
    }
    //Méthode qui redirige toutes les requêtes vers la bonne méthode
    public function route() {
       
        $uri = $this->trimUri($_SERVER['REQUEST_URI']); //On récupère l'uri
        $dispatcher = new Dispatcher(); //On instance un nouveau dispatcher (grâce au use en haut)

        //On cherche la méthode correspondante dans le Dispatcher à la route
        if (method_exists($dispatcher, $uri)) {
            $dispatcher::$uri();
        } else {
            $dispatcher::code404();
        }
    }
}