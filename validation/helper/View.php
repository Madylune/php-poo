<?php
namespace Helper;
use Model\Section as Section;

class View
{
    private $viewDirectory = 'view/';

    private function loadTemplate($view) {
        $viewPath = $this->viewDirectory .$view.'.html';
        if(file_exists($viewPath)) {
            return file_get_contents($viewPath);
        }
    }

    public function renderSections() {
        $section = new Section();
        $sectionItems = $section->getAllSections(['content']);
        $sectionList = '';
        foreach ($sectionItems as $value) {
            $sectionList .= '<div class="section">'.$value['content'].'</div>';
        }
        return $sectionList;
    }

    public function renderSectionsList() {
        $section = new Section();
        $sectionItems = $section->getAllSections(['title']);
        $sectionList = '<h2>Choose the section that you want to edit</h2> <ul>';
        foreach ($sectionItems as $value) {
            $sectionList .= '<li><a href="edit/'.$value['title'].'">'.ucfirst($value['title']).'</a></li>';
        }
        $sectionList .= '</ul>';
        return $sectionList;
    }

    //On récup les arguments passés dans la méthode du Dispatcher
    public function renderView() { 
        //Load template
        $template = $this->loadTemplate('normal');
        //Get data
        $content = $this->renderSections();
        //Writing
        $renderHTML = str_replace('{{CONTENT}}', $content, $template);
        //Output
        echo $renderHTML; 
    }

    public function renderAdminView() {
        //Load template
        $template = $this->loadTemplate('admin');
        //Get data
        $content = $this->renderSectionsList();
        //Writing
        $renderHTML = str_replace('{{CONTENT}}', $content, $template);
        //Output
        echo $renderHTML; 
    }

    public function renderEditSection($sectionToEdit) {
        //Load template
        $template = $this->loadTemplate('admin');
        //Get data
        $section = new Section();
        $contentSection = $section->getOneSection('title', $sectionToEdit)['content'];
        $content = file_get_contents($this->viewDirectory.'/edit.html');
        //Writing
        $renderHTML = str_replace('{{CONTENT}}', $content, $template);
        $renderHTML = str_replace('{{TOEDIT}}', $contentSection, $renderHTML);
        //Output
        echo $renderHTML;
    }
}