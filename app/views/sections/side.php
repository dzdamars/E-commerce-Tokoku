<?php
if(URI1 != 'admin'){
	$kategori = $this->db->fetch("SELECT * FROM kategori ORDER BY kategori ASC LIMIT 6");
?>
	<div class="the_side">
		<div class="side pull-right">
        	<div class="sd red">
            	<div class="sd-head dark-red">
                	<b>Kategori</b>
                </div>
                <div class="sd-content">
                	<ul>
                    	<?php
						foreach($kategori as $k){
							echo "<li><a href='".SITE."/kategori/".$k['id_kategori']."'>".ucwords($k['kategori'])."</a></li>";
						}
						?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
	
	$s1 = $this->db->count("SELECT * FROM items");
	$s2 = $this->db->count("SELECT * FROM members");
	$s3 = $this->db->count("SELECT * FROM menu");
	$s4 = $this->db->count("SELECT * FROM kategori");
	$s5 = $this->db->count("SELECT * FROM lokasi");
	$s6 = $this->db->count("SELECT * FROM order_group");
	
?>
    <div class="container">
	<div class="side_kate">
		<div class="admin side pull-right">
        	<div class="sd red">
            	<div class="sd-head dark-red">
                	<b>Statistic</b>
                </div>
                <div class="sd-content">
                	<ul>
                    	<li>
                        	<b>Items</b>
                            <p><?= $s1 ?> Items</p>
                        </li>
                    	<li>
                        	<b>Members</b>
                            <p><?= $s2 ?> Members</p>
                        </li>
                    	<li>
                        	<b>Menu</b>
                            <p><?= $s3 ?> Menu</p>
                        </li>
                    	<li>
                        	<b>Kategori</b>
                            <p><?= $s4 ?> Kategori</p>
                        </li>
                    	<li>
                        	<b>Lokasi</b>
                            <p><?= $s5 ?> Lokasi</p>
                        </li>
                    	<li>
                        	<b>Invoice</b>
                            <p><?= $s6 ?> Invoice</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
       </div>
       </div>
<?php	
}