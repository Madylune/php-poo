<?php
namespace Helper;
use \Model\Model as Model;

class View
{
    private $viewDirectory = 'view/';

    private function loadView($viewName, $type = 'view') {
      if($type === 'view') {
        $viewPath = $this->viewDirectory . $viewName . ".html";
      } elseif ($type === 'template') {
        $viewPath = $this->viewDirectory . 'layout/' . $viewName . ".html";
      }
      if(file_exists($viewPath)) {
        return file_get_contents($viewPath);
      }
    }
    public function renderView($viewName, Array $values = []) {
      $content = $this->loadView($viewName);
      $template = $this->loadView('base', 'template');
      $renderHTML = str_replace('{{CONTENT}}', $content, $template);
      $renderHTML = str_replace('{{TITLE}}', ucfirst($viewName), $renderHTML);

      foreach ($values as $key => $value) {
        $renderHTML = str_replace($key, $value, $renderHTML);
      }
      echo $renderHTML;
    }

    Méthode qui exécute loadView //On récup les arguments passés dans la méthode du Dispatcher
    public function renderView($viewName, $number) { //
        $number = intval($number);
        $randomNb = rand(1, 7);
        $imgSrc = 'img/'.$viewName . $randomNb.'.jpg';
        $content = '<img src="'.$imgSrc.'" alt="'.$viewName.'"/>';
        $template = $this->loadView('base', 'template'); //On charge le template 'base'
        $renderHTML = str_replace('{{CONTENT}}', $content, $template); //On remplace {{CONTENT}} dans $template par $content
        $renderHTML = str_replace('{{TITLE}}', ucfirst($viewName), $renderHTML);
        echo $renderHTML; 
    }
}