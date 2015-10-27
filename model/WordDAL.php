<?php

require_once('Settings.php');

/**
  * Model class for creating an access layer between the word list and SQL database
  * @author Petko Gerdzhikov
  */
class WordDAL{
	/*
	* Variable representing the word list that is generated from the db
	* @var WordList
	*/
	private $wordList;
	
	/*
	* Variable representing the database
	* @var mysqli
	*/
	private $database;
		
	public function __construct(mysqli $db) {
		$this->database = $db;
	}
	
	/*
	* Function to fetch the items from the table in MySQL 
	* @return $wordList, A WordList filled with the items from the db
	*/
	public function getWords() {
		$this->wordList = new WordList();
		$stmt = $this->database->prepare("SELECT * FROM " . Settings::TABLE);
		if ($stmt === FALSE) {
			throw new Exception($this->database->error);
		}
		$stmt->execute();
	 	
	    $stmt->bind_result($word);
	    while ($stmt->fetch()) {
	    	$wordToBeAdded = $word;
	    	$this->wordList->add($wordToBeAdded);
		}
		return  $this->wordList;
	}
	
	/*
	* Function to add entries to the db
	* @return void
	*/
	public function add($toBeAdded) {
		$stmt = $this->database->prepare("INSERT INTO `". Settings::DATABASE ."`.`". Settings::TABLE ."` (
			`word` )
				VALUES (?)");
		if ($stmt === FALSE) {
			throw new Exception($this->database->error);
		}
		$word = $toBeAdded;
		$stmt->bind_param('s', $word);
		$stmt->execute();
	}
}