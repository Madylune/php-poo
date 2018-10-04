<?php
namespace Helper;
use Model\Page as Page;

class View
{
    private $viewDirectory = 'view/';

    //Méthode qui charge le chemin de la vue, vérifie s'il existe et l'affiche
    private function loadView($viewName) {
        $viewPath = $this->viewDirectory .$viewName.'.html';
        if(file_exists($viewPath)) {
            return file_get_contents($viewPath);
        }
    }

    private function getMenu() {
        $page = new Page();
        $menuItems = $page->getAll(['title']);
        $menu = '';
        foreach ($menuItems as $value) {
            $menu .= '<li><a href="/' . $value['title'] . '">' . ucfirst($value['title']) . '</a></li>';
        }
        return $menu;
    }

    //On récup les arguments passés dans la méthode du Dispatcher
    public function renderView($viewName) { 
        $page = new Page();
        $content = $page->getOne('title', $viewName)["content"]; 
        $content .= '<a href="' . $viewName . '/edit">I want to edit this page</a>';
        $template = $this->loadView('base'); //On charge le template 'base'
        $renderHTML = str_replace('{{CONTENT}}', $content, $template); //On remplace {{CONTENT}} dans $template par $content
        $renderHTML = str_replace('{{TITLE}}', ucfirst($viewName), $renderHTML);
        $menu = $this->getMenu();
        $renderHTML = str_replace('{{MENU}}', $menu , $renderHTML);
        echo $renderHTML; 
    }

    public function renderAdminView($viewName) {
        $page = new Page();
        $content = file_get_contents($this->viewDirectory.'/layout/edit.html');
        $template = $this->loadView('base'); //On charge le template 'base');
        $renderHTML = str_replace('{{CONTENT}}', $content, $template); //On remplace {{CONTENT}} dans $template par $content
        $toEditContent = $page->getOne('title', $viewName[0])["content"]; 
        $renderHTML = str_replace('{{TOEDIT}}', $toEditContent, $renderHTML);
        $renderHTML = str_replace('{{TITLE}}', ucfirst($viewName[1]), $renderHTML);
        $menu = $this->getMenu();
        $renderHTML = str_replace('{{MENU}}', $menu , $renderHTML);
        echo $renderHTML; 
    }
}
