<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent{
	
	private $_vars=[];
	
	/**
	 * Set user vars
	 *
	 * @param string $index
	 * @param mixed $value
	 * @return void
	 */
	public function __set($index, $value){
		$this->_vars[$index] = $value;
	}
	
	/**
	 * Get user info
	 *
	 * @param string $index
	 * @return mixed
	 */
	public function __get($index){
		return isset($this->_vars[$index]) ? $this->_vars[$index] : false; 
	}
	
}

?>