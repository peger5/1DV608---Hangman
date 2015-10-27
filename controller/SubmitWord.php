<?php

//Internal exception classes used for message generation
class WordSizeException extends Exception {};
class WordInvalidCharException extends Exception {};
class WordExistsException extends Exception {};

/**
  * Controller class responsible for adding a word to the database
  * @author Petko Gerdzhikov
  */
class SubmitWord{
	/**
	* Variable representing the word list behind a facade
	* @var WordFacade
	*/
	private $wordList;
	
	/**
	* Variable storing the submit view used to handle input and messages
	* @var SubmitView
	*/
	private $view;
	
	public function __construct(WordFacade $dal, SubmitView $sv){
		$this->wordList = $dal;
		$this->view = $sv;
	}
	
	/**
	* Main method to handle the user submitted word. Word is evaluated for correctness first.
	* After that it is added to the database and a proper message is displayed.
	* @return void
	*/
	public function doSubmit(){
		$wordToBeAdded = $this->view->getWordToSubmit();
		
		if($this->view->didUserPressSubmit()){
			try{
				if($this->checkWord($wordToBeAdded)){
					$this->wordList->add($wordToBeAdded);
					$this->view->setMessageSuccess();
				}	
			}
			catch (WordInvalidCharException $wie){
				$this->view->setMessageInvalidInput();
			}
			catch (WordSizeException $wse){
				$this->view->setMessageInvalidSize();
			}
			catch (WordExistsException $wee){
				$this->view->setMessageDublicate();
			}
			
		}
		
	}
	
	/**
	* Private function to check if a word is in correct format
	* @param String $word
	* @return boolean
	* @throws WordInvalidCharException is parameter doesnt consist only of english characters
	* @throws WordSizeException is paramater is shorter than 4 or larger than 8 characters
	* @throws WordExistsException is the parameter is already in word list
	*/
	private function checkWord($word){
		if (!ctype_alpha($word)){
			throw new WordInvalidCharException();
		}
		if(mb_strlen($word)< 4 || mb_strlen($word)>8){
			throw new WordSizeException();
		}
		if($this->wordList->getWords()->isWordInList($word)){
			throw new WordExistsException();
		}
		return true;
		
	}
}