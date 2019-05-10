<?php

class Help extends Controller {


	
	public function index(){

		$this->view('sections/head');
		$this->view('pages/help');
		$this->view('sections/footer');

		}
	
}