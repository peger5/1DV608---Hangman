<?php
/**
  * Simple view class to show how to play the game. 
  * @author Petko Gerdzhikov
  */
class RulesView{
	
	/**
    * Function to fetch a HTML string
	* @return String, HTML
	*/
	public function getHTML(){
		$ret = "Hangman is a word guessing game. Each turn the player inputs a letter and if the letter is present
			 in the word, all of the places where that letter appears will show up!</br>
			However, fail to guess right and you will start to hang! The game ends if the whole word is revealed or 6 mistakes have been made.</br>
			<br>
			Play the game by clicking on the letters. If you have won or lost you must restart the game from the menu.<br>";
			
		return $ret . "<a href='?'>Back to menu</a>";
	}
}