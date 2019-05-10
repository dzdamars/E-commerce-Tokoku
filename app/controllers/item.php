<?php

class Item extends Controller {

	public function index($id = ''){
		
		$data['data'] = $this->db->fetch("SELECT items.*, lokasi.*, kategori.* FROM items
										 	JOIN lokasi
												ON lokasi.id_lokasi = items.id_lokasi
											JOIN kategori
												ON kategori.id_kategori = items.id_kategori
											WHERE items.id_item = :idk", array(':idk' => $id));
		
		$data['total'] = $this->db->count("SELECT items.*, lokasi.*, kategori.* FROM items
										 	JOIN lokasi
												ON lokasi.id_lokasi = items.id_lokasi
											JOIN kategori
												ON kategori.id_kategori = items.id_kategori
											WHERE items.id_item = :idk", array(':idk' => $id));
											
		if($data['total'] == 0){
			die('404 PAGE NOT FOUND');	
		}
		
		$this->view('sections/head');
		$this->view('pages/detail', $data);
		$this->view('sections/footer');	
	}
	
}