<?php

require_once('model/WordDAL.php');
require_once('Settings.php');


/**
  * Controller class responsible for loading the database
  * @author Petko Gerdzhikov
  */
class LoadWord{
	/**
	* Variable representing the word data access layer
	* @var WordDAL
	*/
	private $wordDAL;
	
	/**
	* Variable representing the SQL database
	* @var mysqli
	*/
	private $mysqli;
	
	public function __construct(){
		//create the connection to the database
		$this->mysqli = new mysqli(Settings::HOSTNAME,Settings::USERNAME,Settings::PASSWORD,Settings::DATABASE);
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}
		
		$this->wordDAL = new WordDAL($this->mysqli);
	}
	
	/**
	* Function to fetch the wordlist from the db
	* @return WordList
	*/
	public function load(){
		$wordList = $this->wordDAL->getWords();
		return $wordList;
	}
	
	/**
	* Function to fetch the DAL, used by WordFacade class
	* @return WordDAL
	*/
	public function getDAL(){
		return $this->wordDAL;
	}
	
	/**
	* Function to close the database connection
	* @return void
	*/
	public function close(){
		$this->mysqli->close();
	}
}