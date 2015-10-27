<?php
/**
  * View class used to handle the core HTML code for the page
  * @author Petko Gerdzhikov
  */
class HTMLView{
	/**
	 * Character set of the HTML document for example "utf-8"
	 * @var String
	 */
	private $charset;
	
	
	public function __construct($charset) {
		$this->charset = $charset;
	}
	
	/**
	 * Function to get a HTML string from body
	 * @param  String $body
	 * @return String, HTML
	 */
	public function getHTMLPage($body) {
		return "<!DOCTYPE html>
      <html>
        <head>
          <meta charset=\"" . $this->charset . "\">
          <title>1DV608 - Hangman</title>
        </head>
        <body>
		<center>
          $body
		</center>
        </body>
      </html>";
	}
}