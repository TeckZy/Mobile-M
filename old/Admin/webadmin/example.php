<html>
<head>

<script>
$('#myCarousel').carousel({
  interval: 10000
})

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  }
  else {
  	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});


/* override position and transform in 3.3.x */
.carousel-inner .item.left.active {
  transform: translateX(-33%);
}
.carousel-inner .item.right.active {
  transform: translateX(33%);
}

.carousel-inner .item.next {
  transform: translateX(33%)
}
.carousel-inner .item.prev {
  transform: translateX(-33%)
}

.carousel-inner .item.right,
.carousel-inner .item.left { 
  transform: translateX(0);
}


.carousel-control.left,.carousel-control.right {background-image:none;}
</script>
</head>
<body>
<div class="col-md-6 col-md-offset-3">
<div class="carousel slide" id="myCarousel">
  <div class="carousel-inner">
    <div class="item active">
      <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/bbbbbb/fff&amp;text=1" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/CCCCCC/fff&amp;text=2" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/eeeeee/fff&amp;text=3" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/f4f4f4/fff&amp;text=4" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/fcfcfc/333&amp;text=5" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/f477f4/fff&amp;text=6" class="img-responsive"></a></div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
</div>
</body>
</body>