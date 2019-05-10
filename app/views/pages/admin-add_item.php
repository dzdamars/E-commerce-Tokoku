<div class="container">
<div class="wrapper pull-left m">
    
    	<div class="page-title">
        <a href="<?= SITE ?>/admin/items" class="btn pull-right">Back</a>
        	<h1>Add Item</h1>
            <p>Silahkan Masukkan Item yang ingin di jual</p>
        </div>
    
    	<form action="<?= SITE ?>/admin/add_item" method="post" enctype="multipart/form-data" class="form">
        	<label class="block">
            	<b>Nama Item</b>
                <input type="text" name="nama_item" class="form-control" required="required" />
            </label>
        	<label>
            	<b>Merk</b>
                <input type="text" name="merk" class="form-control" required="required" />
            </label>
        	<label>
            	<b>Harga</b>
                <input type="text" name="harga" class="form-control" required="required" />
            </label>
        	<label>
            	<b>Qty</b>
                <input type="number" name="qty" class="form-control" required="required" />
            </label>
        	<label>
            	<b>Diskon</b>
                <input type="number" name="diskon" class="form-control" required="required" />
            </label>
        	<label>
            	<b>Kategori</b>
                <select name="kategori" class="form-control">
                	<option value="all">Pilih Kategori</option>
                    <?php
					foreach($kategori as $k){
						echo "<option value='".$k['id_kategori']."'>".ucwords($k['kategori'])."</option>";		
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
						echo "<option value='".$l['id_lokasi']."'>".ucwords($l['lokasi'])."</option>";		
					}
					?>
                </select>
            </label>
        	<label class="block">
            	<b>Deskripsi</b>
                <textarea name="deskripsi" class="form-control" required="required" rows="5"></textarea>
            </label>
        	<label class="block">
            	<b>Foto</b>
                <input type="file" name="foto" required="required" />
            </label>
	        <button type="submit" name="submit" class="btn btn-large pull-left">Submit</button>
        </form>
    </div>
    </div>