<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once('view/HTMLView.php');


require_once('controller/MasterController.php');


$controller = new MasterController();
$view = $controller->generateOutput();
$htmlView = new HTMLView("utf-8");

//$view = new MenuView();
//$view = new RulesView();

echo $htmlView->getHTMLPage($view->getHTML());
