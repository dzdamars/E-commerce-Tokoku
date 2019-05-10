<div class="container">   
<div class="wrapper pull-left m">
    
    	<div class="page-title">
         <a href="<?= SITE ?>/admin/kategori" class="btn pull-right">Back</a>
        	<h1>Add Kategori</h1>
            <p>Masukan nama kategori</p>
        </div>
    
    	<form action="<?= SITE ?>/admin/add_kategori" method="post" class="form">
        	<label class="block">
            	<b>Nama Kategori</b>
                <input type="text" name="kategori" class="form-control" required="required" style="width:300px;" />
            </label>
	        <button type="submit" name="submit" class="btn btn-large pull-left">Submit</button>
        </form>
    </div>
    
    <div style="height:30px; width:100%" class="pull-left"></div>
    
</div>
</div>