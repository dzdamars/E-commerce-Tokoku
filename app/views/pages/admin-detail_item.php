<div class="container">
<div class="wrapper pull-left m">
    
    	<div class="page-title">
            <a href="<?= SITE ?>/admin/items" class="btn pull-right">Back</a>
        	<h1>Detail Item</h1>
            <p>Detail Item milik anda</p>
        </div>
        

    	<form action="<?= SITE ?>/admin/edit_item" method="post" enctype="multipart/form-data" class="form">
        	<label class="block">
            	<b>Nama Item</b>
                <input type="text" name="nama_item" class="form-control" value="<?= $data[0]['nama_item'] ?>" readonly />
            </label>
        	<label>
            	<b>Merk</b>
                <input type="text" name="merk" class="form-control" value="<?= $data[0]['merk'] ?>" readonly />
            </label>
        	<label>
            	<b>Harga</b>
                <input type="text" name="harga" class="form-control" value="<?= $data[0]['harga'] ?>" readonly />
            </label>
        	<label>
            	<b>Qty</b>
                <input type="number" name="qty" class="form-control" value="<?= $data[0]['qty'] ?>" readonly />
            </label>
        	<label>
            	<b>Diskon</b>
                <input type="number" name="diskon" class="form-control" value="<?= $data[0]['diskon'] ?>" readonly/>
            </label>
          
        	<label>
            	<b>Kategori</b>
                <?php
                    foreach($kategori as $k){
                        if($k['id_kategori'] == $data[0]['id_kategori']){
                            echo "<input type='text' class='form-control' readonly value='".$k['kategori']."'</option>";         
                        } 
                    }
                    ?>
                  
            </label>
        	<label>
            	<b>Lokasi</b>
                 <?php
                    foreach($lokasi as $l){
                        if($l['id_lokasi'] == $data[0]['id_lokasi']){
                            echo "<input type='text' class='form-control' readonly value='".$l['lokasi']."'</option>";         
                        } 
                    }
                    ?>
               
            </label>
        	<label class="block">
            	<b>Deskripsi</b>
                <textarea name="deskripsi" class="form-control" readonly rows="5"><?= $data[0]['deskripsi'] ?></textarea>
            </label>
        	<label class="block">
            	<b>Foto</b>
                <img src="<?= SITE ?>/public/images/items/<?= $data[0]['foto'] ?>" width="206" height="170" />
                <br/><br/>
               
            </label>

        </form>
    </div>
    </div>