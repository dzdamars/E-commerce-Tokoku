<?php
	 $latest_items = $this->db->fetch("SELECT * FROM items ORDER BY id_item DESC LIMIT 7");
	 $kategori = $this->db->fetch("SELECT * FROM kategori ORDER BY kategori ASC LIMIT 7");
	 $lokasi = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC LIMIT 7");
	 $main_menu = $this->db->fetch("SELECT * FROM menu WHERE status = 1 ORDER BY judul_menu ASC LIMIT 5");
	 $sub_menu = $this->db->fetch("SELECT * FROM menu WHERE status = 2 ORDER BY judul_menu ASC LIMIT 7");
?>  
 <div class="container">
<div class="sitemap wrapper pull-left m">
    
    	<div class="page-title" style="margin-top:50px;">
        	<h1 style="margin-top:50px;">Sitemap</h1>
            <p>Beberapa link dalam website ini</p>
        </div>
    
    	
    	<div class="f_section">
            <b>Latest Items</b>
            <ul>
                <li>
                	<?php
					foreach($latest_items as $li){
						if(strlen($li['nama_item']) > 40){
							$show = substr($li['nama_item'],0,40)."...";
						} else {
							$show = $li['nama_item'];
						}
						echo "<a href='".SITE."/item/".$li['id_item']."'>".ucwords($show)."</a>";	
					}
					?>
                </li>
            </ul>
        </div>
    	<div class="f_section">
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
    	<div class="f_section">
            <b>Lokasi</b>
            <ul>
                <li>
                	<?php
					foreach($lokasi as $l){
						echo "<a href='".SITE."/search/?q=&kat=all&lok=".$l['id_lokasi']."&harga=all'>".ucwords($l['lokasi'])."</a>";
					}
					?>
                </li>
            </ul>
        </div>
    	<div class="f_section">
            <b>Main Menu</b>
            <ul>
                <li>
                    <a href="<?= SITE ?>">Home</a>
                    <?php
					foreach($main_menu as $mm){
						echo "<a href='".SITE."/h/".strtolower($mm['judul_menu'])."'>".ucwords($mm['judul_menu'])."</a>";
					}
					?>
                    <a href="<?= SITE ?>/h/sitemap">Sitemap</a>
                </li>
            </ul>
        </div>
    	<div class="f_section">
            <b>Sub Menu</b>
            <ul>
                <li>
                    <?php
					foreach($sub_menu as $sm){
						echo "<a href='".SITE."/h/".strtolower($sm['judul_menu'])."'>".ucwords($sm['judul_menu'])."</a>";
					}
					?>
                </li>
            </ul>
        </div>
        
    </div>
    
</div>
</div>