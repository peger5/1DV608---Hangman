<?php
/**
  * View class used to generate the main menu of the application
  * @author Petko Gerdzhikov
  */
class MenuView{
	
	private static $playURL = "play";
	private static $rulesURL = "rules";
	private static $contributeURL = "submit";
	private static $resetURL = "new";
	
	
	/**
	* Function to fetch the HTML elements in the menu.
	* @return String, HTML
	*/
	public function getHTML() {
		$ret = $this->getLinkToPlay() . "</br>"
		. $this->getLinkToReset() ."</br>"
		. $this->getLinkToRules() ."</br>"
		. $this->getLinkToSubmit()
		  
          
    ;
		return "<h1>Welcome to the game of Hangman!</h1> $ret";
	}
	
	/**
	* Function to check if the URL points to play 
	* @return boolean
	*/
	public function isInPlay() {
		return isset($_GET[self::$playURL]);
	}
	
	/**
	* Function to check if the URL points to rules 
	* @return boolean
	*/
	public function isInRules() {
		return isset($_GET[self::$rulesURL]);
	}
	
	/**
	* Function to check if the URL points to submit form 
	* @return boolean
	*/
	public function isInSubmit() {
		return isset($_GET[self::$contributeURL]);
	}
	
	/**
	* Function to check if the URL points to new game 
	* @return boolean
	*/
	public function wantsToReset(){
		return isset($_GET[self::$resetURL]);
	}
	
	/**
	* Private function to generate the link to reset the game
	* @return String, HTML hyperlink
	*/
	private function getLinkToReset(){
		return "<a href='?" . self::$resetURL ."'>Give me a new word!</a>";
	}
	
	/**
	* Private function to generate the link to play the game
	* @return String, HTML hyperlink
	*/
	private function getLinkToPlay() {
		return "<a href='?" . self::$playURL ."'>Play!</a>";
	}
	
	/**
	* Private function to generate the link to rules of the game
	* @return String, HTML hyperlink
	*/
	private function getLinkToRules() {
		return "<a href='?" . self::$rulesURL ."'>Rules</a>";
	}
	
	/**
	* Private function to generate the link to submit words
	* @return String, HTML hyperlink
	*/
	private function getLinkToSubmit() {
		return "<a href='?" . self::$contributeURL ."'>Submit a word</a>";
	}
	
	
}
