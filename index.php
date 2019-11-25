<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
	<!-- OWL Carusel -->
	<link rel="stylesheet" href="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/assets/owl.theme.default.min.css">
	
    <!-- Worker style -->
		<link rel="stylesheet" href="css/worker.css?<?=time()?>">
    
    <title>Hello, world!</title>
  </head>
  <body>
    
    <?php include('header.php');?>
    
    <?php include('navbar.php');?>
    
    <?php
      if(file_exists('pages/'.$_SERVER['REDIRECT_URL'].'.php')){
        include('pages/'.$_SERVER['REDIRECT_URL'].'.php');
      }else{
        include('pages/main.php');
      }
    ?>
    
    <?php include('footer.php')?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<!-- OWL Carusel -->
	<script src="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/owl.carousel.min.js"></script>
	
	<script>
		$(function() {
		  // Owl Carousel
		  let owl = $(".owl-carousel");
		  owl.owlCarousel({
			items: 4,
			margin: 10,
			loop:true,
			nav:true,
			autoplay:true,
			autoplayTimeout: 5000,
			autoplayHoverPause:true,
			responsiveClass:true,
			responsive:{
			0:{
				items:1,
			},
			600:{
				items:2,
			},
			1000:{
				items:3,
			},
			1200:{
				items:4,
			}
			}
		  });
		});
		
		$(function(){
			// Выравниваем все блоки по высоте "новинки каталога"
			let mh = 0;
			$(".widget-catalog .card-body").each(function () {
				let h_block = parseInt($(this).height());
				if(h_block > mh) {
					mh = h_block;
				};
			});
			$(".widget-catalog .product-name").attr('style', "height: calc("+mh+"px/1.6)!important;");

			// Расчитываем позиционирование стрелок согласно высоте блоков.
			let hg = mh/1.8;
			$(".widget-catalog .owl-next").attr('style', "top:" + hg + "px!important; right: -85px!important;");
			$(".widget-catalog .owl-prev").attr('style', "top:" + hg + "px!important; left: -85px!important;");
			$('.owl-prev span').html('<img src="/img/icons/arrow-left.png">');
			$('.owl-next span').html('<img src="/img/icons/arrow-right.png">');
		})
	</script>
	
  </body>
</html>