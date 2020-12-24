```html
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.3.1/core.js"></script>
<script src="./src/js/swiper.js"></script>
<script>
	$('.wrapper').swiper({
		//图片地址数组
		imageList : ['./src/image/1.jpg', './src/image/2.jpg', './src/image/3.jpg', './src/image/4.jpg', './src/image/5.jpg', './src/image/6.jpg', './src/image/7.jpg', './src/image/8.jpg'],
		//切换动画类型 animate：无缝轮播  fade：淡入淡出
		animateType : 'animate',
		//是否显示切换按钮
		changeBtn : true,
		// 是否显示指示器按钮
		slideBtn : true,
		// 是否自动轮播
		isAuto : true,
	});

	$('.box').swiper({
		imageList : ['./src/image/1.jpg', './src/image/2.jpg', './src/image/3.jpg', './src/image/4.jpg', './src/image/5.jpg', './src/image/6.jpg', './src/image/7.jpg', './src/image/8.jpg'],
		animateType : 'animate',
		imageWidth : 400,
		changeBtn : true,
		slideBtn : true,
		isAuto : true,
	});
</script>
```