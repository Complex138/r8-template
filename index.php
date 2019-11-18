<!doctype html>
<html lang="ru">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- font-awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

		<!-- OWL Carusel -->
		<link rel="stylesheet" href="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/assets/owl.theme.default.min.css">

		<link href="/vendor/sumoselect/sumoselect.css" rel="stylesheet" />

		<!-- Worker style -->
		<link rel="stylesheet" href="css/worker.css?<?=time()?>">
		
		<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css'>

		<title>R8</title>
	</head>
	
	<body>
	<!-- BEGIN LAYER -->
		<div class="wrapper">
			<div class="layer">
				<!-- BEGIN HEADER -->
				<header>
					<?php include('header.php')?>
				</header>
				<!-- END HEADER -->
				
				<!-- BEGIN MAIN -->
				<main>
						<?php
							if(file_exists('pages/'.$_SERVER['REDIRECT_URL'].'.php')){
								include('pages/'.$_SERVER['REDIRECT_URL'].'.php');
							}else{
								include('pages/main.php');
							}
						?>
					<?php #include('pages/main.php')?>
					<?php #include('pages/catalog.php')?>
					<?php #include('pages/basket.php')?>
					<?php #include('pages/product.php')?>
					<?php #include('pages/search.php')?>
				</main>
				<!-- END MAIN -->
			</div>
			<!-- BEGIN FOOTER -->
			<footer>
				<?php include('footer.php')?>
			</footer>
			<!-- END FOOTER -->
		</div>
	<!-- END LAYER -->

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<script src="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/owl.carousel.min.js"></script>
	<script src="vendor/sumoselect/jquery.sumoselect.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js'></script>
	<script src="/js/index.js"></script>
		<script>
			"use strict";
			$('document').ready(function(){
				
				$(function() {
				  // Owl Carousel
				  let owl = $(".owl-carousel");
				  owl.owlCarousel({
					items: 4,
					margin: 10,
					loop: true,
					nav: true,
					//autoplay: true,
					autoplayTimeout: 5000,
					autoplayHoverPause:true,
				  });
				});
				
				$(function(){
					// Выравниваем все блоки по высоте "новинки каталога"
					let mh = 0;
					$(".widget-novelty-catalog .card-body").each(function () {
						let h_block = parseInt($(this).height());
						if(h_block > mh) {
							mh = h_block;
						};
					});
					$(".widget-novelty-catalog .card-body").height(mh);

					// Расчитываем позиционирование стрелок согласно высоте блоков.
					let hg = mh/4;
					$(".widget-novelty-catalog .owl-next").attr('style', "top:" + hg + "px!important;");
					$(".widget-novelty-catalog .owl-prev").attr('style', "top:" + hg + "px!important;");
				})
				
				$(".prodPlus").on('click', function(){
					$("input.prod").val(parseInt($("input.prod").val()) + 1 + " шт.");
				})
				$(".prodMinus").on('click', function(){
					if(parseInt($("input.prod").val()) > 0){
						$("input.prod").val(parseInt($("input.prod").val()) - 1 + " шт.");
					}
				})
				
				$(function(){
					// Select list checkbox
					$('.sumoselect').SumoSelect();
				})
			})
			
			
		function catalogItemCounterDown(field){
			let min = $(field).data('min') || false;
			let max = $(field).data('max') || false;
			let value = parseInt($(field).val());
			value--;
			if(!min || value >= min){
				$(field).val(value);
			}
		}
		
		function catalogItemCounterUp(field){
			let min = $(field).data('min') || false;
			let max = $(field).data('max') || false;
			let value = parseInt($(field).val());
			value++;
			if(!max || value <= max){
				$(field).val(value++);
			}
		}
		
		</script>
	</body>
</html>