<div class="container">   
<div class="wrapper pull-left m">
    
    	<div class="page-title">
        <a href="<?= SITE ?>/admin/menu" class="btn pull-right">Back</a>
        	<h1>Add Menu</h1>
            <p>Masukan judul, caption dll menu dengan benar</p>
        </div>
    
    	<form action="<?= SITE ?>/admin/add_menu" method="post" enctype="multipart/form-data" class="form">
        	<label class="block">
            	<b>Judul Menu</b>
                <input type="text" name="judul_menu" class="form-control" required="required" />
            </label>
        	<label class="block">
            	<b>Caption</b>
                <input type="text" name="caption" class="form-control" required="required" />
            </label>
        	<label class="block">
            	<b>Status</b>
                <input type="radio" name="status" value="1" checked="checked" /> Main Menu &nbsp;
                <input type="radio" name="status" value="2"/> Sub Menu
            </label>
        	<label class="block">
            	<b>Konten</b>
                <textarea name="konten" rows="5" class="form-control" required="required"></textarea>
            </label>
	        <button type="submit" name="submit" class="btn btn-large pull-left">Submit</button>
        </form>
    </div>
    
    <div style="height:30px; width:100%" class="pull-left"></div>
    
</div>
</div>