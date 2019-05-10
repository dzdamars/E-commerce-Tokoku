<div class="container">

		<div class="page-title">
        	<h1 style="margin-top: 50px;text-align: center;" > Metode Pembayaran</h1>
            <p style="text-align: center;">Pilih Bank atau mitra yang akan Di Transfer</p>
        </div>
        <div class="page-titlee">
        	<h1 style="margin-top: 50px;" > Transfer Bank</h1>
            <img class="pull-left" src="<?= SITE ?>/public/images/bri.png" width="150" style="margin: 8px 10px;">
            <img class="pull-left" src="<?= SITE ?>/public/images/bcal.jpg" width="150">
            <img class="pull-left" src="<?= SITE ?>/public/images/bni.png" width="150">
            <img class="pull-left" src="<?= SITE ?>/public/images/mandirie.png" width="150" style="margin: 0px 10px;">
            <img class="pull-left" src="<?= SITE ?>/public/images/syariah.png" width="150">
            <a name="bank" href="<?= SITE ?>/method/bank_transfer/<?= $data[0]['invoice_number'] ?>" class="btn pull-right">Pilih</a>
        </div>
        <div class="page-titlee">
        	<h1 style="margin-top: 50px;" > Indomart</h1>
            <img class="pull-left" src="<?= SITE ?>/public/images/indomaret.png" width="150" style="margin: -8px 10px;">
            <a href="<?= SITE ?>/method/indomart_transfer/<?= $data[0]['invoice_number'] ?>" class="btn pull-right">Pilih</a>
        </div>
        <div class="page-titlee">
        	<h1 style="margin-top: 50px;" > Alfamart</h1>
            <img class="pull-left" src="<?= SITE ?>/public/images/alfamart.png" width="150">
            <img class="pull-left" src="<?= SITE ?>/public/images/alfamidi.png" width="150" style="margin: 8px 10px;">
            <a href="<?= SITE ?>/method/alfa_transfer/<?= $data[0]['invoice_number'] ?>" class="btn pull-right">Pilih</a>
        </div>
<div class="bank_kt pull-right">

</div>
</div>
