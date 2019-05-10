<?php

class Method extends Controller {

public function index($id = '') {
		$check = $this->db->count("SELECT * FROM order_group WHERE invoice_number = :in", array(':in' => $id));	
		if($check != 0){
			$data['data'] = $this->db->fetch("SELECT items.*, order_group.*, order_detail.* FROM order_detail
												JOIN items
													ON items.id_item = order_detail.id_item
												JOIN order_group
													ON order_group.invoice_number = order_detail.invoice_number
												WHERE order_detail.invoice_number = :in", array(':in' => $id));
			$data['total'] = $this->db->count("SELECT items.*, order_group.*, order_detail.* FROM order_detail
												JOIN items
													ON items.id_item = order_detail.id_item
												JOIN order_group
													ON order_group.invoice_number = order_detail.invoice_number
												WHERE order_detail.invoice_number = :in", array(':in' => $id));
												
			$this->view('sections/head');			
			$this->view('pages/bank', $data);		
			$this->view('sections/footer');
			
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
		public function bank_transfer($id = ''){
$check = $this->db->count("SELECT * FROM order_group WHERE invoice_number = :in", array(':in' => $id));	
		if($check != 0){
			$data['data'] = $this->db->fetch("SELECT items.*, order_group.*, order_detail.* FROM order_detail
												JOIN items
													ON items.id_item = order_detail.id_item
												JOIN order_group
													ON order_group.invoice_number = order_detail.invoice_number
												WHERE order_detail.invoice_number = :in", array(':in' => $id));
			$data['total'] = $this->db->count("SELECT items.*, order_group.*, order_detail.* FROM order_detail
												JOIN items
													ON items.id_item = order_detail.id_item
												JOIN order_group
													ON order_group.invoice_number = order_detail.invoice_number
												WHERE order_detail.invoice_number = :in", array(':in' => $id));
												
			$this->view('sections/head');			
			$this->view('pages/final_ck', $data);		
			$this->view('sections/footer');
			
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
	public function indomart_transfer($id = ''){
	$check = $this->db->count("SELECT * FROM order_group WHERE invoice_number = :in", array(':in' => $id));	
		if($check != 0){
			$data['data'] = $this->db->fetch("SELECT items.*, order_group.*, order_detail.* FROM order_detail
												JOIN items
													ON items.id_item = order_detail.id_item
												JOIN order_group
													ON order_group.invoice_number = order_detail.invoice_number
												WHERE order_detail.invoice_number = :in", array(':in' => $id));
			$data['total'] = $this->db->count("SELECT items.*, order_group.*, order_detail.* FROM order_detail
												JOIN items
													ON items.id_item = order_detail.id_item
												JOIN order_group
													ON order_group.invoice_number = order_detail.invoice_number
												WHERE order_detail.invoice_number = :in", array(':in' => $id));
												
			$this->view('sections/head');			
			$this->view('pages/final_indo', $data);		
			$this->view('sections/footer');
			
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
	public function alfa_transfer($id = ''){
	$check = $this->db->count("SELECT * FROM order_group WHERE invoice_number = :in", array(':in' => $id));	
		if($check != 0){
			$data['data'] = $this->db->fetch("SELECT items.*, order_group.*, order_detail.* FROM order_detail
												JOIN items
													ON items.id_item = order_detail.id_item
												JOIN order_group
													ON order_group.invoice_number = order_detail.invoice_number
												WHERE order_detail.invoice_number = :in", array(':in' => $id));
			$data['total'] = $this->db->count("SELECT items.*, order_group.*, order_detail.* FROM order_detail
												JOIN items
													ON items.id_item = order_detail.id_item
												JOIN order_group
													ON order_group.invoice_number = order_detail.invoice_number
												WHERE order_detail.invoice_number = :in", array(':in' => $id));
												
			$this->view('sections/head');			
			$this->view('pages/final_alfa', $data);		
			$this->view('sections/footer');
			
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
}