 <?php
 if(URI1 == 'home'){
	 if(!isset($_SESSION[SESS]['member'])){
 ?>
 <div class="container">
    	<a href="<?= SITE ?>/member/login">
			<img src="<?= SITE ?>/public/images/banner2.png" class="m banner_footer"/>
        </a>
 </div>
 <?php
	 }
 }
 
 if(URI1 != 'admin'){
 if(!isset($_SESSION[SESS]['admin'])){
	 
	 $latest_items = $this->db->fetch("SELECT * FROM items ORDER BY id_item DESC LIMIT 4");
	 $kategori = $this->db->fetch("SELECT * FROM kategori ORDER BY kategori ASC LIMIT 4");
	 $lokasi = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC LIMIT 4");
	 $main_menu = $this->db->fetch("SELECT * FROM menu WHERE status = 1 ORDER BY judul_menu ASC LIMIT 2");
	 $sub_menu = $this->db->fetch("SELECT * FROM menu WHERE status = 2 ORDER BY judul_menu ASC LIMIT 4");
 
 ?>
<div id="semi-footer" class="auto">
	<div class="container">
		<div class="f-section">


		<b>Latest Item</b>
			<ul>
				
				<li>

					<?php
					foreach($latest_items as $li){
						if(strlen($li['nama_item']) > 20){
							$show = substr($li['nama_item'],0,20)."...";
						} else {
							$show = $li['nama_item'];
						}
						echo "<a href='".SITE."/item/".$li['id_item']."'>".ucwords($show)."</a>";	
					}
					?>



				</li>


			</ul>

		</div>

		<div class="f-section">


		<b>Kategori</b>
			<ul>
				
				<li>

					<?php
					foreach($kategori as $k){
						echo "<a href='".SITE."/kategori/".$k['id_kategori']."'>".ucwords($k['kategori'])."</a>";	
					}
					?>



				</li>


			</ul>

		</div>

		<div class="f-section">


		<b>Main Menu</b>
			<ul>
				
				<li>

					<a href="<?= SITE ?>">Home</a>
                    <?php
					foreach($main_menu as $mm){
						echo "<a href='".SITE."/menu_atas/".strtolower($mm['judul_menu'])."'>".ucwords($mm['judul_menu'])."</a>";
					}
					?>
                    <a href="<?= SITE ?>/menu_atas/sitemap">Sitemap</a>



				</li>


			</ul>

		</div>

		<div class="f-section">


		<b>Sub Menu</b>
			<ul>
				
				<li>

					<?php
					foreach($sub_menu as $sm){
						echo "<a href='".SITE."/menu_atas/".strtolower($sm['judul_menu'])."'>".ucwords($sm['judul_menu'])."</a>";
					}
					?>



				</li>


			</ul>

		</div>
		<div class="f-section">


		<b>Bantuan</b>
			<ul>
				
				<li>

					<a href="<?= SITE ?>/help" class="pull-left" style="color: #fff"> 
					Help </a> 



				</li>


			</ul>

		</div>
	</div>
</div>
<?php
 }
 } else {
?>
	<div style="height:12px; width:100%;" class="pull-left"></div>
<?php 
 }	
?>

<div id="footer" class="auto">
<div class="container">

<p class="pull-left">&copy; Tokoku - Dzumaratin Damar Sasongko</p>

<a href="#" class="btn pull-right">Back To top</a>


</div>
</div>
