<?php
/**
  * View class used to handle the play screen of the application
  * @author Petko Gerdzhikov
  */
class GameView{
	/**
	* Variable representing the currently played game
	* @var Game 
	*/
	private $game;
	
	/**
	* Variable used to store the message announcements
	* @var String 
	*/
	private $message = '';
	
	/**
	* Variable used to generate the letters of the alphabet that are going to be used as input
	* @var array, String 
	*/
	private $letters = array(
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I',
    'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
    'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
	);
	
	private static $messageId = "GameView::Message";
	private static $wrongLetters = "GameView::Wrong";
	
	
	public function __construct(Game $g){
		$this->game = $g;
	}
	
	/**
	* Function used to generate the play screen. There are fields for message and an animation when user
	* fails to choose a correct word. Input is handled by hyperlinks to each letter of the alphabet.
	* @return String, HTML
	*/	
	public function getHTML(){
		$ret = "
			<h1> Hangman </h1>
			<p id='" . self::$messageId . "'>" . $this->message . "</p>";
		
		//Animation generation
		switch(6 - $this->game->getGuesses()){
			case 5: 
				$ret .= "<p>" . $this->setAnimationOne() . "</p>";
				break;
			case 4:
				$ret .= "<p>" . $this->setAnimationTwo() . "</p>";
				break;
			case 3:
				$ret .= "<p>" . $this->setAnimationThree() . "</p>";
				break;
			case 2:
				$ret .= "<p>" . $this->setAnimationFour() . "</p>";
				break;
			case 1:
				$ret .= "<p>" . $this->setAnimationFive() . "</p>";
				break;
			case 0:
				$ret .= "<p>" . $this->setAnimationSix() . "</p>";
				break;
			default:
				$ret .= "<p>" . $this->setAnimationZero() . "</p>";
			
		}
		
		//Check for if the user guessed correctly and display the letter. Otherwise display an empty field.
		foreach(str_split((string)$this->game->getWord()) as $letter){
			if($this->game->isLetterRight($letter))
				$ret .= " $letter ";
			else $ret .= " _ ";
		}
		
		//Display how many guesses there are left
		$ret .= "<p> You have: " .  (6 - $this->game->getGuesses()) . " attempts left.</p>
			<p>
				"; 
		
		//Construct the alphabet used for user input
		foreach($this->letters as $char){
			$ret .= "<a href='?play&letter=$char'>$char</a> "		;
				
		}	
		
		$ret .= "<br><a href='?'>Back to menu</a>";
				
				return $ret;
	}
	
	/**
	* Function used to fetch the letter that the user has inputed from the URL.
	* @return String or false 
	*/
	public function getInput(){
		if(!empty($_GET['letter']))
			return $_GET['letter'];
		else return false;
	}
	
	//Functions used to manipulate the message by the controller
	public function setMessageWin(){
		$this->message = "You Win!";
	}
	
	public function setMessageLose(){
		$this->message = "You Lose!";
	}
	
	public function setMessageDublicate(){
		$this->message = "Already entered that letter!";
	}
	
	public function setMessageBadChar(){
		$this->message = "You are trying to enter a non-letter!";
	}
	
	
	//Private functions to generate the 'hanged man'
	private function setAnimationZero(){
		return "&nbsp &nbsp &nbsp &nbsp ====<br>|<br>|<br>|";
	}
	
	private function setAnimationOne(){
		return "&nbsp &nbsp &nbsp ====<br>|&nbsp &nbsp o<br>|&nbsp &nbsp &nbsp<br>|&nbsp &nbsp &nbsp";
	}
	
	private function setAnimationTwo(){
		return "&nbsp &nbsp &nbsp ====<br>|&nbsp &nbsp o<br>|&nbsp &nbsp 0<br>|&nbsp &nbsp &nbsp";
	}
	
	private function setAnimationThree(){
		return "&nbsp &nbsp &nbsp ====<br>|&nbsp &nbsp o<br>| &nbsp -0<br>|&nbsp &nbsp &nbsp";
	}
	
	private function setAnimationFour(){
		return "&nbsp &nbsp &nbsp ====<br>|&nbsp &nbsp o<br>| &nbsp -0-<br>|&nbsp &nbsp &nbsp";
	}
	
	private function setAnimationFive(){
		return "&nbsp &nbsp &nbsp ====<br>|&nbsp &nbsp o<br>| &nbsp -0-<br>|&nbsp/ &nbsp &nbsp";
	}
	
	private function setAnimationSix(){
		return "&nbsp &nbsp &nbsp ====<br>|&nbsp &nbsp o<br>| &nbsp -0-<br>|&nbsp &nbsp /&nbsp \ ";
	}
	
	

}
	
	
	

