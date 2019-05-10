<?php

class S {

	public function alert($alert){
		echo "<script>alert('".$alert."')</script>";	
	}
	
	public function redirect($redirect){
		echo "<script>window.location='".SITE."/".$redirect."'</script>";	
	}
	
	public function notice($a, $b){
		$this->alert($a);	
		$this->redirect($b);
	}
	
	public function is_img($img){
		if($_FILES[$img]['type'] == 'image/jpg' || $_FILES[$img]['type'] == 'image/jpeg' || $_FILES[$img]['type'] == 'image/gif' || $_FILES[$img]['type'] == 'image/png'){
			return TRUE;		
		} else {
			return FALSE;	
		}
	}
	
	public function is_email($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return TRUE;	
		} else {
			return FALSE;	
		}
	}
	
	public function is_less($form){
		if(strlen($form) < 4){
			return FALSE;	
		} else {
			return TRUE;	
		}
	}
	
	public function is_text($name) {
		if(preg_match('/^[a-zA-Z ]+$/i', $name)){
			return TRUE;
		} 
		else {
			return FALSE;	
		}
	}
		
}