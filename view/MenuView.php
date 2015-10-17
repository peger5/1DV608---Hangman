<?php

class MenuView{
	
	private static $playURL = "play";
	private static $rulesURL = "rules";
	private static $contributeURL = "submit";
	
	public function getHTML() {
		$ret = $this->getLinkToPlay() . "</br>"
		. $this->getLinkToRules() ."</br>"
		. $this->getLinkToSubmit()
		  
          
    ;
		return "<h1>Welcome to the game of Hangman!</h1> $ret";
  }
  
	public function isInPlay() {
		return isset($_GET[self::$playURL]);
	}
	
	public function isInRules() {
		return isset($_GET[self::$rulesURL]);
	}
	public function isInSubmit() {
		return isset($_GET[self::$contributeURL]);
	}
	private function getLinkToPlay() {
		return "<a href='?" . self::$playURL ."'>Play!</a>";
	}
  
	private function getLinkToRules() {
		return "<a href='?" . self::$rulesURL ."'>Rules</a>";
	}
  
	private function getLinkToSubmit() {
		return "<a href='?" . self::$contributeURL ."'>Submit a word</a>";
	}
	
	
}
