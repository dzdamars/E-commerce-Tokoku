<html>
<title>Tokoku - Situs Jual Beli Online</title>
<link rel="stylesheet" type="text/css" href="<?= SITE ?>/public/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">


<?php
	if(URI1 == 'home'){
		if(!isset($_SESSION[SESS]['member'])){
	?>
	<?php
}
}
?>
<body>

<div id="topbar" class="auto dark-red">
	<div class="container">

		<?php
		if(isset($_SESSION[SESS]['admin'])){
		?>
    	<p class="pull-left">Selamat Datang di Admin <b>Tokoku</b></p>
        <?php
		}
		else {
		?>
		
    	<p class="pull-left" style="color: #fff;margin-right:10px; "> Ikuti Kami </p>
    	
    	<a href="#" >
			<img style="margin-top: 6px;margin-left: 2px;" src="<?= SITE ?>/public/images/ig.png" width="20" />
		</a>
		<a href="#">
			<img style="margin-top: 6px;margin-left: 2px;" src="<?= SITE ?>/public/images/fb.png" width="20" />
		</a>
        <?php
		}
		?>
		
					<ul class="pull-right">
					
					<?php
					if(isset($_SESSION[SESS]['member'])){
					?>
					<li><a href="<?= SITE ?>/help" class="pull-left" style="color: #fff"> 
					<img class="pull-left" style="margin-top: -3px;margin-right: 5px;" src="<?= SITE ?>/public/images/tanya.png" width="20" /> 
					Bantuan </a> </li>

					<div class="dropdown" style="float: right;">
					<li><a href="#" class="pull-left" style="color: #fff"> 
					<img class="pull-left" style="margin-top: -3px;margin-right: 5px;" src="<?= SITE ?>/public/images/user_toko.png" width="20" /> 
					<?= ucwords($_SESSION[SESS]['member']['nama']) ?> 
					</a>
					<div class="dropdown-content">
					  	<a href="<?= SITE ?>/member/my_account" >Akun Saya</a>				    
					  	<a href="<?= SITE ?>/cart/my_cart" >Belanjaan Saya</a>
					  	<a href="<?= SITE ?>/invoice" >Invoice Saya</a>	
				    	<a href="<?= SITE ?>/member/logout" >Keluar</a>	
				  	</div>   </li>
					</div>

					<?php
					}
					elseif(isset($_SESSION[SESS]['admin'])){
					?>
		        	<div class="dropdown" style="float: right;">
					<li><a href="#" class="pull-left" style="color: #fff"> 
					<img class="pull-left" style="margin-top: -3px;margin-right: 5px;" src="<?= SITE ?>/public/images/user_toko.png" width="20" /> 
					<?= ucwords($_SESSION[SESS]['admin']['username']) ?> 
					</a>
					<div class="dropdown-content">
					  	<a href="<?= SITE ?>/admin/logout" >Logout</a>				    	
				  	</div>   </li>
					</div>
		            <?php
					}
					else {
					?>
					<li><a href="<?= SITE ?>/help" class="pull-left" style="color: #fff"> 
					<img class="pull-left" style="margin:-2px 7;" src="<?= SITE ?>/public/images/tanya.png" width="20" /> 
					Bantuan </a> </li>
					<li><a href="<?= SITE ?>/member/login" class="pull-left" style="color: #fff"> Login</a></li>
					<li><a href="<?= SITE ?>/member/sign_up" class="pull-left" style="color: #fff"> Register</a> </li>
					<?php
			}
			?>


			</ul>

	</div>
</div>

<div id="header" class="red auto m">
	<div class="container">
		<?php
		if(isset($_SESSION[SESS]['admin'])){
		?>
    	<a href="<?= SITE ?>/admin" class="pull-left">
	    	<img src="<?= SITE ?>/public/images/toko.png" width="220" />
        </a>
        <?php
		} else {
		?>
	<a href="<?= SITE ?>">
		<img src="<?= SITE ?>/public/images/toko.png" class="logo" width="220" >
	</a>
<?php
		}
		?>
	<div class="pull-right">
	
<?php
		if(isset($_SESSION[SESS]['member'])){
			if(!isset($_SESSION[SESS]['member']['cart'])){
				$cart = 0;
			} else {
				$cart = count($_SESSION[SESS]['member']['cart']);
			}
		?>
        <a href="<?= SITE ?>/cart/my_cart">
		<img src="<?= SITE ?>/public/images/cart.png" width="40" class="pull-right cart" style="margin: 22px 65px;" />
		</a>
		<b class="b-item" style="margin: 34px -157px;color: #fff;float: right;"><?= $cart ?> Items</b>
        <?php
		}elseif(isset($_SESSION[SESS]['admin'])){
		?>
		<img src="<?= SITE ?>/public/images/cart.png" style="display: none;" width="40" class="pull-right" style="margin: 16px 65px;" />
		<?php
		}else {
		?>
		<a href="<?= SITE ?>/cart/cart_empty">
		<img src="<?= SITE ?>/public/images/cart.png" width="40" class="pull-right cart_empty cart_cart"  />
		</a>
		<?php
		}
		?>

		
	

		</div>
	<ul class="pull-right">
<?php

	if(URI1 == 'home'){
		$c = 'home';		
	} else {
		$c = '';	
	}
	
	if(isset($_GET['q'])){
		$q = $_GET['q'];
	} else {
		$q = '';	
	}
	
	if(!isset($_SESSION[SESS]['admin'])){

?>
<?php
	$kategori = $this->db->fetch("SELECT * FROM kategori ORDER BY kategori ASC LIMIT 9");
?>  
    </ul>
        	<div id="search pull-left">
    	<form action="<?= SITE ?>/search/" method="get">
        	<input type="text" name="q" class="searchTerm form-control search1" placeholder="Cari Di Tokoku?" value="<?= $q ?>" />
    		<button type="submit" class="searchButton button_sc">
        	<img src="<?= SITE ?>/public/images/search.png" align="center" style="margin-right: 5px;">
    	</button>
        </form>
        <div class="kate">
                	<?php
					foreach($kategori as $li){
						if(strlen($li['kategori']) > 40){
							$show = substr($li['kategori'],0,40)."...";
						} else {
							$show = $li['kategori'];
						}
						echo "<a style='margin-right: 10px;' href='".SITE."/kategori/".$li['id_kategori']."'>".ucwords($show)."</a>";	
					}
					?>
    	</div>
        </div>
<?php
	}
	?>
    <ul class="pull-right">
    		<?php
			if(!isset($_SESSION[SESS]['admin'])){
			?>
            <?php
			}
			else {
			?>
        	<li><a href="<?= SITE ?>/admin/items">ITEMS</a></li>
        	<li><a href="<?= SITE ?>/admin/members">MEMBERS</a></li>
        	<li><a href="<?= SITE ?>/admin/menu">MENU</a></li>
        	<li><a href="<?= SITE ?>/admin/kategori">KATEGORI</a></li>
        	<li><a href="<?= SITE ?>/admin/lokasi">LOKASI</a></li>
        	<li><a href="<?= SITE ?>/admin/invoice">INVOICE</a></li>
            <?php	
			}
			?>

	</ul>

	</div>

	</div>
</div>
