<div class="container">   
<div class="wrapper pull-left m">
    
    	<div class="page-title">
         <a href="<?= SITE ?>/admin/lokasi" class="btn pull-right">Back</a>
        	<h1>Edit Lokasi</h1>
            <p>Perbarui nama lokasi</p>
        </div>
    
    	<form action="<?= SITE ?>/admin/edit_lokasi" method="post" class="form">
        	<label class="block">
            	<b>Nama Lokasi</b>
                <input type="text" name="lokasi" class="form-control" value="<?= $data[0]['lokasi'] ?>" required="required" style="width:300px;" />
            </label>
            <input type="hidden" name="id_lokasi" value="<?= $data[0]['id_lokasi'] ?>" />
	        <button type="submit" name="submit" class="btn btn-large pull-left">Submit</button>
        </form>
    </div>
    
    <div style="height:130px; width:100%" class="pull-left"></div>
    
</div>
</div>