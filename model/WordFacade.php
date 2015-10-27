<?php

/**
  * Model class for creating a facade to create an additional layer of separating between the database and controllers
  * @author Petko Gerdzhikov
  */
class WordFacade {
	
	public function __construct(WordDAL $db) {
		$this->dal = $db;
		
	}
	
	/**
	* Function to add a word to the database
	* @param String $word
	* @return void
	*/
	public function add($word) {
		$this->dal->add($word);
	}
	
	/**
	* Function to fetch the word list from the db
	* @return WordList
	*/
	public function getWords() {
		return $this->dal->getWords();
	}
}