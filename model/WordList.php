<?php

class WordList{
	
	private $words = array();
	
	public function add($toBeAdded){
		$this->words[] = $toBeAdded;
	}
	
	public function getWord(){
		shuffle($this-words);
		$word = array_shift($this->words);
		return $word;
	}
}