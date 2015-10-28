<?php

/**
 * The settings file contains installation specific information
 * 
 */
class Settings {


	/**
	 * The app session name points to the location of the data files
	 */
	const APP_SESSION_NAME = 'hangman';
	
	/**
	 * SQL host name
	 */
	const HOSTNAME = "mysql6.000webhost.com";
	
	/**
	 * Username of SQL database 
	 */
	const USERNAME = "a7600781_petko";

	/**
	 * Password of SQL database
	 */
	const PASSWORD = "";
	
	/**
	* SQL database name
	*/
	const DATABASE = "a7600781_hang";	
	
	/**
	* SQL table name
	*/
	const TABLE = "words";
	
	
	/**
	* Show errors 
	* boolean true | false
	*/
	const DISPLAY_ERRORS = true;
}