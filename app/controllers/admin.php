<?php

class Admin extends Controller {

	public function __construct(){
		parent::__construct();
		$this->model(array('admin_m'));	
		
		if(!isset($_SESSION[SESS]['admin'])){
			if(URI2 != 'login'){
				$this->s->redirect('');	
			}
		}
	}
	
	public function index(){
		$this->s->redirect('admin/items');
	}
	
	public function items(){
		$this->p->setup(10);
		$offset = $this->p->offset;
		$limit = $this->p->limit;
		
		$data['data'] = $this->db->fetch("SELECT * FROM items ORDER BY nama_item ASC LIMIT $offset, $limit");
		$data['total'] = $this->db->count("SELECT * FROM items ORDER BY nama_item ASC");
		$data['offset'] = $offset;
		$data['pagination'] = $this->p->create_links($data['total']);
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-items', $data);	
		$this->view('sections/footer');	
	}
	
	public function login(){
		
		if(isset($_POST['submit'])){
			$check = $this->db->count("SELECT * FROM admin WHERE username = :username AND password = :pass", 
					 array(':username' => $_POST['username'], ':pass' => md5($_POST['password'])));	
					 
			if($check != 0){
				$get = $this->db->fetch("SELECT * FROM admin WHERE username = :username AND password = :pass", 
						 array(':username' => $_POST['username'], ':pass' => md5($_POST['password'])));	
						 
				$_SESSION[SESS]['admin'] = $get[0];
				$this->s->notice('Berhasil login', 'admin/');
			} else {
				$this->s->notice('Username atau password salah', 'admin/login');	
			}
		}
		
		$this->view('sections/head');		
		$this->view('pages/admin-login');
		$this->view('sections/footer');	

	}
	
	public function logout(){
		$this->ses->logout();
		$this->s->notice('Berhasil logout', '');	
	}
	
	public function add_item(){
		
		if(isset($_POST['submit'])){
			if(!is_numeric($_POST['harga'])){
				$this->s->notice('Harga hanya boleh berisi angka', 'admin/add_item');	}
			elseif(!is_numeric($_POST['qty'])){
				$this->s->notice('Qty boleh berisi angka', 'admin/add_item');	}
			elseif(!is_numeric($_POST['diskon'])){
				$this->s->notice('Diskon hanya boleh berisi angka', 'admin/add_item');	}
			elseif($_POST['kategori'] == 'all'){
				$this->s->notice('Kategori belum dipilih', 'admin/add_item');	}
			elseif($_POST['lokasi'] == 'all'){
				$this->s->notice('Lokasi belum dipilih', 'admin/add_item');	}
			elseif($this->s->is_img('foto') == FALSE){
				$this->s->notice('Format foto tidak valid', 'admin/add_item');	}
			else {
				$foto = rand().$_FILES['foto']['name'];
				$tmp = $_FILES['foto']['tmp_name'];
				
				move_uploaded_file($tmp, './public/images/items/'.$foto);
				
				$data = array(
					'id_kategori'	=> $_POST['kategori'],
					'id_lokasi'		=> $_POST['lokasi'],
					'nama_item'		=> $_POST['nama_item'],
					'merk'			=> $_POST['merk'],
					'harga'			=> $_POST['harga'],
					'qty'			=> $_POST['qty'],
					'diskon'		=> $_POST['diskon'],
					'deskripsi'		=> $_POST['deskripsi'],
					'foto'			=> $foto,
					'terjual'		=> 0
				);
				
				$this->admin_m->insert('items', $data);
				$this->s->notice('Berhasil menambahkan item', 'admin/items');
			}
		}
		
		$data['kategori'] = $this->db->fetch("SELECT * FROM kategori ORDER BY kategori ASC");
		$data['lokasi'] = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC");
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-add_item', $data);	
		$this->view('sections/footer');	
	}
	

