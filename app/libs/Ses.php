<?php

class Ses {

	public function __construct(){
		@session_start();	
	}
	
	public function logout(){
		session_destroy();	
	}

	
}