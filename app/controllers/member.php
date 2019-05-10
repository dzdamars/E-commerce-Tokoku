<?php

class Member extends Controller {

	public function __construct(){
		parent::__construct();	
		$this->model(array('member_m'));
	}
	
	public function sign_up(){
		
		if(isset($_SESSION[SESS]['member'])){
			$this->s->redirect('');	
		}
		
		if(isset($_POST['submit'])){
			
			$checkEmail = $this->db->count("SELECT * FROM members WHERE email = :em", array(':em' => $_POST['email']));
			
			if(!is_numeric($_POST['telepon'])){
				$this->s->notice('Telepon hanya boleh berisi angka', 'member/sign_up');	}
			elseif(!is_numeric($_POST['kode_pos'])){
				$this->s->notice('Kode Pos boleh berisi angka', 'member/sign_up');	}
			elseif(!is_numeric($_POST['no_rekening'])){
				$this->s->notice('Nomor Rekening hanya boleh berisi angka', 'member/sign_up');	}
			elseif($_POST['lokasi'] == 'all'){
				$this->s->notice('Lokasi belum dipilih', 'member/sign_up');	}
			elseif($this->s->is_img('foto') == FALSE){
				$this->s->notice('Format foto tidak valid', 'member/sign_up');	}
			elseif($this->s->is_email($_POST['email']) == FALSE){
				$this->s->notice('email tidak valid', 'member/sign_up');	}
			elseif($checkEmail != 0){
				$this->s->notice('Email telah terdaftar, cobalah email lain', 'member/sign_up');	}
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
				
				$this->member_m->insert('members', $data);
				$this->s->notice('Berhasil mendaftar', 'member/login');
			}
		}
		
		$data['lokasi'] = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC");
		
		$this->view('sections/head');
		$this->view('pages/sign_up', $data);
		$this->view('sections/footer');
	}
	
	public function login(){
		
		if(isset($_SESSION[SESS]['member'])){
			$this->s->redirect('');	
		}
		
		if(isset($_POST['submit'])){
			$check = $this->db->count("SELECT * FROM members WHERE email = :em AND password = :pass", 
					 array(':em' => $_POST['email'], ':pass' => md5($_POST['password'])));	
					 
			if($check != 0){
				$get = $this->db->fetch("SELECT * FROM members WHERE email = :em AND password = :pass", 
						 array(':em' => $_POST['email'], ':pass' => md5($_POST['password'])));	
						 
				$_SESSION[SESS]['member'] = $get[0];
				$this->s->notice('Berhasil login', '');
			} else {
				$this->s->notice('Email atau password salah', 'member/login');	
			}
		}
		
		$this->view('sections/head');
		$this->view('pages/login');
		$this->view('sections/footer');
	}
	
	public function logout(){
		$this->ses->logout();
		$this->s->notice('Berhasil logout', '');	
	}
	
	public function my_account(){
		
		if(!isset($_SESSION[SESS]['member'])){
			$this->s->redirect('');	
		}
		
		if(isset($_POST['submit'])){
			if(!is_numeric($_POST['telepon'])){
				$this->s->notice('Telepon hanya boleh berisi angka', 'member/my_account');	}
			elseif(!is_numeric($_POST['kode_pos'])){
				$this->s->notice('Kode Pos boleh berisi angka', 'member/my_account');	}
			elseif(!is_numeric($_POST['no_rekening'])){
				$this->s->notice('Nomor Rekening hanya boleh berisi angka', 'member/my_account');	}
			elseif($_POST['lokasi'] == 'all'){
				$this->s->notice('Lokasi belum dipilih', 'member/my_account');	}
			elseif(is_uploaded_file($_FILES['foto']['tmp_name']) && $this->s->is_img('foto') == FALSE){
				$this->s->notice('Format foto tidak valid', 'member/my_account');	}
			elseif($this->s->is_email($_POST['email']) == FALSE){
				$this->s->notice('email tidak valid', 'member/my_account');	}
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
				
				$this->member_m->my_account($data, $_POST['id_member']);
				$this->s->notice('Berhasil memperbarui account', 'member/my_account');
			}
		}
		
		$id = $_SESSION[SESS]['member']['id_member'];
		
		$data['lokasi'] = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC");
		$data['data'] = $this->db->fetch("SELECT * FROM members WHERE id_member = :idm", array(':idm' => $id));
		
		$this->view('sections/head');
		$this->view('pages/my_account', $data);
		$this->view('sections/footer');
	}
	
	
	public function barang_sampai($in = ''){
		$check = $this->db->count("SELECT * FROM order_group WHERE invoice_number = :in", array(':in' => $in));	
		if($check != 0){
			$data = "status	= '5'";
			$this->member_m->update_invoice($data, $in);
			$this->s->notice('Barang berhasil sampai', 'invoice/detail/'.$in);
		} else {
			die('404 PAGE NOT FOUND');	
		}
	}
	
}