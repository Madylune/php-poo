<?php
namespace Controller;
use \Helper\View as View;
use \Model\Cat as Cat;
use \Model\Dog as Dog;

class Dispatcher
{
    static function cat($number) {
        $cat = new Cat();
        $view = new View();
        $catList = '';
        for($i=0; $i < (int)$number; $i++) {
            $url = $cat->get()->file;
            $catList .= '<img src="'.$url.'">';
        };
        $view->renderView(__function__, [
            '{{CAT}}' => $catList
        ]);
    }
    static function dog($number) {
        $dog = new Dog();
        $view = new View();
        $dogList = '';
        for($i=0; $i < (int)$number; $i++) {
            $url = $dog->get()->file;
            $dogList .= '<img src="'.$url.'">';
        };
        $view->renderView(__function__, [
            '{{DOG}}' => $dogList
        ]);
    }
    // static function cat($number) {
    //     $view = new View();
    //     $view->renderView(__function__, $number);
    // }
    // static function dog() {
    //     $view = new View();
    //     $view->renderView(__function__);
    // }
    // static function panda() {
    //     $view = new View();
    //     $view->renderView(__function__);
    // }
    //Affiche une erreur si la page n'existe pas
    static function code404() {
        echo '<h2>404: No animal found</h2>';
    }
}