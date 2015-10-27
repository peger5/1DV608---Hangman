<?php

require_once('model/Word.php');

/**
  * Model class for representing the game of hangman
  * @author Petko Gerdzhikov
  */
class Game{
	/**
	* Variable for referencing the maximum amout of guesses the user can perform
	* @var Integer
	*/
	private $MAX_GUESSSES = 6; 
	
	/**
	* Variable for referencing the actual amout of wrong guesses the user has performed
	* @var Integer
	*/
	private $numberOfGuesses;
	
	/**
	* Variable for the currently played word
	* @var String
	*/
	private $wordToBeGuessed;
	
	public function __construct(Word $w, $guesses = 0){
		$this->wordToBeGuessed = $w;
		$this->numberOfGuesses = $guesses;
	}
	
	/**
	* Function to perform a guess with a given letter. The function from Word class is used to check
	* if the letter is present in the word. If the letter was not present 
	* the counter for wrong guesses is incremented.
	* @param String $letter
	* @return boolean
	*/
	public function doGuess($letter){
		if($letter == null)
			return false;
		$result = false;
		
		$result = $this->wordToBeGuessed->doGuess($letter);
		
		if($result === false)
			$this->numberOfGuesses++;
		return $result;
	}
	
	/**
	* Function for checking if the letter is among the correct letters for the word
	* @param String $letter
	* @return boolean
	*/
	public function isLetterRight($letter){
		return in_array($letter, $this->wordToBeGuessed->getRightLetters());
	}
	
	/**
	* Function to check if the amount of wrong guesses is equall to the maximum allowed wrong guesses
	* @return boolean
	*/
	public function isOver(){
		return $this->MAX_GUESSSES === $this->numberOfGuesses;
	}
	
	/**
	* Function to check if all right letters have been guessed
	* @return boolean
	*/
	public function isWon(){
		return $this->wordToBeGuessed->isGuessed();
	}
	
	/**
	* Function to fetch the number of wrong guesses
	* @return Integer
	*/
	public function getGuesses(){
		return $this->numberOfGuesses;
	}
	
	/**
	* Function to fetch the current word 
	* @return String
	*/
	public function getWord(){
		return $this->wordToBeGuessed;
	}
	/**
	* Function to get the current progress on the played word. 
	* Used in order to save the game in the current session.
	* @return array
	*/
	public function getContext(){
        return array(
            'word'          => (string) $this->wordToBeGuessed,
            'attempts'      => $this->numberOfGuesses,
            'right_letters' => $this->wordToBeGuessed->getRightLetters(),
            'tried_letters' => $this->wordToBeGuessed->getTriedLetters()
        );
	}
	
	
}