	public function detail_item($id = '') {
	if(isset($_POST['submit'])){
			if(!is_numeric($_POST['harga'])){
				$this->s->notice('Harga hanya boleh berisi angka', 'admin/edit_item/'.$id);	}
			elseif(!is_numeric($_POST['qty'])){
				$this->s->notice('Qty boleh berisi angka', 'admin/edit_item/'.$id);	}
			elseif(!is_numeric($_POST['diskon'])){
				$this->s->notice('Diskon hanya boleh berisi angka', 'admin/edit_item/'.$id);	}
			elseif($_POST['kategori'] == 'all'){
				$this->s->notice('Kategori belum dipilih', 'admin/edit_item/'.$id);	}
			elseif($_POST['lokasi'] == 'all'){
				$this->s->notice('Lokasi belum dipilih', 'admin/edit_item/'.$id);	}
			elseif(is_uploaded_file($_FILES['foto']['tmp_name']) && $this->s->is_img('foto') == FALSE){
				$this->s->notice('Format foto tidak valid', 'admin/edit_item/'.$id);	}
			else {
				
				if(is_uploaded_file($_FILES['foto']['tmp_name'])){
					$foto = rand().$_FILES['foto']['name'];
					$tmp = $_FILES['foto']['tmp_name'];
					
					move_uploaded_file($tmp, './public/images/items/'.$foto);
					
					$data = "
						id_kategori  = '".$_POST['kategori']."',
						id_lokasi	 = '".$_POST['lokasi']."',
						nama_item 	 = '".$_POST['nama_item']."',
						merk 		 = '".$_POST['merk']."',
						harga 		 = '".$_POST['harga']."',
						qty 		 = '".$_POST['qty']."',
						diskon 		 = '".$_POST['diskon']."',
						deskripsi 	 = '".$_POST['deskripsi']."',
						foto 		 = '".$foto."'
					";
				} else {
					
					$data = "
						id_kategori  = '".$_POST['kategori']."',
						id_lokasi	 = '".$_POST['lokasi']."',
						nama_item 	 = '".$_POST['nama_item']."',
						merk 		 = '".$_POST['merk']."',
						harga 		 = '".$_POST['harga']."',
						qty 		 = '".$_POST['qty']."',
						diskon 		 = '".$_POST['diskon']."',
						deskripsi 	 = '".$_POST['deskripsi']."'
					";
				}
				
				$this->admin_m->edit_item($data, $_POST['id_item']);
				$this->s->notice('Berhasil memperbarui item', 'admin/edit_item/'.$_POST['id_item']);
			}
		}
		
		$data['kategori'] = $this->db->fetch("SELECT * FROM kategori ORDER BY kategori ASC");
		$data['lokasi'] = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC");
		$data['data'] = $this->db->fetch("SELECT * FROM items WHERE id_item = :idi", array(':idi' => $id));
		$data['total'] = $this->db->count("SELECT * FROM items WHERE id_item = :idi", array(':idi' => $id));
		
		if($data['total'] < 1) {
			die('404 PAGE NOT FOUND');
		}
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-detail_item', $data);	
		$this->view('sections/footer');	
	}
	
