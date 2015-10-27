<?php

require_once('view/MenuView.php');
require_once('view/RulesView.php');
require_once('view/SubmitView.php');
require_once('view/GameView.php');

require_once('model/Game.php');
require_once('model/WordList.php');
require_once('model/WordFacade.php');

require_once('controller/PlayGame.php');
require_once('controller/SubmitWord.php');

/**
  * Controller class switching between views and other controllers
  * @author Petko Gerdzhikov
  */
class MasterController{
	
	private $menuView;
	private $view;
	private $game;
	private $context;
	private $wordDAL;
	
	public function __construct(Game $g, GameContext $gc, WordDAL $wd){
		$this->game = $g;
		$this->context = $gc;
		$this->wordDAL = $wd;
		$this->menuView = new MenuView;
		
	}
	
	/**
	* Main function to switch between views and controllers depending on the location of the URL.
	* @return void
	*/
	public function handleInput(){
		if($this->menuView->isInPlay()){
			$gameView = new GameView($this->game);
			$playGame = new PlayGame($this->game,$gameView,$this->context);
			
			$playGame->doPlay();
				
			$this->view = $playGame->getView();
		}
		
		else if($this->menuView->isInRules()){
			$this->view = new RulesView();
		}
	
		else if($this->menuView->isInSubmit()){
			$model = new WordFacade($this->wordDAL);
			$this->view = new SubmitView();
			$submit = new SubmitWord($model,$this->view);
			
			$submit->doSubmit();
		}
		
		else {
			
			$this->view = $this->menuView;
		}
	}
	
	/**
	* Function to fetch the current view depending on the URL
	* @return view class: MenuView, GameView, RulesView or SubmitView
	*/
	public function generateOutput() {
		return $this->view;
	}
}