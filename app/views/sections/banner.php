<div id="banner">
<div class="container">


<a href="<?= SITE ?>/member/login">
	<img src="<?= SITE ?>/public/images/banneru.png" class="banner" width="760" height="250">
</a>
	<img src="<?= SITE ?>/public/images/side-banner..png" class="pull-right banner-sd mySlides animate-top" width="250" height="250">
	<img src="<?= SITE ?>/public/images/banneru.png" class="pull-right banner-sd mySlides animate-bottom" width="250" height="250">
	<img src="<?= SITE ?>/public/images/side-banner..png" class="pull-right banner-sd mySlides animate-top" width="250" height="250">
</div>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2500);    
}
</script>