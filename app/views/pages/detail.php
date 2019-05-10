<div class="container">
		<div class="item">
				<div class="thumbnail">
				
					<img src="<?= SITE ?>/public/images/items/<?= $data[0]['foto'] ?>" width="206" height="170">

				</div>

		<h1>Deskripsi Barang :</h1>
		<p> <?= ucwords($data[0]['deskripsi']) ?></p>


		</div>

		
		<div class="label-nama pull-left">
			<h1><?= ucwords($data[0]['nama_item']) ?></h1>
			<?php
				
				$diskon = $data[0]['harga'] * $data[0]['diskon'] / 100;
				$harga = $data[0]['harga'] - $diskon;
				
				if($data[0]['diskon'] != 0){
				?>
					<p>Rp.<?= number_format($data[0]['harga'],"0",".",".") ?></p>
                <?php
				} else {
				?>
                <p><strike>Rp.<?= number_format($data[0]['harga'],"0",".",".") ?></strike> &nbsp; 
                		   Rp.<?= number_format($harga,"0",".",".") ?></p>
                <?php
				}
				?>

			 <table cellpadding="10" class="m">
                	<tr>
                    	<td width="100"><b>Merk</b></td>
                    	<td> : <?= ucwords($data[0]['merk']) ?></td>
                    </tr>
                	<tr>
                    	<td><b>Kategori</b></td>
                    	<td> : <?= ucwords($data[0]['kategori']) ?></td>
                    </tr>
                	<tr>
                    	<td><b>Lokasi</b></td>
                    	<td> : <?= ucwords($data[0]['lokasi']) ?></td>
                    </tr>
                    <?php
					if($data[0]['diskon'] != 0){
					?>
                	<tr>
                    	<td><b>Diskon</b></td>
                    	<td> : <?= $data[0]['diskon'] ?>%</td>
                    </tr>
                    <tr>
                    	<td><b>Stock</b></td>
                    	<td> : <?= ucwords($data[0]['qty']) ?> Barang</td>
                    </tr>
                    <?php
					}
					?>
                </table>
                <a href="<?= SITE ?>/cart/add/<?= $data[0]['id_item'] ?>" style="margin-bottom:150px;" class="btn pull-left">Beli Sekarang</a>

<?php 
$title = ucwords($data[0]['nama_item']); 
$summary =ucwords($data[0]['deskripsi']); 
$image='http://localhost/Tokoku/public/images/items/'; 
$url = "http://localhost/Tokoku/"; 
?>
<a id="button" class="pull-left" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;amp;&amp;p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=550,height=400');" target="_parent" href="javascript: void(0)"> <img src="<?= SITE ?>/public/images/fb (2).png" width="30" /></a>
		</div>

<img src="<?= SITE ?>/public/images/side-banner..png" class="pull-right" width="260" height="250">

</div>


</body>


