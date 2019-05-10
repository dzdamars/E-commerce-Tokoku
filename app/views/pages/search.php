<div class="container">
    <div class="page-title pull-left" style="margin-top:50px;">
    	<h1>Search Result</h1>
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
            <p style="margin:10px 0;"><strike>Rp.<?= number_format($d['harga'],"0",".",".") ?></strike><b style="margin-left:10px;color:#c81423;font-size:16px;"> Rp.<?= number_format($harga,"0",".",".") ?></b></p>
		            <?php
					} else {
					?>
		            <p style="color:#c81423;">Rp.<?= number_format($d['harga'],"0",".",".") ?></p>
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
    <a href="<?= SITE ?>/" class="pull-left btn" style="margin-bottom:40px;">Back to Home</a>
    <?php
	}
	?>
    
	</div>
</div>
</div>