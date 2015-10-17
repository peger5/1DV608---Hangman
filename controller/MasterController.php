<?php

require_once('view/MenuView.php');
require_once('view/RulesView.php');
require_once('view/SubmitView.php');

class MasterController{
	
	private $menuView;
	private $ruleView;
	private $submitView;
	private $view;
	
	public function __construct(){
		$this->menuView = new MenuView;
	}
	
	public function generateOutput(){
		
		
		if($this->menuView->isInPlay()){
			//do play
		}
		
		else if($this->menuView->isInRules()){
			$this->view = new RulesView();
		}
		
		else if($this->menuView->isInSubmit()){
			$this->view = new SubmitView();
		}
		
		else {
			$this->view = new MenuView();
		}
		return $this->view;
	}
}