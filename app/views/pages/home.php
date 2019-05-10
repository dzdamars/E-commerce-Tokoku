<div class="plus4">
	<div class="container">
		<div class="section">

		<h1 style="margin-top: 50px;">New Item</h1>

<?php
		foreach($items as $ni){
			
			$nama_item = $ni['nama_item'];
			if(strlen($nama_item) > 25){
				$ni_item = substr($nama_item,0, 25)."...";	
			} else {
				$ni_item = $nama_item;	
			}
			
			$diskon = $ni['harga'] * $ni['diskon'] / 100;
			$harga = $ni['harga'] - $diskon;
			
?>	

			<div class="item">
				<div class="thumbnail">
					<?php
				if($ni['diskon'] != 0){
					echo "<div class='label'>".$ni['diskon']."%</div>";
				}
				?>
				<a href="<?= SITE ?>/item/<?= $ni['id_item'] ?>">
					<img src="<?= SITE ?>/public/images/items/<?= $ni['foto'] ?>">
				</a>
				</div>


				<a href="<?= SITE ?>/item/<?= $ni['id_item'] ?>">
					<b class="nama_item"><?= ucwords($ni_item) ?></b>
				</a>

				<?php
					if($ni['diskon'] != 0){
					?>
		            <p style="margin:10px 0;"><strike>Rp.<?= number_format($ni['harga'],"0",".",".") ?></strike><b class="harga"> Rp.<?= number_format($harga,"0",".",".") ?></b></p>
		            <?php
					} else {
					?>
		            <p style="color:#c81423;">Rp.<?= number_format($ni['harga'],"0",".",".") ?></p>
		            <?php
					}
					?>
					<!-- <b style="margin-top:10px;"><?= $ni['lokasi'] ?></b> -->

				<a href="<?= SITE ?>/cart/add/<?= $ni['id_item'] ?>" class="btn pull-left">Beli Sekarang</a>
			</div>
<?php
}
?>
		</div>
	</div>
</div>

<div class="plus4">
	<div class="container">
		<div class="section">

		<h1>Best Items</h1>
<?php
		foreach($best_items as $ni){
			
			$nama_item = $ni['nama_item'];
			if(strlen($nama_item) > 25){
				$ni_item = substr($nama_item,0, 25)."...";	
			} else {
				$ni_item = $nama_item;	
			}
			
			$diskon = $ni['harga'] * $ni['diskon'] / 100;
			$harga = $ni['harga'] - $diskon;
			
?>	
			<div class="item">
				<div class="thumbnail">
					<?php
				if($ni['diskon'] != 0){
					echo "<div class='label'>".$ni['diskon']."%</div>";
				}
				?>
				<a href="<?= SITE ?>/item/<?= $ni['id_item'] ?>">
					<img src="<?= SITE ?>/public/images/items/<?= $ni['foto'] ?>" width="206" height="190">
				</a>

				</div>
				
				<a href="<?= SITE ?>/item/<?= $ni['id_item'] ?>">
					<b class="nama_item"><?= ucwords($ni_item) ?></b>
				</a>

				<?php
					if($ni['diskon'] != 0){
					?>
		            <p style="margin:10px 0;"><strike>Rp.<?= number_format($ni['harga'],"0",".",".") ?></strike><b class="harga"> Rp.<?= number_format($harga,"0",".",".") ?></b></p>
		            <?php
					} else {
					?>
		            <p style="color:#c81423;">Rp.<?= number_format($ni['harga'],"0",".",".") ?></p>
		            <?php
					}
					?>
					<!-- <b style="margin-top:10px;"><?= $ni['lokasi'] ?></b> -->

				<a href="<?= SITE ?>/cart/add/<?= $ni['id_item'] ?>" class="btn pull-left">Beli Sekarang</a>
			</div>
			<?php
		}
		?>
		</div>
	</div>
</div>
<div class="plus4">
	<div class="container">
		<div class="section">

		<h1>Promo Items</h1>
<?php
		foreach($promo_items as $ni){
			
			$nama_item = $ni['nama_item'];
			if(strlen($nama_item) > 25){
				$ni_item = substr($nama_item,0, 25)."...";	
			} else {
				$ni_item = $nama_item;	
			}
			
			$diskon = $ni['harga'] * $ni['diskon'] / 100;
			$harga = $ni['harga'] - $diskon;
			
?>	
			<div class="item">
				<div class="thumbnail">
					<?php
				if($ni['diskon'] != 0){
					echo "<div class='label'>".$ni['diskon']."%</div>";
				}
				?>
				<a href="<?= SITE ?>/item/<?= $ni['id_item'] ?>">
					<img src="<?= SITE ?>/public/images/items/<?= $ni['foto'] ?>" width="206" height="190">
				</a>

				</div>

				<a href="<?= SITE ?>/item/<?= $ni['id_item'] ?>">
					<b class="nama_item"><?= ucwords($ni_item) ?></b>
				</a>

				<?php
					if($ni['diskon'] != 0){
					?>
		            <p style="margin:10px 0;"><strike>Rp.<?= number_format($ni['harga'],"0",".",".") ?></strike><b class="harga"> Rp.<?= number_format($harga,"0",".",".") ?></b></p>
		            <?php
					} else {
					?>
		            <p style="color:#c81423;">Rp.<?= number_format($ni['harga'],"0",".",".") ?></p>
		            <?php
					}
					?>
					<!-- <b style="margin-top:10px;"><?= $ni['lokasi'] ?></b> -->

				<a href="<?= SITE ?>/cart/add/<?= $ni['id_item'] ?>" class="btn pull-left">Beli Sekarang</a>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>
<div class="plus4">
	<div class="container">
		<div class="section">

		<h1>High Price Items</h1>
<?php
		foreach($highprice_items as $ni){
			
			$nama_item = $ni['nama_item'];
			if(strlen($nama_item) > 25){
				$ni_item = substr($nama_item,0, 25)."...";	
			} else {
				$ni_item = $nama_item;	
			}
			
			$diskon = $ni['harga'] * $ni['diskon'] / 100;
			$harga = $ni['harga'] - $diskon;
			
?>	
			<div class="item">
				<div class="thumbnail">
					<?php
				if($ni['diskon'] != 0){
					echo "<div class='label'>".$ni['diskon']."%</div>";
				}
				?>
				<a href="<?= SITE ?>/item/<?= $ni['id_item'] ?>">
					<img src="<?= SITE ?>/public/images/items/<?= $ni['foto'] ?>" width="206" height="190">
				</a>

				</div>

				<a href="<?= SITE ?>/item/<?= $ni['id_item'] ?>">
					<b class="nama_item"><?= ucwords($ni_item) ?></b>
				</a>

				<?php
					if($ni['diskon'] != 0){
					?>
		            <p style="margin:10px 0;"><strike>Rp.<?= number_format($ni['harga'],"0",".",".") ?></strike><b class="harga"> Rp.<?= number_format($harga,"0",".",".") ?></b></p>
		            <?php
					} else {
					?>
		            <p style="color:#c81423;">Rp.<?= number_format($ni['harga'],"0",".",".") ?></p>
		            <?php
					}
					?>
					<!-- <b style="margin-top:10px;"><?= $ni['lokasi'] ?></b> -->

				<a href="<?= SITE ?>/cart/add/<?= $ni['id_item'] ?>" class="btn pull-left">Beli Sekarang</a>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>


</body>
</html>