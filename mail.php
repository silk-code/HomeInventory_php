<html>
    <head>
        <title>test</title>
        <style>
  .slideshow { width: 600px; height: 600px; }
  .container { margin: 150px auto; }
</style>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="slideshowPlugin\swiper.js"></script>
<div class="slideshow"<a href="https://www.jqueryscript.net/slider/">Slider</a></div>
<script>
    const imageList = ['1.jpg', '2.jpg', '3.jpg', '4.jpg','5.jpg'];
    $('.slideshow').swiper({
    imageList : imageList,
    animateType : 'fade',
    changeBtn : true,
    slideBtn : true,
    isAuto : true
    });
</script>
    </body>
</html>

