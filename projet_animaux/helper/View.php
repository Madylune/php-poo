<?php
namespace Helper;
class View
{
    private $viewDirectory = 'view/';

    //Méthode qui charge le chemin de la vue, vérifie s'il existe et l'affiche
    private function loadView($viewName, $type = 'view') {
        if($type === 'view') {
            $viewPath = $this->viewDirectory.$viewName.'.html';
        } elseif ($type === 'template') {
            $viewPath = $this->viewDirectory.'layout/'.$viewName.'.html';
        }
        if(file_exists($viewPath)) {
            return file_get_contents($viewPath);
        }
    }

    //Méthode qui exécute loadView //On récup les arguments passés dans la méthode du Dispatcher
    public function renderView($viewName, Array $values = []) { //
        $randomNb = rand(1, 4);
        $imgSrc = 'img/'.$viewName . $randomNb.'.jpg';
        $content = '<img src="'.$imgSrc.'"/>';
        $template = $this->loadView('base', 'template'); //On charge le template 'base'
        $renderHTML = str_replace('{{CONTENT}}', $content, $template); //On remplace {{CONTENT}} dans $template par $content
        foreach($values as $key => $value) {
            $renderHTML = str_replace($key, $value, $renderHTML);
        }
        echo $renderHTML; 
    }
}