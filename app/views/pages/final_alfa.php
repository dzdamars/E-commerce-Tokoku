<div class="container">
		<div class="page-title">
        	<h1 style="margin-top: 50px;" > Pembayaran Via Alfamart</h1>
        </div>
 <div class="page-title-wb auto">
			<p style="text-align: center;margin-bottom: 40px;">Batas Pembayaran: <b id="timer" style="font-size: 17px;"></b></p>
			<p style="text-align: center;">Jumlah Tagihan:</p>
			<h1 style="text-align: center;font-size: 21px;">Rp.<?= number_format($data[0]['total_bayar'],"0",".",".") ?></h1>
			<p style="text-align: center;">Nomor Tagihan:</p>
			<h1 style="text-align: center;color: #c81423;font-size: 21px;margin-bottom: 60px;">#<?= $data[0]['invoice_number'] ?></h1>
			<div class="center-alfa">
			<img class="pull-left " src="<?= SITE ?>/public/images/alfamart.png" width="100">
			<img class="pull-left " src="<?= SITE ?>/public/images/alfamidi.png" width="100">	
			</div>
			<script>
				var countDownDate = new Date("Oct 15, 2018 13:37:25").getTime();

				var x = setInterval(function() {
				    var now = new Date().getTime();
				    var distance = countDownDate - now;
				    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				    document.getElementById("timer").innerHTML = hours + " Jam "
				    + minutes + " Menit " + seconds + " Detik ";
				    if (distance < 0) {
				        clearInterval(x);
				        document.getElementById("demo").innerHTML = "EXPIRED";
				    }
				}, 1000);
			</script>
			
</div>
<p style="font-size: 15px;margin-bottom: 20px;">Petunjuk pembayaran melalui Alfamart, Alfamidi</p>
<div class="petunjuk">
		<div class="f-section">
					<ul>
						<li>
								<p style="color: #333;">1. Transfer dapat melalui ATM, SMS / M-Banking, dan E-Banking.</p>
						</li>
					</ul>
		</div>

		<div class="f-section">
					<ul>
						<li>
								<p style="color: #333;">2. Masukkan nomor rekening Tokoku.</p>
						</li>
					</ul>
		</div>
		<div class="f-section">
					<ul>
						<li>
								<p style="color: #333;">3. Masukkan jumlah bayarnya hingga 3 digit terakhir.</p>
						</li>
					</ul>
		</div>
		<div class="f-section">
					<ul>
						<li>
								<p style="color: #333;">4. Simpan bukti transfer yang kamu dapatkan.</p>
						</li>
					</ul>
		</div>
		<div class="f-section">
					<ul>
						<li>
								<p style="color: #333;">5. Menunggu admin mengkonfirmasi dan datangnya barang.</p>
						</li>
					</ul>
		</div>
</div>

<p style="font-size:15px;text-align: center; margin-bottom: 30px;">Pembelianmu dicatat dengan nomor tagihan pembayaran <b style="font-size: 15px; color:#c81423; ">#<?= $data[0]['invoice_number'] ?></b>. Tokoku akan melakukan verifikasi otomatis paling lama 30 menit setelah kamu melakukan pembayaran. Jika kamu menghadapi kendala mengenai pembayaran, silakan langsung klik <a href="#" style="color: #c81423;font-size: 15px;">Bantuan.</a>
</p>

<div class="pp">
<a href="<?= SITE ?>/invoice/invoice_detail/<?= $data[0]['invoice_number'] ?>" class="btn pull-left">Lihat Tagihan Pembayaran</a>
</div>
</div>
