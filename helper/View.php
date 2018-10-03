<?php
namespace Helper;
use Model\Page as Page;

class View
{
    private $viewDirectory = 'view/';

    //Méthode qui charge le chemin de la vue, vérifie s'il existe et l'affiche
    private function loadView($viewName) {
        $viewPath = $this->viewDirectory.'layout/'.$viewName.'.html';
        if(file_exists($viewPath)) {
            return file_get_contents($viewPath);
        }
    }

    //On récup les arguments passés dans la méthode du Dispatcher
    public function renderView($viewName) { 
        $page = new Page();
        $content = $page->getOne('title', $viewName)["content"]; 
        $template = $this->loadView('base'); //On charge le template 'base'
        $renderHTML = str_replace('{{CONTENT}}', $content, $template); //On remplace {{CONTENT}} dans $template par $content
        $renderHTML = str_replace('{{TITLE}}', ucfirst($viewName), $renderHTML);
        echo $renderHTML; 
    }
}
