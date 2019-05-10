<div class="container">   
<div class="wrapper pull-left m">
    
    	<div class="page-title">
        <a href="<?= SITE ?>/admin/menu" class="btn pull-right">Back</a>
        	<h1>Edit Menu</h1>
            <p>Perbarui judul, caption dll menu dengan benar</p>
        </div>
    
    	<form action="<?= SITE ?>/admin/edit_menu" method="post" enctype="multipart/form-data" class="form">
        	<label class="block">
            	<b>Judul Menu</b>
                <input type="text" name="judul_menu" class="form-control" value="<?= $data[0]['judul_menu'] ?>" required="required" />
            </label>
        	<label class="block">
            	<b>Caption</b>
                <input type="text" name="caption" class="form-control" value="<?= $data[0]['caption'] ?>" required="required" />
            </label>
        	<label class="block">
            	<b>Status</b>
                <?php
				if($data[0]['status'] == 1){
					$c1 = 'checked'; $c2 = '';
				}
				elseif($data[0]['status'] == 2){
					$c1 = ''; $c2 = 'checked';
				}
				?>
                <input type="radio" name="status" value="1" <?= $c1 ?>/> Main Menu &nbsp;
                <input type="radio" name="status" value="2" <?= $c2 ?>/> Sub Menu
            </label>
        	<label class="block">
            	<b>Konten</b>
                <textarea name="konten" rows="5" class="form-control" required="required"><?= $data[0]['konten'] ?></textarea>
            </label>
            <input type="hidden" name="id_menu" value="<?= $data[0]['id_menu'] ?>" />
	        <button type="submit" name="submit" class="btn btn-large pull-left">Update</button>
        </form>
    </div>
    
    <div style="height:30px; width:100%" class="pull-left"></div>
    
</div>
</div>