<div class="container">
<div class="listing">
	<div class="page-title auto">
		<div class="pull-left">
			<h1 style="margin-top:50px;">My Cart</h1>
			<p><?= $total ?> Dalam keranjang</p>
		</div>
	</div>
</div>

<?php
if($total != 0){
?>

<form action="<?= SITE ?>/cart/action" method="post">
<table class="list m" border="0" cellspacing="1">
<thead class="red">
	<th>No</th>
	<th>Product Name</th>
	<th>Harga</th>
	<th>QTY</th>
	<th>TOTAL</th>
	<th>Action</th>
</thead>
<?php
			$no = 1;
			$subtotal = '';
			foreach($data as $d){
				$diskon = $d['harga'] * $d['diskon']/ 100;
				$harga = $d['harga'] - $diskon;
				$qty = $_SESSION[SESS]['member']['cart'][$d['id_item']]['qty'];
				$total = $harga * $qty;
				$subtotal += $total;
			?>
<tr>
	<td><?= $no ?></td>
	<td><img class="pull-left" src="<?= SITE ?>/public/images/items/<?= $d['foto'] ?>" width="80">
	<p class="pull-left" style="margin: 32px 0;"><?= ucwords($d['nama_item']) ?></p></td>
	<td>Rp.<?= number_format($harga,"0",".",".") ?></td>
	<td><input type="number" name="qty[<?= $d['id_item'] ?>]" class="form-control-qty" value="<?= $qty ?>" max="<?= $d['qty'] ?>"/></td>
	<td>Rp.<?= number_format($total,"0",".",".") ?></td>
	<td>
		<a href="<?= SITE ?>/cart/delete/<?= $d['id_item'] ?>">DELETE</a>
	</td>
</tr>

	 <?php
				$no++;
			}
			?>
	<tr style="background:#fff">
		
	<td colspan="4" style="text-align:right; padding-right:20px;"><b>Total Bayar</b></td>
	<td>Rp.<?= number_format($subtotal,"0",".",".") ?></td>
	<td><a href="<?= SITE ?>/cart/empty_cart" class="btn pull-left" style="color:#fff;">Empty Cart</a></td>
	</tr>
</table>
<div style="border-top:1px solid #ccc; padding-top:20px; margin-top:20px;">
<input type="hidden" name="total_bayar" value="<?= $subtotal ?>" />
<a href="<?= SITE ?>" class="btn pull-left" style="margin-bottom:22%;;">Back to Home</a>
<button type="submit" name="submit" value="checkout" class="btn pull-right" style="margin-bottom:20px;">Checkout</button>
<button type="submit" name="submit" value="update" class="btn pull-right">Update</button>

</form>

</div>

</div>

 <?php
} else {
?>
<a href="<?= SITE ?>" class="btn pull-left" style="margin-bottom:22%;;">Back to Home</a>
<?php
}
?>
</div>