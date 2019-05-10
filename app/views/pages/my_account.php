 <div class="container" style="margin-top:50px;">
 <div class="wrapper pull-left m">
    
    	<div class="page-title">
        	<h1 style="margin-top:50px;">My Account</h1>
            <p>Perbarui informasi atau data anda dengan benar dan jelas</p>
        </div>
    
    	<form action="<?= SITE ?>/member/my_account" method="post" enctype="multipart/form-data" class="form">
        	<label class="block">
            	<b>Nama Lengkap</b>
                <input type="text" name="nama" class="form-control" value="<?= $data[0]['nama'] ?>" required="required" />
            </label>
        	<label>
            	<b>Email</b>
                <input type="email" name="email" class="form-control" value="<?= $data[0]['email'] ?>" required="required" />
            </label>
        	<label>
            	<b>Password</b>
                <input type="password" name="password" class="form-control" readonly/>
            </label>
        	<label>
            	<b>Telepon</b>
                <input type="number" name="telepon" class="form-control" value="<?= $data[0]['telepon'] ?>" required="required" />
            </label>
        	<label>
            	<b>No Rekening</b>
                <input type="number" name="no_rekening" class="form-control" value="<?= $data[0]['no_rekening'] ?>" required="required" />
            </label>
        	<label>
            	<b>Kode Pos</b>
                <input type="number" name="kode_pos" class="form-control" value="<?= $data[0]['kode_pos'] ?>" required="required" />
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
            	<b>Alamat</b>
                <textarea name="alamat" class="form-control" required="required" rows="5"><?= $data[0]['alamat'] ?></textarea>
            </label>
        	<label class="block">
            	<b>Foto</b>
                <img src="<?= SITE ?>/public/images/members/<?= $data[0]['foto'] ?>" width="236" height="150" />
                <br/><br/>
                <input type="file" name="foto"/>
            </label>
            <input type="hidden" name="id_member" value="<?= $data[0]['id_member'] ?>" />
            <input type="hidden" name="old_password" value="<?= $data[0]['password'] ?>" />
            <label class="block">
	            <button type="submit" name="submit" class="btn btn-large pull-left">Update</button>
            </label>
        </form>
    </div>
    </div>