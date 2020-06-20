<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bất động sản Hưng Thịnh</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<base href="{{asset('')}}">

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="trangchu.css/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="trangchu.css/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="trangchu.css/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="trangchu.css/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="trangchu.css/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="trangchu.css/css/owl.carousel.min.css">
	<link rel="stylesheet" href="trangchu.css/css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="trangchu.css/css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="trangchu.css/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="trangchu.css/css/style.css">
	@yield('css')
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div class="colorlib-loader"></div>

	<div id="page">
		@include('trangchu.header')
		<div class="colorlib-tour colorlib-light-grey">
		@yield('content')
		</div>
		@include('trangchu.footer')

	</div>



	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	<!-- jQuery -->
	<script src="trangchu.css/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="trangchu.css/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="trangchu.css/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="trangchu.css/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="trangchu.css/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="trangchu.css/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="trangchu.css/js/jquery.magnific-popup.min.js"></script>
	<script src="trangchu.css/js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="trangchu.css/js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="trangchu.css/js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="trangchu.css/js/main.js"></script>
	@yield('script')
	</body>
</html>

