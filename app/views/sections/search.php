<?php

	if(URI1 == 'home'){
		$c = 'home';		
	} else {
		$c = '';	
	}
	
	$kategori = $this->db->fetch("SELECT * FROM kategori ORDER BY kategori ASC");
	$lokasi = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC");
	
	if(isset($_GET['q'])){
		$q = $_GET['q'];
	} else {
		$q = '';	
	}
	
	if(!isset($_SESSION[SESS]['admin'])){

?>
<div class="container">
<div class="<?= $c ?>">
    <div id="search">
    	<form action="<?= SITE ?>/search/" method="get">
        	<input type="text" name="q" class="form-control" placeholder="Cari sesuatu disini" value="<?= $q ?>" />
            <select name="kat" class="form-control">
            	<option value="all">Pilih Kategori</option>
                <?php
				foreach($kategori as $k){
					echo "<option value='".$k['id_kategori']."'>".ucwords($k['kategori'])."</option>";
				}
				?>
            </select>
            <select name="lok" class="form-control">
            	<option value="all">Pilih Lokasi</option>
                <?php
				foreach($lokasi as $l){
					echo "<option value='".$l['id_lokasi']."'>".ucwords($l['lokasi'])."</option>";
				}
				?>
            </select>
            <select name="harga" class="form-control">
            	<option value="all">Pilih Harga</option>
            	<option value="1">Dibawah Rp.1.000.000</option>
            	<option value="2">Rp.1.000.000 - Rp.2.000.000</option>
            </select>
            <button type="submit" class="btn pull-right">CARI</button>
        </form>
    </div>
    </div>
  </div>
    <?php
	}
	?>