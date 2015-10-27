<?php
session_set_cookie_params(0);

require_once("Settings.php");
require_once('view/HTMLView.php');
require_once('model/Session.php');
require_once('model/GameContext.php');

require_once('controller/LoadWord.php');
require_once('controller/MasterController.php');

if (Settings::DISPLAY_ERRORS) {
	error_reporting(-1);
	ini_set('display_errors', 'ON');
}

//Create the loader and initiate the word list
$loader = new LoadWord();
$list = $loader->load();

//Start the session
$session = new GameContext(new Session(Settings::APP_SESSION_NAME));

$menu = new MenuView();

//Check the url if the user wants to reset
if($menu->wantsToReset()) 
    $session->reset();

//If there is a session in play, load it
if(!$game = $session->loadGame())
	$game = $session->newGame(new Word($list->getWord()));
else 
	$session->reset();

//Start the controller to handle the user input
$controller = new MasterController($game,$session,$loader->getDAL());
$controller->handleInput();
$loader->close();

//Save the game after each guess
$session->save($game);

//Generate the HTML code
$view = $controller->generateOutput();
$htmlView = new HTMLView("utf-8");

echo $htmlView->getHTMLPage($view->getHTML());