	public function edit_item($id = ''){
		
		if(isset($_POST['submit'])){
			if(!is_numeric($_POST['harga'])){
				$this->s->notice('Harga hanya boleh berisi angka', 'admin/edit_item/'.$id);	}
			elseif(!is_numeric($_POST['qty'])){
				$this->s->notice('Qty boleh berisi angka', 'admin/edit_item/'.$id);	}
			elseif(!is_numeric($_POST['diskon'])){
				$this->s->notice('Diskon hanya boleh berisi angka', 'admin/edit_item/'.$id);	}
			elseif($_POST['kategori'] == 'all'){
				$this->s->notice('Kategori belum dipilih', 'admin/edit_item/'.$id);	}
			elseif($_POST['lokasi'] == 'all'){
				$this->s->notice('Lokasi belum dipilih', 'admin/edit_item/'.$id);	}
			elseif(is_uploaded_file($_FILES['foto']['tmp_name']) && $this->s->is_img('foto') == FALSE){
				$this->s->notice('Format foto tidak valid', 'admin/edit_item/'.$id);	}
			else {
				
				if(is_uploaded_file($_FILES['foto']['tmp_name'])){
					$foto = rand().$_FILES['foto']['name'];
					$tmp = $_FILES['foto']['tmp_name'];
					
					move_uploaded_file($tmp, './public/images/items/'.$foto);
					
					$data = "
						id_kategori  = '".$_POST['kategori']."',
						id_lokasi	 = '".$_POST['lokasi']."',
						nama_item 	 = '".$_POST['nama_item']."',
						merk 		 = '".$_POST['merk']."',
						harga 		 = '".$_POST['harga']."',
						qty 		 = '".$_POST['qty']."',
						diskon 		 = '".$_POST['diskon']."',
						deskripsi 	 = '".$_POST['deskripsi']."',
						foto 		 = '".$foto."'
					";
				} else {
					
					$data = "
						id_kategori  = '".$_POST['kategori']."',
						id_lokasi	 = '".$_POST['lokasi']."',
						nama_item 	 = '".$_POST['nama_item']."',
						merk 		 = '".$_POST['merk']."',
						harga 		 = '".$_POST['harga']."',
						qty 		 = '".$_POST['qty']."',
						diskon 		 = '".$_POST['diskon']."',
						deskripsi 	 = '".$_POST['deskripsi']."'
					";
				}
				
				$this->admin_m->edit_item($data, $_POST['id_item']);
				$this->s->notice('Berhasil memperbarui item', 'admin/items/'.$_POST['id_item']);
			}
		}
		
		$data['kategori'] = $this->db->fetch("SELECT * FROM kategori ORDER BY kategori ASC");
		$data['lokasi'] = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC");
		$data['data'] = $this->db->fetch("SELECT * FROM items WHERE id_item = :idi", array(':idi' => $id));
		$data['total'] = $this->db->count("SELECT * FROM items WHERE id_item = :idi", array(':idi' => $id));
		
		if($data['total'] < 1) {
			die('404 PAGE NOT FOUND');
		}
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-edit_item', $data);	
		$this->view('sections/footer');	
	}
	
