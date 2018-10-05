<?php
namespace Controller;
use \Helper\View as View;

class Dispatcher
{
    //Return the correct view (normal or edit mode) according to uri
    static function getView($uri) {
        $view = new View();
        if ($uri === 'normal') { //Normal view
            $view->renderView();
        } elseif ($uri === 'edit') { //Admin mode
            $view->renderAdminView();
        } elseif (preg_match("#^edit/#", $uri)) {
            $sectionToEdit = substr($uri, 5);
            $view->renderEditSection($sectionToEdit);
        } else {
            echo '<h2>404: No route found</h2>';
        }
    }

    //Return an error if the path is unknown
    static function code404() {
        echo '<h2>404: No route found</h2>';
    }
}