<?php
/**
  * Model class for the list of words that could be played
  * @author Petko Gerdzhikov
  */
class WordList{
	
	/**
	* Variable to store word array
	* @var array
	*/
	private $words;
	
	public function __construct(){
		$this->words = array();
	}
	
	/**
	* Function to add words to the list
	* @param String $toBeAdded
	* @return void
	*/
	public function add($toBeAdded){
		$this->words[] = $toBeAdded;
	}
	
	/**
	* Function to fetch a random word from the word list
	* @return String
	*/
	public function getWord(){
		$key = array_rand($this->words);
		return $this->words[$key];
	}
	
	/**
	* Function to check if the word is already in the word list. Check is performed by string value
	* @param String $wordToCheck
	* @return boolean, true if $wordToCheck is in array
	*/
	public function isWordInList($wordToCheck){
		foreach($this->words as $word){
			if($word === $wordToCheck)
				return true;
		}
		return false;
	}
}