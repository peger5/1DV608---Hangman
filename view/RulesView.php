<?php

class RulesView{
	
	public function getHTML(){
		$ret = "Hangman is a word guessing game. Each turn the player inputs a letter and if the letter is present</br>
			 in the word, all of the places where that letter appears will show up!</br>
			However, fail to guess right and you will start to hang! The game ends if the whole word is revealed or 6 mistakes have been made.</br>";
			
		return $ret . "<a href='?'>Back to menu</a>";
	}
}