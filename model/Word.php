<?php
/**
  * Model class representing a word in the hangman game.
  * @author Petko Gerdzhikov
  */
class Word{
	/**
	 * The string representation of the word
	 * @var String
	 */
	private $word;
	
	/**
	 * Array containing the letters that user has guessed and appear in the variable 'word'
	 * @var array
	 */
	private $rightLetters;
	
	/**
	 * Array containing all the letters that the user has tried to guess 
	 * @var array
	 */
	private $triedLetters;
	
	public function __construct($toBeGuessed, array $right = array(), array $tried = array()){
		$this->word = $toBeGuessed;
		$this->rightLetters = $right;
		$this->triedLetters = $tried;
	}
	
	/**
	 * Function to fetch the letters in the word without dublicates
	 * @return array, Array containing unique letters
	 */
	public function getLetters(){
		return array_unique(str_split($this->word));
	}
	
	/**
	 * Function to fetch the array containing the correct letters
	 * @return array, Array containing correctly guessed letters
	 */
	public function getRightLetters(){
		return $this->rightLetters;
	}
	
	/**
	 * Function to fetch the array containing all tried letters
	 * @return array, Array containing all tried letters
	 */
	public function getTriedLetters(){
		return $this->triedLetters;
	}
	
	/**
	 * Function to fetch the currently played word
	 * @return String, String representation of the word
	 */
	public function getWord(){
		return $this->word;
	}
	
	/**
	 * Function to fetch the currently played word, needed to converted value to string:
	 * e.g (string) word;
	 * @return String, String representation of the word
	 */
	public function __toString(){
		return $this->word;
	}
	
	/**
	 * Function to check if there is a diffrence between the letters that appear in the word
	 * and those which the user has guessed.
	 * @return boolean, true if there is no diffrence in the amount of elements in the two arrays
	 */
	public function isGuessed(){
		$guessed = array_diff($this->getLetters(), $this->rightLetters);
		
		 return 0 === count($guessed);
	}
	
	/**
	 * Function to perform a guess on the word. First we check if the character is good for the current word.
	 * Secondly, we add the letter to the tried and then we check if there are positions that the letter appears.
	 * @param String $letter, character used to guess
	 * @return boolean
	 * @throws InvalidArgumentException, if letter does not match any of the english alphabet
	 * @throws Exception, if the letter has already been tried
	 */
	public function doGuess($letter){
		$letter = strtolower($letter);
        if (0 === preg_match('/^[a-z]$/', $letter)) {
            throw new InvalidArgumentException("The letter is not a valid ASCII character matching [a-z]");
        }
		if (in_array($letter, $this->triedLetters)) {
            throw new Exception("The letter has already been tried.");
        }
		
		$this->triedLetters[] = $letter;
			
		if(false !== strpos($this->word,$letter)){
			$this->rightLetters[] = $letter;
			return true;
		}
		
		return false;
	}
		
	
	
	
}