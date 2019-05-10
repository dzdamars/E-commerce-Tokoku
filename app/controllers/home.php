<?php

class Home extends Controller {


	
	public function index(){
		
		$data['items'] = $this->db->fetch("SELECT * FROM items JOIN kategori ON kategori.id_kategori = items.id_kategori ORDER BY id_item and kategori DESC LIMIT 4");
		$data['best_items'] = $this->db->fetch("SELECT * FROM items ORDER BY terjual DESC LIMIT 4");
		$data['promo_items'] = $this->db->fetch("SELECT * FROM items ORDER BY diskon DESC LIMIT 4");
		$data['highprice_items'] = $this->db->fetch("SELECT * FROM items ORDER BY harga DESC LIMIT 4");

		$this->view('sections/head');
		$this->view('sections/banner');
		$this->view('pages/home',$data);
		$this->view('sections/footer');

		}
	
}