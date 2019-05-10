<div class="container">
 <div class="wrapper pull-left m">
    
    	<div class="page-title">
        	<h1 style="margin-top: 50px;" > Sign Up</h1>
            <p>Masukan informasi atau data anda dengan benar dan jelas</p>
        </div>
    
    	<form action="<?= SITE ?>/member/sign_up" method="post" enctype="multipart/form-data" class="form">
        	<label class="block">
            	<b>Nama Lengkap</b>
                <input type="text" name="nama" class="form-control" required="required" maxlength="9"/>
            </label>
        	<label>
            	<b>Email</b>
                <input type="email" name="email" class="form-control" required="required" />
            </label>
        	<label>
            	<b>Password</b>
                <input type="password" name="password" class="form-control" required="required" />
            </label>
        	<label>
            	<b>Telepon</b>
                <input type="number" name="telepon" class="form-control" required="required" />
            </label>
        	<label>
            	<b>No Rekening</b>
                <input type="number" name="no_rekening" class="form-control" required="required" />
            </label>
        	<label>
            	<b>Kode Pos</b>
                <input type="number" name="kode_pos" class="form-control" required="required" />
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
            	<b>Alamat</b>
                <textarea name="alamat" class="form-control" required="required" rows="5"></textarea>
            </label>
        	<label class="block">
            	<b>Foto</b>
                <input type="file" name="foto" required="required" />
            </label>
            <label class="block">
	            <button type="submit" name="submit" class="btn btn-large pull-left">Submit</button>
            </label>
        </form>


    </div>
    </div>