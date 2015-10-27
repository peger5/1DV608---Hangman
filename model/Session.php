<?php
/**
  * Model class for handling the session storage
  * @author Petko Gerdzhikov
  */
class Session{
	public function __construct($sessionName){
        session_name($sessionName);
        session_start();
    }
	
	/**
	* Function to fetch an array containing the game context
	* @param String $key
	* @return array
	*/
    public function read($key){
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : array();
    }
	
	/**
	* Function to store parameters in session
	* @param String $key, name of session
	* @param $value, value that needs to be stored. Could be a String or array
	* @return void
	*/
    public function write($key, $value){
        $_SESSION[$key] = $value;
    }
	

}