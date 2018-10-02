<?php
namespace Controller;
use \Helper\View as View; //Renvoie sur View
//Pour créer une nouvelle vue: On créé une nouvelle méthode
class Dispatcher
{
    //Permet d'afficher la page home quand on tape /home dans le navigateur
    static function cat() {
        $view = new View();
        $view->renderView(__function__, [
            '{{TITLE}}' => 'Cat'
        ]);
    }
    static function dog() {
        $view = new View();
        $view->renderView(__function__, [
            '{{TITLE}}' => 'Dog'
        ]);
    }
    static function panda() {
        $view = new View();
        $view->renderView(__function__, [
            '{{TITLE}}' => 'Panda'
        ]);
    }
    //Affiche une erreur si la page n'existe pas
    static function code404() {
        echo '<h2>404: No animal found</h2>';
    }
}