	public function delete_item($id = ''){
		$check = $this->db->count("SELECT * FROM items WHERE id_item = :idi", array(':idi' => $id));
		if($check != 0){
			$this->admin_m->delete_item($id);
			$this->s->notice('Berhasil menghapus item', 'admin/items');
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
	
	public function bulk_delete_item(){
		if(isset($_POST['box'])){
			foreach($_POST['box'] as $key => $value){
				$this->admin_m->delete_item($value);	
			}
			$this->s->notice('Berhasil menghapus items', 'admin/items');
		}
	}
	
	public function members(){
		$this->p->setup(10);
		$offset = $this->p->offset;
		$limit = $this->p->limit;
		
		$data['data'] = $this->db->fetch("SELECT * FROM members ORDER BY nama ASC LIMIT $offset, $limit");
		$data['total'] = $this->db->count("SELECT * FROM members ORDER BY nama ASC");
		$data['offset'] = $offset;
		$data['pagination'] = $this->p->create_links($data['total']);
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-members', $data);	
		$this->view('sections/footer');	
	}
	
	public function add_member(){
		
		if(isset($_POST['submit'])){
			
			$checkEmail = $this->db->count("SELECT * FROM members WHERE email = :em", array(':em' => $_POST['email']));
			
			if(!is_numeric($_POST['telepon'])){
				$this->s->notice('Telepon hanya boleh berisi angka', 'admin/add_member');	}
			elseif(!is_numeric($_POST['kode_pos'])){
				$this->s->notice('Kode Pos boleh berisi angka', 'admin/add_member');	}
			elseif(!is_numeric($_POST['no_rekening'])){
				$this->s->notice('Nomor Rekening hanya boleh berisi angka', 'admin/add_member');	}
			elseif($_POST['lokasi'] == 'all'){
				$this->s->notice('Lokasi belum dipilih', 'admin/add_member');	}
			elseif($this->s->is_img('foto') == FALSE){
				$this->s->notice('Format foto tidak valid', 'admin/add_member');	}
			elseif($this->s->is_email($_POST['email']) == FALSE){
				$this->s->notice('Email tidak valid', 'admin/add_member');	}
			elseif($checkEmail != 0){
				$this->s->notice('Email telah terdaftar, cobalah email lain', 'admin/add_member');	}
			else {
				
				$foto = rand().$_FILES['foto']['name'];
				$tmp = $_FILES['foto']['tmp_name'];
				
				move_uploaded_file($tmp, './public/images/members/'.$foto);
				
				$data = array(
					'nama'			=> $_POST['nama'],
					'email'			=> $_POST['email'],
					'password'		=> md5($_POST['password']),
					'telepon'		=> $_POST['telepon'],
					'no_rekening'	=> $_POST['no_rekening'],
					'kode_pos'		=> $_POST['kode_pos'],
					'id_lokasi'		=> $_POST['lokasi'],
					'alamat'		=> $_POST['alamat'],
					'foto'			=> $foto
				);
				
				$this->admin_m->insert('members', $data);
				$this->s->notice('Berhasil menambahkan member', 'admin/members');
			}
		}
		
		$data['lokasi'] = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC");
		
		$this->view('sections/head');
		$this->view('sections/side');
		$this->view('pages/admin-add_member', $data);
		$this->view('sections/footer');
	}
	
	public function edit_member($id = ''){
		
		$check = $this->db->count("SELECT * FROM members WHERE id_member = :idm", array(':idm' => $id));
		
		if(isset($_POST['submit'])){
			
			$id = $_POST['id_member'];
			
			if(!is_numeric($_POST['telepon'])){
				$this->s->notice('Telepon hanya boleh berisi angka', 'admin/edit_member/'.$id);	}
			elseif(!is_numeric($_POST['kode_pos'])){
				$this->s->notice('Kode Pos boleh berisi angka', 'admin/edit_member/'.$id);	}
			elseif(!is_numeric($_POST['no_rekening'])){
				$this->s->notice('Nomor Rekening hanya boleh berisi angka', 'admin/edit_member/'.$id);	}
			elseif($_POST['lokasi'] == 'all'){
				$this->s->notice('Lokasi belum dipilih', 'admin/edit_member/'.$id);	}
			elseif(is_uploaded_file($_FILES['foto']['tmp_name']) && $this->s->is_img('foto') == FALSE){
				$this->s->notice('Format foto tidak valid', 'admin/edit_member/'.$id);	}
			elseif($this->s->is_email($_POST['email']) == FALSE){
				$this->s->notice('email tidak valid', 'admin/edit_member/'.$id);	}
			else {
				
				if(!empty($_POST['password'])){
					$password = md5($_POST['password']);	
				} else {
					$password = $_POST['old_password'];
				}
				
				if(is_uploaded_file($_FILES['foto']['tmp_name'])){
				
					$foto = rand().$_FILES['foto']['name'];
					$tmp = $_FILES['foto']['tmp_name'];
					
					move_uploaded_file($tmp, './public/images/members/'.$foto);
					
					$data = "
						nama		= '".$_POST['nama']."',
						email		= '".$_POST['email']."',
						password	= '".$password."',
						telepon		= '".$_POST['telepon']."',
						no_rekening	= '".$_POST['no_rekening']."',
						kode_pos	= '".$_POST['kode_pos']."',
						id_lokasi	= '".$_POST['lokasi']."',
						alamat		= '".$_POST['alamat']."',
						foto		= '".$foto."'
					";
				} else {
					
					$data = "
						nama		= '".$_POST['nama']."',
						email		= '".$_POST['email']."',
						password	= '".$password."',
						telepon		= '".$_POST['telepon']."',
						no_rekening	= '".$_POST['no_rekening']."',
						kode_pos	= '".$_POST['kode_pos']."',
						id_lokasi	= '".$_POST['lokasi']."',
						alamat		= '".$_POST['alamat']."'
					";
				}
				
				$this->admin_m->edit_member($data, $_POST['id_member']);
				$this->s->notice('Berhasil memperbarui account member', 'admin/members/'.$id);
			}
		}
		
		$data['lokasi'] = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC");
		$data['data'] = $this->db->fetch("SELECT * FROM members WHERE id_member = :idm", array(':idm' => $id));
		
		$this->view('sections/head');
		$this->view('sections/side');
		$this->view('pages/admin-edit_member', $data);
		$this->view('sections/footer');
	}
	
	public function delete_member($id = ''){
		$check = $this->db->count("SELECT * FROM members WHERE id_member = :idi", array(':idi' => $id));
		if($check != 0){
			$this->admin_m->delete_member($id);
			$this->s->notice('Berhasil menghapus member', 'admin/members');
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
	
	public function bulk_delete_member(){
		if(isset($_POST['box'])){
			foreach($_POST['box'] as $key => $value){
				$this->admin_m->delete_member($value);	
			}
			$this->s->notice('Berhasil menghapus members', 'admin/members');
		}
	}
	
	public function menu(){
		$this->p->setup(10);
		$offset = $this->p->offset;
		$limit = $this->p->limit;
		
		$data['data'] = $this->db->fetch("SELECT * FROM menu ORDER BY judul_menu ASC LIMIT $offset, $limit");
		$data['total'] = $this->db->count("SELECT * FROM menu ORDER BY judul_menu ASC");
		$data['offset'] = $offset;
		$data['pagination'] = $this->p->create_links($data['total']);
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-menu', $data);	
		$this->view('sections/footer');	
	}
	
	public function add_menu(){
		
		if(isset($_POST['submit'])){
			$data = array(
				'judul_menu'	=> $_POST['judul_menu'],
				'caption'		=> $_POST['caption'],
				'status'		=> $_POST['status'],
				'konten'		=> $_POST['konten']
			);	
			$this->admin_m->insert('menu', $data);
			$this->s->notice('Berhasil menambahkan menu', 'admin/menu');
		}
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-add_menu');	
		$this->view('sections/footer');	
	}
	
	public function kirim_resi($in = ''){
		
		if(isset($_POST['submit'])){
			
			$data = "
				resi	= '".$_POST['resi']."',
				status  = '".$_POST['status']."'
				";
			
			$this->admin_m->update_invoice($data, $_POST['invoice_number']);
			$this->s->notice('Berhasil menambahkan resi', 'admin/invoice/'.$_POST['invoice_number']);
		}
		if(isset($_POST['submit'])){
			
			$data = "
				resi	= '".$_POST['resi']."'
				";
			
			$this->admin_m->update_invoice_detail($data, $_POST['invoice_number']);
			$this->s->notice('Berhasil menambahkan resi', 'admin/invoice/'.$_POST['invoice_number']);
		}
		$data['data'] = $this->db->fetch("SELECT * FROM order_group WHERE invoice_number = :in", array(':in' => $in));
		$data['total'] = $this->db->count("SELECT * FROM order_group WHERE invoice_number = :in", array(':in' => $in));
		
		if($data['total'] < 1){
			die('404 PAGE NOT FOUND');
		}
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/kirim_resi', $data);	
		$this->view('sections/footer');	
	}

	public function edit_menu($id = ''){
		
		if(isset($_POST['submit'])){
			
			$data = "
				judul_menu	= '".$_POST['judul_menu']."',
				caption		= '".$_POST['caption']."',
				status		= '".$_POST['status']."',
				konten		= '".$_POST['konten']."'
			";
			
			$this->admin_m->edit_menu($data, $_POST['id_menu']);
			$this->s->notice('Berhasil memperbarui menu', 'admin/edit_menu/'.$_POST['id_menu']);
		}
		
		$data['data'] = $this->db->fetch("SELECT * FROM menu WHERE id_menu = :idm", array(':idm' => $id));
		$data['total'] = $this->db->count("SELECT * FROM menu WHERE id_menu = :idm", array(':idm' => $id));
		
		if($data['total'] < 1){
			die('404 PAGE NOT FOUND');
		}
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-edit_menu', $data);	
		$this->view('sections/footer');	
	}
	
	public function delete_menu($id = ''){
		$check = $this->db->count("SELECT * FROM menu WHERE id_menu = :idi", array(':idi' => $id));
		if($check != 0){
			$this->admin_m->delete_menu($id);
			$this->s->notice('Berhasil menghapus menu', 'admin/menu');
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
	
	public function bulk_delete_menu(){
		if(isset($_POST['box'])){
			foreach($_POST['box'] as $key => $value){
				$this->admin_m->delete_menu($value);	
			}
			$this->s->notice('Berhasil menghapus menu', 'admin/menu');
		}
	}
	
	public function invoice(){
		
		$this->p->setup(10);
		$offset = $this->p->offset;
		$limit = $this->p->limit;
		
		$data['data'] = $this->db->fetch("SELECT * FROM order_group LIMIT $offset, $limit");
		$data['total'] = $this->db->count("SELECT * FROM order_group");
						
		$data['offset'] = $offset;
		$data['pagination'] = $this->p->create_links($data['total']);
		
		$this->view('sections/head');		
		$this->view('pages/invoice_awal', $data);	
		$this->view('sections/footer');	
	}
	

	public function confirm_invoice($in = ''){
		$check = $this->db->count("SELECT * FROM order_group WHERE invoice_number = :in", array(':in' => $in));	
		if($check != 0){
			$data = "status	= '2'";
			$this->admin_m->update_invoice($data, $in);
			$this->s->notice('Berhasil mengkonfirmasi bukti pembayaran', 'invoice/detail/'.$in);
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}

	public function reject_invoice($in = ''){
		$check = $this->db->count("SELECT * FROM order_group WHERE invoice_number = :in", array(':in' => $in));	
		if($check != 0){
			$data = "status	= '3'";
			$this->admin_m->update_invoice($data, $in);
			$this->s->notice('Berhasil menolak bukti pembayaran', 'invoice/detail/'.$in);
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}

	public function batalkan_pesanan($in = ''){
		$check = $this->db->count("SELECT * FROM order_group WHERE invoice_number = :in", array(':in' => $in));	
		if($check != 0){
			$data = "status	= '3'";
			$this->admin_m->update_invoice($data, $in);
			$this->s->notice('Berhasil membatalkan pesanan', 'invoice/detail/'.$in);
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
	public function kategori(){
		$this->p->setup(10);
		$offset = $this->p->offset;
		$limit = $this->p->limit;
		
		$data['data'] = $this->db->fetch("SELECT * FROM kategori ORDER BY kategori ASC LIMIT $offset, $limit");
		$data['total'] = $this->db->count("SELECT * FROM kategori ORDER BY kategori ASC");
		$data['offset'] = $offset;
		$data['pagination'] = $this->p->create_links($data['total']);
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-kategori', $data);	
		$this->view('sections/footer');		
	}
	
	public function add_kategori(){
		
		if(isset($_POST['submit'])){
			if($this->s->is_text($_POST['kategori']) == FALSE){
				$this->s->notice('Nama kategori hanya boleh berisi huruf', 'admin/add_kategori'); }
			else {
				$data = array(
					'kategori' => $_POST['kategori']
				);
				$this->admin_m->insert('kategori', $data);
				$this->s->notice('Berhasil menambahkan kategori', 'admin/kategori');
			}
		}
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-add_kategori');	
		$this->view('sections/footer');	
	}
	
	public function edit_kategori($id = ''){
		if(isset($_POST['submit'])){
			if($this->s->is_text($_POST['kategori']) == FALSE){
				$this->s->notice('Nama kategori hanya boleh berisi huruf', 'admin/add_kategori'); }
			else {
				$data = "
					kategori = '".$_POST['kategori']."'
				";
				
				$this->admin_m->edit_kategori($data, $_POST['id_kategori']);
				$this->s->notice('Berhasil memperbarui kategori', 'admin/edit_kategori/'.$_POST['id_kategori']);
			}
		}
		
		$data['data'] = $this->db->fetch("SELECT * FROM kategori WHERE id_kategori = :idk", array(':idk' => $id));
		$check = $this->db->count("SELECT * FROM kategori WHERE id_kategori = :idk", array(':idk' => $id));
		
		if($check == 0){
			die('404 PAGE NOT FOUND');	
		}
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-edit_kategori', $data);	
		$this->view('sections/footer');	
	}
	
	public function delete_kategori($id = ''){
		$check = $this->db->count("SELECT * FROM kategori WHERE id_kategori = :idi", array(':idi' => $id));
		if($check != 0){
			$this->admin_m->delete_kategori($id);
			$this->s->notice('Berhasil menghapus kategori', 'admin/kategori');
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
	
	public function bulk_delete_kategori(){
		if(isset($_POST['box'])){
			foreach($_POST['box'] as $key => $value){
				$this->admin_m->delete_kategori($value);	
			}
			$this->s->notice('Berhasil menghapus kategori', 'admin/kategori');
		}
	}
	
	///////////
	////////
	////////
	
	
	
	public function lokasi(){
		$this->p->setup(10);
		$offset = $this->p->offset;
		$limit = $this->p->limit;
		
		$data['data'] = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC LIMIT $offset, $limit");
		$data['total'] = $this->db->count("SELECT * FROM lokasi ORDER BY lokasi ASC");
		$data['offset'] = $offset;
		$data['pagination'] = $this->p->create_links($data['total']);
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-lokasi', $data);	
		$this->view('sections/footer');		
	}
	
	public function add_lokasi(){
		
		if(isset($_POST['submit'])){
			if($this->s->is_text($_POST['lokasi']) == FALSE){
				$this->s->notice('Nama lokasi hanya boleh berisi huruf', 'admin/add_lokasi'); }
			else {
				$data = array(
					'lokasi' => $_POST['lokasi']
				);
				$this->admin_m->insert('lokasi', $data);
				$this->s->notice('Berhasil menambahkan lokasi', 'admin/lokasi');
			}
		}
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-add_lokasi');	
		$this->view('sections/footer');	
	}
	
	public function edit_lokasi($id = ''){
		if(isset($_POST['submit'])){
			if($this->s->is_text($_POST['lokasi']) == FALSE){
				$this->s->notice('Nama lokasi hanya boleh berisi huruf', 'admin/add_lokasi'); }
			else {
				$data = "
					lokasi = '".$_POST['lokasi']."'
				";
				
				$this->admin_m->edit_lokasi($data, $_POST['id_lokasi']);
				$this->s->notice('Berhasil memperbarui lokasi', 'admin/edit_lokasi/'.$_POST['id_lokasi']);
			}
		}
		
		$data['data'] = $this->db->fetch("SELECT * FROM lokasi WHERE id_lokasi = :idk", array(':idk' => $id));
		$check = $this->db->count("SELECT * FROM lokasi WHERE id_lokasi = :idk", array(':idk' => $id));
		
		if($check == 0){
			die('404 PAGE NOT FOUND');	
		}
		
		$this->view('sections/head');	
		$this->view('sections/side');	
		$this->view('pages/admin-edit_lokasi', $data);	
		$this->view('sections/footer');	
	}
	
	public function delete_lokasi($id = ''){
		$check = $this->db->count("SELECT * FROM lokasi WHERE id_lokasi = :idi", array(':idi' => $id));
		if($check != 0){
			$this->admin_m->delete_lokasi($id);
			$this->s->notice('Berhasil menghapus lokasi', 'admin/lokasi');
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
	
	public function bulk_delete_lokasi(){
		if(isset($_POST['box'])){
			foreach($_POST['box'] as $key => $value){
				$this->admin_m->delete_lokasi($value);	
			}
			$this->s->notice('Berhasil menghapus lokasi', 'admin/lokasi');
		}
	}
	
}