<div class="container">
		<div class="page-title">
        	<h1 style="margin-top: 50px;" > Pembayaran Via Transfer</h1>
        </div>
 <div class="page-title-wb auto">

			<p style="text-align: center;margin-bottom: 40px;">Batas Pembayaran: <b id="timer" style="font-size: 17px;"></b></p>
			<p style="text-align: center;">Jumlah Tagihan:</p>
			<h1 style="text-align: center;font-size: 21px;">Rp.<?= number_format($data[0]['total_bayar'],"0",".",".") ?></h1>
			<p style="text-align: center;">Nomor Tagihan:</p>
			<h1 style="text-align: center;color: #c81423;font-size: 21px;margin-bottom: 60px;">#<?= $data[0]['invoice_number'] ?></h1>	
			<div class="center-bank">
			<img src="<?= SITE ?>/public/images/bri.png" width="80">
			<img src="<?= SITE ?>/public/images/bcal.jpg" width="80">
			<img src="<?= SITE ?>/public/images/mandirie.png" width="80">
			<img src="<?= SITE ?>/public/images/bni.png" width="80">
			<img src="<?= SITE ?>/public/images/syariah.png" width="80">	
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
<p style="font-size: 15px;margin-bottom: 20px;">Petunjuk pembayaran melalui transfer</p>
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

<p style="font-size: 15px;margin-bottom: 20px;">Pembayaran dapat dilakukan ke salah satu rekening a/n PT Tokoku berikut:</p>
<div class="pembayaran">
		<div class="f-section">
					<ul>
						<li>
								<img src="<?= SITE ?>/public/images/bri.png" width="100" style="margin-bottom: 8px;">
								<p style="color: #333;margin-bottom: 3px;">Bank BRI, Jakarta</p>
								<b style="font-size: 14px;">001 221 2929</b>
						</li>
					</ul>
		</div>

		<div class="f-section">
					<ul>
						<li>
								<img src="<?= SITE ?>/public/images/bcal.jpg" width="80" style="margin-bottom: 8px;">
								<p style="color: #333;margin-bottom: 3px;">Bank BCA, Jakarta</p>
								<b style="font-size: 14px;">102 300 1440</b>
						</li>
					</ul>
		</div>
		<div class="f-section">
					<ul>
						<li>
								<img src="<?= SITE ?>/public/images/mandirie.png" width="100" style="margin-bottom: 8px;margin-top: -4px;">
								<p style="color: #333;margin-bottom: 3px;">Bank MANDIRI, Jakarta</p>
								<b style="font-size: 14px;">212 009 3002</b>
						</li>
					</ul>
		</div>
		<div class="f-section">
					<ul>
						<li>
								<img src="<?= SITE ?>/public/images/bni.png" width="100" style="margin-bottom: 5px;margin-top: -4px;">
								<p style="color: #333;margin-bottom: 3px;">Bank BNI, Jakarta</p>
								<b style="font-size: 14px;">200	111	0101</b>
						</li>
					</ul>
		</div>
		<div class="f-section">
					<ul>
						<li>
								<img src="<?= SITE ?>/public/images/syariah.png" width="90" style="margin-bottom: 3px;margin-top: -15px;">
								<p style="color: #333;margin-bottom: 3px;">Bank BSM, Jakarta</p>
								<b style="font-size: 14px;">910	202	0019</b>
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
