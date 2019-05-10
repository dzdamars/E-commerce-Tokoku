<?php

class Invoice extends Controller {
	
	public function __construct(){
		parent::__construct();	
		$this->model(array('invoice_m'));
	}
	
	public function index(){
		
		$this->p->setup(10);
		$offset = $this->p->offset;
		$limit = $this->p->limit;
		
		$data['data'] = $this->db->fetch("SELECT * FROM order_group WHERE id_member = :idm LIMIT $offset, $limit", 
						array(':idm' => $_SESSION[SESS]['member']['id_member']));
		$data['total'] = $this->db->count("SELECT * FROM order_group WHERE id_member = :idm", 
						array(':idm' => $_SESSION[SESS]['member']['id_member']));
						
		$data['offset'] = $offset;
		$data['pagination'] = $this->p->create_links($data['total']);
		
		$this->view('sections/head');	
		$this->view('pages/invoice_awal', $data);	
		$this->view('sections/footer');	
	}
	
	public function detail($id = ''){
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
			$this->view('pages/invoice', $data);		
			$this->view('sections/footer');
			
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}

	public function invoice_detail($id = ''){
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
			$this->view('pages/invoice_detail', $data);		
			$this->view('sections/footer');
			
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
	
	public function final_ck(){
		$this->view('sections/head');			
		$this->view('pages/final_ck');		
		$this->view('sections/footer');

	}
	public function upload(){
		if(isset($_POST['submit'])){
			if($this->s->is_img('foto') == FALSE){
				$this->s->notice('Format foto tidak valid', 'invoice/detail/'.$_POST['in']);	}
			else {
				
				$foto = rand().$_FILES['foto']['name'];
				$tmp = $_FILES['foto']['tmp_name'];
				
				move_uploaded_file($tmp, './public/images/invoice/'.$foto);
				
				$data = "
					bp	= '".$foto."',
					status = '1'
				";
				
				$this->invoice_m->upload($data, $_POST['in']);
				$this->s->notice('Berhasil mengupload bukti pembayaran', 'invoice/detail/'.$_POST['in']);
			}
		}
	}
	
}