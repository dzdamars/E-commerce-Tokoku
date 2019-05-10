<?php

class Controller {

	public function __construct(){
		$this->library(array('db', 'p', 'ses', 's'));
	}
	
	public function view($view, $data = array()){
		extract($data);	
		require_once 'app/views/'.$view.'.php';
	}
	
	public function model($model = array()){
		foreach($model as $m){
			require_once 'app/models/'.$m.'.php';
			$this->$m = new $m();
		}
	}
	
	public function library($libs = array()){
		foreach($libs as $l){
			require_once 'app/libs/'.$l.'.php';
			$this->$l = new $l();
		}
	}
	
}