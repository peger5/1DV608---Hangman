<?php

require_once('Settings.php');

/**
  * Model class for handling the game status
  * @author Petko Gerdzhikov
  */
class GameContext{
	/**
	* Variable for the current session
	* @var Session
	*/
	private $storage;
	
	public function __construct(Session $store){
		$this->storage = $store;
	}
	
	/**
	* Function for overriding the current session fields
	* @return void
	*/
	public function reset(){
		$this->storage->write(Settings::APP_SESSION_NAME, array());
	}
	
	/**
	* Function for spawing a new game
	* @param Word $w, the word that is going to be played
	* @return Game
	*/
	public function newGame(Word $w){
		return new Game($w);
	}
	
	/**
	* Function for loading the game from the session storage
	* @return Game
	*/
	public function loadGame(){
		$data = $this->storage->read(Settings::APP_SESSION_NAME);
		 if (!count($data)) {
            return false;
        }
        $word = new Word(
            $data['word'],
            $data['right_letters'],
            $data['tried_letters']
        );
        return new Game($word, $data['attempts']);
    }
	
	/**
	* Function for saving the current game context into the session
	* @return void
	*/
    public function save(Game $game){
        $data = $game->getContext();
        $this->storage->write(Settings::APP_SESSION_NAME, $data);
    }
	
}