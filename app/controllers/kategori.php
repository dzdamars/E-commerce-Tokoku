<?php

class Kategori extends Controller {
	
	public function index($id = ''){
		$this->p->setup(12);
		$offset = $this->p->offset;
		$limit = $this->p->limit;
		
		$data['data'] = $this->db->fetch("SELECT * FROM items WHERE id_kategori = :idk LIMIT $offset, $limit",
										 array(':idk' => $id));
		$data['total'] = $this->db->count("SELECT * FROM items WHERE id_kategori = :idk",
										 array(':idk' => $id));
		$data['offset'] = $offset;
		$data['pagination'] = $this->p->create_links($data['total']);
		$data['t_kategori'] = $this->db->count("SELECT * FROM kategori WHERE id_kategori = :idk", array(':idk' => $id));
		
		if($data['t_kategori'] == 0){
			die('404 PAGE NOT FOUND');	
		}
		
		$this->view('sections/head');	
		$this->view('pages/kategori', $data);	
		$this->view('sections/footer');	
	}
	
}