<?php

class HTMLView{
	/**
	 * Character set of the HTML document for example "utf-8"
	 * @var String
	 */
	private $charset;
	/**
	 * @param String $charset
	 */
	public function __construct($charset) {
		$this->charset = $charset;
	}
	/**
	 * get a HTML string from body
	 * @param  String $body
	 * @return String (HTML)
	 */
	public function getHTMLPage($body) {
		return "<!DOCTYPE html>
      <html>
        <head>
          <meta charset=\"" . $this->charset . "\">
          <title>1DV608 - Hangman</title>
        </head>
        <body>
          $body
        </body>
      </html>";
	}
}