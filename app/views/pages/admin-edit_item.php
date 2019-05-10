<div class="container">
<div class="wrapper pull-left m">
    
    	<div class="page-title">
        <a href="<?= SITE ?>/admin/items" class="btn pull-right">Back</a>
        	<h1>Edit Item</h1>
            <p>Perbarui informasi atau data item dengan benar dan jelas</p>
        </div>
    
    	<form action="<?= SITE ?>/admin/edit_item" method="post" enctype="multipart/form-data" class="form">
        	<label class="block">
            	<b>Nama Item</b>
                <input type="text" name="nama_item" class="form-control" value="<?= $data[0]['nama_item'] ?>" required="required" />
            </label>
        	<label>
            	<b>Merk</b>
                <input type="text" name="merk" class="form-control" value="<?= $data[0]['merk'] ?>" required="required" />
            </label>
        	<label>
            	<b>Harga</b>
                <input type="text" name="harga" class="form-control" value="<?= $data[0]['harga'] ?>" required="required" />
            </label>
        	<label>
            	<b>Qty</b>
                <input type="number" name="qty" class="form-control" value="<?= $data[0]['qty'] ?>" required="required" />
            </label>
        	<label>
            	<b>Diskon</b>
                <input type="number" name="diskon" class="form-control" value="<?= $data[0]['diskon'] ?>" required="required" />
            </label>
        	<label>
            	<b>Kategori</b>
                <select name="kategori" class="form-control">
                	<option value="all">Pilih Kategori</option>
                    <?php
					foreach($kategori as $k){
						if($k['id_kategori'] == $data[0]['id_kategori']){
							echo "<option value='".$k['id_kategori']."' selected>".ucwords($k['kategori'])."</option>";			
						} else {
							echo "<option value='".$k['id_kategori']."'>".ucwords($k['kategori'])."</option>";			
						}
					}
					?>
                </select>
            </label>
        	<label>
            	<b>Lokasi</b>
                <select name="lokasi" class="form-control">
                	<option value="all">Pilih Lokasi</option>
                    <?php
					foreach($lokasi as $l){
						if($l['id_lokasi'] == $data[0]['id_lokasi']){
							echo "<option value='".$l['id_lokasi']."' selected>".ucwords($l['lokasi'])."</option>";		
						} else {
							echo "<option value='".$l['id_lokasi']."'>".ucwords($l['lokasi'])."</option>";			
						}
						
					}
					?>
                </select>
            </label>
        	<label class="block">
            	<b>Deskripsi</b>
                <textarea name="deskripsi" class="form-control" required="required" rows="5"><?= $data[0]['deskripsi'] ?></textarea>
            </label>
        	<label class="block">
            	<b>Foto</b>
                <img src="<?= SITE ?>/public/images/items/<?= $data[0]['foto'] ?>" width="206" height="170" />
                <br/><br/>
                <input type="file" name="foto" />
            </label>
            <input type="hidden" name="id_item" value="<?= $data[0]['id_item'] ?>" />
	        <button type="submit" name="submit" class="btn btn-large pull-left">Update</button>
        </form>
    </div>
    </div>