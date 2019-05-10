<?php

class P {

	public $offset = 0;
	public $page = 1;
	public $limit;
	
	public function setup($limit){
		$this->limit = $limit;
		if(isset($_GET['page'])) $this->page = $_GET['page'];
		if(!empty($this->page)) $this->offset = ($this->page - 1) * $this->limit;
	}
	
	public function setup_links($page, $show){
		if(isset($_GET['q'])){
			$url = "?q=".$_GET['q']."&kat=".$_GET['kategori']."&harga=".$_GET['price']."&page=".$page;	
		}
		elseif(URI1 && !defined('URI2')){
			$url = URI1."/?page=".$page;
		}	
		elseif(URI1 && URI2){
			$url = URI1."/".URI2."/?page=".$page;	
		}
		return "<a href='".SITE."/".$url."'>".$show."</a>";
	}
	
	public function create_links($sql){
		$total = ceil($sql/$this->limit);
		$r = "<div class='pagination'>";
		
		if($this->page != 1 && !empty($this->page)){
			$r .= $this->setup_links($this->page - 1, "&laquo; Pre");
		}
		
		if(($this->page - 2) > 0){
			$start = $this->page - 2;	
		} else {
			$start = 1;
		}	
		
		if(($this->page + 2) < $total){
			$end = $this->page + 2;	
		} else {
			$end = $total;	
		}
		
		for($i=$start; $i<=$end; $i++)
		if($this->page != $i){
			$r .= $this->setup_links($i, $i);	
		} else {
			$r .= "<font class='active'>".$i."</font>";
		}
		
		if($this->page < $total){
			$r .= $this->setup_links($this->page + 1, "Next &raquo;");	
		}
		
		$r .= "</div>";
		return $r;
	}
	
}