<div class="container">
<div class="listing">
	<div class="page-title auto">
		<div class="pull-left">
			<h1>Invoice Number #<?= $data[0]['invoice_number'] ?></h1>
			<p><?= $total ?> Barang dalam invoice</p>
		</div>
		<?php
			if(isset($_SESSION[SESS]['admin'])){
				if($data[0]['status'] != 0){
				?>
				<a style="margin-left:10px;" href="<?= SITE ?>/public/images/invoice/<?= $data[0]['bp'] ?>" class="pull-right btn">Lihat Bukti Pembayaran</a>
				<?php
				}
				if($data[0]['status'] == 1){
				?>
				<a style="margin-left:10px;" href="<?= SITE ?>/admin/reject_invoice/<?= $data[0]['invoice_number'] ?>" class="pull-right btn">Tolak Bukti Pembayaran</a>
				<?php	
				}
				if($data[0]['status'] !=0 && $data[0]['status'] != 3){		
				?>
				<a href="<?= SITE ?>/admin/confirm_invoice/<?= $data[0]['invoice_number'] ?>" class="pull-right btn">Konfirmasi Pembayaran</a>
				<?php	
				}
				if($data[0]['status'] == 2 ){
				?>
				<a style="margin-left: 10px;" href="<?= SITE ?>/admin/kirim_resi/<?= $data[0]['invoice_number'] ?>" class="btn pull-right">Kirim Resi</a>
				<?php
				} 
			}
			?>
	</div>
</div>

<?php
		if($total != 0){
			$member = $this->db->fetch("SELECT * FROM members WHERE id_member = :idm", array(':idm' => $data[0]['id_member']));
			
			if($data[0]['status'] == 0){
				$status = 'Belum Melakukan Pembayaran';	}
			elseif($data[0]['status'] == 1){
				$status = 'Menunggu Konfirmasi';	}
			elseif($data[0]['status'] == 2){
				$status = 'Lunas';	}
			elseif($data[0]['status'] == 3){
				$status = 'Bukti Pembayaran Ditolak';	}
			elseif($data[0]['status'] == 4){
				$status = 'Barang Sedang Dikirim';	}		
			elseif($data[0]['status'] == 5){
				$status = 'Barang Sudah Diterima';	}		
		?>

<table border="0" class="m" cellspacing="1" class="pull-left">
<tr>
	<td width="150"><b>Nama Pembeli</b></td>
	<td>: <?= ucwords($member[0]['nama']) ?></td>
</tr>
<tr>
	<td width="150"><b>Status Pembayaran</b></td>
	<td>: <?= ucwords($status) ?></td>
</tr>
<!-- <tr>
	<td width="150"><b>Nomor Resi</b></td>
	<td>:<?= $data[0]['resi'] ?></td>
</tr> -->
<tr>
	<td width="150"><b>Alamat</b></td>
	<td style="width: 350px;float: left;">: <?= $member[0]['alamat'] ?></td>
</tr>
</table>

<?php
		if(isset($_SESSION[SESS]['member'])){
			if($data[0]['status'] == 0){
		?>
        <i class="pull-right" style="margin-top:-105px; text-align:right"></i>
        <?php
			}
			elseif($data[0]['status'] == 2){
		?>
        <i class="pull-right" style="margin-top:-105px; text-align:right">Proses pembayaran telah lunas <br/> Barang akan tiba selama <b>1 - 2 Hari Kedepan</b></i>
        <?php
			}
			elseif($data[0]['status'] == 3){
		?>
        <i class="pull-right" style="margin-top:-105px; text-align:right"><b>Bukti pembayaran anda ditolak</b>, mungkin terjadi kesalahan saat transfer<br/> Silahkan <b>mengupload ulang</b> bukti pembayaran, jika transfer berhasil dilakukan</i>
        <?php
			}
		}
		?>



<table class="list m" cellspacing="1" class="pull-left">
<thead class="red">
	<th>No</th>
	<th>Product Name</th>
	<th>Harga</th>
	<th>QTY</th>
	<th>Total</th>
</thead>
<?php
			$no = 1;
			$subtotal = '';
			foreach($data as $d){
				$diskon = $d['harga'] * $d['diskon']/ 100;
				$harga = $d['harga'] - $diskon;
				$subtotal += $total;
			?>
<tr>
	<td><?= $no ?></td>
	<td><img class="pull-left" src="<?= SITE ?>/public/images/items/<?= $d['foto'] ?>" width="80"height="80">
	<p class="pull-left" style="margin: 32px 0;"><?= ucwords($d['nama_item']) ?></p></td>
	<td>Rp.<?= number_format($harga,"0",".",".") ?></td>
	<td><?= $d['qty'] ?></td>
	<td>Rp.<?= number_format($d['total_harga'],"0",".",".") ?></td>
</tr>
<?php
				$no++;
			}
			?>
	<tr style="background:#fff">
		
	<td colspan="4" style="text-align:right; padding-right:20px;"><b>Total Bayar</b></td>
	<td>Rp.<?= number_format($d['total_bayar'],"0",".",".") ?></td>
	</tr>
</table>

<?php
		if(isset($_SESSION[SESS]['member'])){
		if($data[0]['status'] == 0 || $data[0]['status'] == 3){
		?>


<div style="border-top:1px solid #ccc; padding-top:20px; margin-top:20px;">

	<!-- <b>Upload Bukti Pembayaran</b><br><br>
	<input type="file" name="foto" required>
	<br><br><br> -->
	<input type="hidden" name="in" value="<?= $data[0]['invoice_number'] ?>" />
	<a href="<?= SITE ?>/method/<?= $d['invoice_number'] ?>" class="btn pull-right" name="submit">Pilih Metode Pembayaran</a>

</div>

</div>

<!-- </form> -->
<!-- <a href="<?= SITE ?>/cart/batalkan_pesanan" class="btn pull-left">Batalkan Pesanan</a> -->
<?php
		}
		}
		?>
        <div style="width:100%; height:284px;" class="pull-left"></div>
        <?php
		} else {
		?>
        <a href="<?= SITE ?>" class="btn btn-large pull-left" style="margin-bottom:55px;">Back to Home</a>
        <?php
		}
		?>
</div>