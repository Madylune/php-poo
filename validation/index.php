<?php
require_once('vendor/autoload.php'); //On charge toutes les classes sans avoir besoin de les require
use Helper\Router as Router; 

$GLOBALS['config'] = require('./config.php');

$router = new Router();
$router->route();