<?php
/**
  * View class responsible for handling the HTML representation of the submit form.
  * @author Petko Gerdzhikov
  */
class SubmitView{
	
	private static $messageId = "SubmitView::Message";
	private static $word = "SubmitView::Word";
	private static $submit = "SubmitView::Submit";
	
	/**
	* Variable used for the message field.
	* @var String
	*/
	private static $messageField = "";
	
	/**
	* Function to fetch HTML string used to generate the submit form
	* @return String, HTML string
	*/
	public function getHTML(){
		$ret = "
		<form method='post' > 
				<fieldset>
					<legend>Sumbmit a new word, that everybody can try to guess!</legend>
					<p id='" . self::$messageId . "'>" . self::$messageField . "</p>
					
					<label for='" . self::$word . "'>Word :</label>
					<input type='text' size='16' id='" . self::$word . "' name='" . self::$word . "' value='' />
					<br>
					
					<input type='submit' name='" . self::$submit . "' value='Submit' />
				</fieldset>
			</form>
				<br>
				<a href='?'>Back to menu</a>";
		return "<h1>Contribute to the word list!</h1> $ret";
	}
	
	/**
	* Function to fetch the user input in the submit form
	* @return String, the word that the user has input in the field.
	*/
	public function getWordToSubmit() {
		if(isset($_POST[self::$word])){
				return trim($_POST[self::$word]);
		}
	}
	
	/**
	* Function to check if the submit button has been pressed by the user
	* @return boolean
	*/
	public function didUserPressSubmit(){
		return isset($_POST[self::$submit]);
	}
	
	// Functions used to manipulate the message on controller events
	public function setMessageInvalidInput(){
		self::$messageField = "Only english letters allowed!";
	}
	
	public function setMessageInvalidSize(){
		self::$messageField = "Word must be between 4 and 8 characters.";
	}
	
	public function setMessageSuccess(){
		self::$messageField = "Word successfuly added!";
	}
	
	public function setMessageDublicate(){
		self::$messageField = "Word already exists in database.";
	}
	
	
}