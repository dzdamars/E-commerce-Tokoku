<?php

class Search extends Controller {
	
	public function index($id = ''){
		$this->p->setup(12);
		$offset = $this->p->offset;
		$limit = $this->p->limit;
		
		if(!isset($_GET['q'])){
			die('404 PAGE NOT FOUND');
		}
		
		
		if(!empty($_GET['q'])){
			if('all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q LIMIT $offset, $limit", 
				array(
					':q'	=> '%'.$_GET['q'].'%'
					
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q", 
				array(
					':q'	=> '%'.$_GET['q'].'%'
					
				));	
			}
			else {
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q LIMIT $offset, $limit", 
				array(
					':q'	=> '%'.$_GET['q'].'%'
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q", 
				array(
					':q'	=> '%'.$_GET['q'].'%'
				));	
			}
		}
			

			elseif($_GET['harga'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items LIMIT $offset, $limit");	
				$total = $this->db->count("SELECT * FROM items ");	
			}
		
		$data['data'] = $fetch;
		$data['total'] = $total;
		$data['offset'] = $offset;
		$data['pagination'] = $this->p->create_links($data['total']);
		
		
		$this->view('sections/head');	
		$this->view('pages/search', $data);	
		$this->view('sections/footer');	
	}
	
}