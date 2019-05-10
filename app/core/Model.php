<?php

class Model {

	public function __construct(){
		$this->library(array('db'));	
	}
	
	public function library($libs = array()){
		foreach($libs as $l){
			require_once 'app/libs/'.$l.'.php';
			$this->$l = new $l();
		}
	}
	
}