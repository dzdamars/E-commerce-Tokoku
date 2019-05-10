<?php

class Menu_atas extends Controller {

	public function __construct(){
		parent::__construct();	
	}
	
	public function index($page = ''){
		
		$data['data'] = $this->db->fetch("SELECT * FROM menu WHERE judul_menu = :jud", array(':jud' => $page));
		$total = $this->db->count("SELECT * FROM menu WHERE judul_menu = :jud", array(':jud' => $page));
		
		if($total == 0){
			die('404 PAGE NOT FOUND');	
		}
		
		$this->view('sections/head');	
		$this->view('pages/menu_atas', $data);	
		$this->view('sections/footer');	
	}
	
	public function sitemap(){
		$this->view('sections/head');	
		$this->view('pages/menu_atas.site');	
		$this->view('sections/footer');	
	}
	
}