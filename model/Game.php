<?php

class Game{
	
	private const $MAX_GUESSSES = 6; 
	private $numberOfGuesses = 0;
	
	private $wordToBeGuessed = array();
	private $rightLetters = array();
	private $wrongLetters = array();
	
	public function __construct(WordList $wl){
		$this->wordToBeGuessed = str_split($wl->getWord());

	}
	
	public function doGuess($letter){
		foreach($this->wordToBeGuessed as $char){
			if($char === $letter){
				$this->rightLetters[] = $letter;
			}
			else $this->wrongLetters[] = $letter;
				
		}
		$this->numberOfGuesses++;
	}
	
	
	public function isGameOver(){
		return $MAX_GUESSSES == $numberOfGuesses;
	}
	
	public function getWordSize(){
		return count($this->wordToBeGuessed);
	}
	
	public function getGuesses(){
		return $numberOfGuesses;
	}
	
	
}