<?php

class Cart extends Controller {
	
	public function __construct(){
		parent::__construct();
		$this->model(array('cart_m'));	
		if(isset($_SESSION[SESS]['admin'])){
			$this->s->redirect('');
		}	
	}
	
	public function index(){
		$this->s->redirect('cart/my_cart');	
	}
	
	public function my_cart(){	
		if(!isset($_SESSION[SESS]['member'])){
			$this->s->redirect('');
		}	
		
		if(isset($_SESSION[SESS]['member']['cart'])){
			$count = count($_SESSION[SESS]['member']['cart']);
			$sql = "SELECT * FROM items WHERE id_item IN";
			$k = '';
			foreach($_SESSION[SESS]['member']['cart'] as $key => $value){
				$k .= $key.",";
			}
			
			//echo "<pre>";
			//print_r($_SESSION[SESS]['member']['cart']);
			
			$sql .= "(".substr($k,0,-1).")";
			$data['data'] = $this->db->fetch($sql);
			$data['total'] = $this->db->count($sql);
		} else {
			$data['total'] = 0;	
		}
		
		
		$this->view('sections/head');	
		$this->view('pages/ck', $data);	
		$this->view('sections/footer');	
	}
	
	public function add($id = ''){
		if(!isset($_SESSION[SESS]['member'])){
			$this->s->notice('Login terlebih dahulu', 'member/login');
		} else {
			
			$id = intval($id);
		
			$check = $this->db->count("SELECT * FROM items WHERE id_item = :idi", array(':idi' => $id));
			if($check != 0){
				$data = $this->db->fetch("SELECT * FROM items WHERE id_item = :idi", array(':idi' => $id));
				
				if(isset($_SESSION[SESS]['member']['cart'][$id])){
					$_SESSION[SESS]['member']['cart'][$id]['qty']++;
					$this->s->redirect('cart/my_cart');
				} else {
					
					$diskon = $data[0]['harga'] * $data[0]['diskon'] / 100;
					$harga = $data[0]['harga'] - $diskon;
					
					$_SESSION[SESS]['member']['cart'][$id] = array(
						'harga'	=> $harga,
						'qty'	=> 1
					);
					$this->s->redirect('cart/my_cart');
				}
			} else {
				die('404 PAGE NOT FOUND');	
			}
			
		}
	}

	public function empty_cart(){
		unset($_SESSION[SESS]['member']['cart']);
		$this->s->redirect('cart');
	}
	
	public function batalkan_pesanan(){
		unset($_SESSION[SESS]['member']['invoice']);
		$this->s->notice('Anda Membatalkan Pesanan','');
	}

	public function cart_empty(){	
		
		$this->s->notice('Anda Harus Login untuk melihat isinya','member/login');
	}
	
	public function delete($id = ''){
		if(count($_SESSION[SESS]['member']['cart']) > 1){
			unset($_SESSION[SESS]['member']['cart'][$id]);
		} else {
			unset($_SESSION[SESS]['member']['cart']);
		}
		$this->s->redirect('cart/my_cart');
	}
	
	public function action(){
		if(isset($_POST['submit']))	{
			switch($_POST['submit']){
				case 'update':
					foreach($_POST['qty'] as $key => $value){
						if($value < 1){
							if(count($_SESSION[SESS]['member']['cart']) > 1){
								unset($_SESSION[SESS]['member']['cart'][$key]);
							} else {
								unset($_SESSION[SESS]['member']['cart']);
							}
						} else {
							$_SESSION[SESS]['member']['cart'][$key]['qty'] = $value;
						}
						$this->s->redirect('cart/my_cart');
					}
					break;
				case 'checkout':
					date_default_timezone_set('Asia/Jakarta');
					$id_member = $_SESSION[SESS]['member']['id_member'];
					$invoice_number = $id_member.date('dmyi');
				
					$data = array(
						'id_member'			=> $id_member,
						'invoice_number'	=> $invoice_number,
						'total_bayar'		=> $_POST['total_bayar'],
						'status'			=> 0	
					);
					
					$this->cart_m->insert('order_group', $data);
					
					foreach($_SESSION[SESS]['member']['cart'] as $key => $value){
						$qty = $_SESSION[SESS]['member']['cart'][$key]['qty'];
						$harga = $_SESSION[SESS]['member']['cart'][$key]['harga'];
						
						$getData = $this->db->fetch("SELECT * FROM items WHERE id_item = :idi", array(':idi' => $key));
						$u_qty = $getData[0]['qty'] - $qty;
						$u_terjual = $getData[0]['terjual'] + $qty;
						
						$data_u = "
							qty 	= ".$u_qty.",
							terjual = ".$u_terjual."
						";
						
						$this->cart_m->update_item($data_u, $key);
						
						$data = array(
							'id_item'		 => $key,
							'invoice_number' => $invoice_number,
							'qty'			 => $_SESSION[SESS]['member']['cart'][$key]['qty'],
							'total_harga'	 => $harga * $qty
						);		
						$this->cart_m->insert('order_detail', $data);
					}
					unset($_SESSION[SESS]['member']['cart']);
					$this->s->notice('Berhasil checkout', 'invoice/detail/'.$invoice_number);
					break;
			}
			
		}
	}
	
	
}