<?php
namespace Controller;
use \Helper\View as View; //Renvoie sur View
//Pour créer une nouvelle vue: On créé une nouvelle méthode
class Dispatcher
{
    //Permet d'afficher la page home quand on tape /home dans le navigateur
    static function home() {
        $view = new View();
        $view->renderView(__function__, [ //Créé une vue qui portera le nom de la méthode. Equivalent de renderView('home')
        '{{TITLE}}' => 'My Home',
        '{{MY_NAME}}' => 'Julie',
        ]);
    }
    static function contact() {
        $view = new View();
        $view->renderView(__function__);
    }
    //Affiche une erreur si la page n'existe pas
    static function code404() {
        echo '<h2>404: No route found</h2>';
    }
}
