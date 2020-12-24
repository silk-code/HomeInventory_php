<?php 
include "header.php"; ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="slideshowPlugin\swiper.js"></script>
<div class="slideshow"<a href="https://www.jqueryscript.net/slider/"></a></div>
<script>
    const imageList = ['images/1.jpg', 'images/2.jpg', 'images/3.jpg', 'images/4.jpg','images/5.jpg'];
    $('.slideshow').swiper({
    imageList : imageList,
    animateType : 'fade',
    changeBtn : true,
    slideBtn : true,
    isAuto : false
    });
</script>
<?php include "footer.php"; ?>

