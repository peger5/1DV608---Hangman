<?php

class SubmitView{
	
	private static $messageId = "SubmitView::Message";
	private static $word = "SubmitView::Word";
	private static $submit = "SubmitView::Submit";
	
	private static $messageField = "";
	
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
}