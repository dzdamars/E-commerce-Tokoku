<?php
	$kategori = $this->db->fetch("SELECT * FROM kategori WHERE id_kategori = :idk", array(':idk' => URI2));
?>
	<div class="container">
    <div class="page-title pull-left">
    	<h1 style="margin-top: 50px;">Kategori <?= ucwords($kategori[0]['kategori']) ?></h1>
        <p><?= $total ?> Items ditemukan</p>
    </div>
    
    <?php
	if($total != 0){
	?>
    
    <div class="plus5">
    
    <div class="section">
        <?php
		foreach($data as $d){
			
			$nama_item = $d['nama_item'];
			if(strlen($nama_item) > 25){
				$d_item = substr($nama_item,0, 25)."...";	
			} else {
				$d_item = $nama_item;	
			}
			
			$diskon = $d['harga'] * $d['diskon'] / 100;
			$harga = $d['harga'] - $diskon;
			
		?>
        <div class="item">
        	<div class="thumbnail">
            	<?php
				if($d['diskon'] != 0){
					echo "<div class='label'>".$d['diskon']."%</div>";
				}
				?>
            	<a href="<?= SITE ?>/item/<?= $d['id_item'] ?>">
	            	<img src="<?= SITE ?>/public/images/items/<?= $d['foto'] ?>" width="206" height="170" />
                </a>
            </div>
            <a href="<?= SITE ?>/item/<?= $d['id_item'] ?>">
            	<b><?= ucwords($d_item) ?></b>
            </a>
            <?php
			if($d['diskon'] != 0){
			?>
            <p><strike>Rp.<?= number_format($d['harga'],"0",".",".") ?></strike> Rp.<?= number_format($harga,"0",".",".") ?></p>
            <?php
			} else {
			?>
            <p>Rp.<?= number_format($d['harga'],"0",".",".") ?></p>
            <?php
			}
			?>
            <a href="<?= SITE ?>/cart/add/<?= $d['id_item'] ?>" class="btn pull-left">Beli Sekarang</a>
        </div>
        <?php
		}
		echo $pagination;
		?>
    </div>

    <?php
	} else {
	?>
    <a href="<?= SITE ?>/" class="pull-left btn btn-large" style="margin-bottom:40px;">Back to Home</a>
    <div style="width:100%; height:125px;" class="pull-left"></div>
    <?php
	}
	?>
    
	</div>
</div>
</div>