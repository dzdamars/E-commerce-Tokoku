<div class="container">
<div class="pull-left m">
    
    	<div class="page-title" style="margin-bottom:50px;">
        	<h1 style="margin-top: 50px">  Login</h1>
            <p>Masukan email dan password dengan benar</p>
        </div>
    
    	<form action="<?= SITE ?>/member/login" method="post" enctype="multipart/form-data" class="form">
        	<label class="block pull-left">
            	<b style="margin:-29px 0;float:left;">Email</b>
                <input type="email" name="email" class="form-control" required="required" style="width:300px;" placeholder="Masukkan Email Anda"/>
            </label>
        	<label class="block pull-left">
            	<b style="margin:17px 0;float:left;">Password</b>
                <input type="password" name="password" class="form-control-pw" required="required" style="width:300px;" placeholder="Masukkan Password Anda"/>
            </label>
	        <button type="submit" name="submit" class="btn pull-left">Submit</button>
        </form>
    </div>
    
</div>
</div>
