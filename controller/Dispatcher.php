<?php
namespace Controller;
use \Helper\View as View; //Renvoie sur View

//Pour créer une nouvelle vue: On créé une nouvelle méthode
class Dispatcher
{
    //Permet d'afficher la page home quand on tape /home dans le navigateur
    static function getView($uri) {
        $view = new View();
        if (count($uri) === 1) {
            $view->renderView($uri[0]);
        } elseif ($uri[1] === 'edit') {
            $view->renderAdminView($uri);
        } else {
            echo '<h2>404: No route found</h2>';
        }
    }

    //Affiche une erreur si la page n'existe pas
    static function code404() {
        echo '<h2>404: No route found</h2>';
    }
}
