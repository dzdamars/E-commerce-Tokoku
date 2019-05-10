<div class="container">   
<div class="wrapper pull-left m">
    
        <div class="page-title">
        <a href="<?= SITE ?>/admin/menu" class="btn pull-right">Back</a>
            <h1>Kirim resi</h1>
            <p>Silahkan Masukkan Resi Dengan Benar</p>
        </div>
    
        <form action="<?= SITE ?>/admin/kirim_resi" method="post" enctype="multipart/form-data" class="form">
            <label class="block">
                <b>Masukkan Resi</b>
                <input type="text" name="resi" class="form-control" value="<?= $data[0]['resi'] ?>" required="required" />
            </label>
            <label class="block">   
                <input type="hidden" name="status" class="form-control" value="4" required="required" />
            </label>
            <input type="hidden" name="invoice_number" value="<?= $data[0]['invoice_number'] ?>" />
            <button type="submit" name="submit" class="btn btn-large pull-left">Kirim</button>
        </form>
    </div>
    
    <div style="height:30px; width:100%" class="pull-left"></div>
    
</div>
</div>