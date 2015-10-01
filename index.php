<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="images/ta.ico">
<!-- /.website title -->
<title>Top Ace Motor Works</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- CSS Files -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet" media="screen">
<link href="css/owl.theme.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">

<!-- Colors -->
<link href="css/css-index.css" rel="stylesheet" media="screen">
<!-- <link href="css/css-index-green.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-purple.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-red.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-orange.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-yellow.css" rel="stylesheet" media="screen"> -->

<!-- Google Fonts -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />

<!-- Googele Map -->
<style>
      #map {
        width: 500px;
        height: 400px;
      }
    </style>
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript"> function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(16.425814,120.59395799999993),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("map"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(16.425814, 120.59395799999993)});infowindow = new google.maps.InfoWindow({content:"<b>Top Ace Motor Works</b><br/>369 Magsaysay Avenue<br/>2600 Baguio City" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>


</head>
  
<body data-spy="scroll" data-target="#navbar-scroll">

<!-- /.preloader -->
<div id="preloader"></div>
<div id="top"></div>

<!-- /.parallax full screen background image -->
<div class=" parallax">
	
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
				
					<!-- /.logo -->
					<div class="logo wow fadeInDown"> <a href=""><img src="images/top-ace-logo.png" alt="logo"></a></div>
						

					<!-- /.main title -->
						<h1 class="wow fadeInLeft">
						Job Order System with Inventory management
						</h1>


				</div> 
				
				<!-- /.signup form -->
				<div class="col-md-5">
				
					<div class="signup-header wow fadeInUp" style="border:1px solid #dadada;">
						<h3 class="form-title text-center" style="color: #3eb0f7;">Welcome!</h3>
						<form class="form-header" action="includes/login.php" role="form" method="POST" id="#">
						<input type="hidden" name="u" value="503bdae81fde8612ff4944435">
						<input type="hidden" name="id" value="bfdba52708">
							<div class="form-group">
								<input class="form-control input-lg" name="username" id="username" type="text" placeholder="Username" required autocomplete="off">
							</div>
							<div class="form-group">
								<input class="form-control input-lg" name="password" id="password" type="password" placeholder="Password" required>
							</div>
							<div class="form-group last">
								<input type="submit" class="btn btn-primary btn-block btn-lg" value="Sign In">
							</div>
							<p class="privacy text-center"></p>
						</form>
					</div>				
				
				</div>
			</div>
		</div> 
	</div> 
</div>
 



  
<!-- /.footer -->
<footer id="footer">

	<div class="container">
	<hr>
		<div class="col-sm-4 col-sm-offset-4">

			<!-- /.social links -->
<!-- 				<div class="social text-center">
					<ul>
						<li><a class="wow fadeInUp" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
						<li><a class="wow fadeInUp" href="https://www.facebook.com/" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
						<li><a class="wow fadeInUp" href="https://plus.google.com/" data-wow-delay="0.4s"><i class="fa fa-google-plus"></i></a></li>
						<li><a class="wow fadeInUp" href="https://instagram.com/" data-wow-delay="0.6s"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>	 -->

			<div class="text-center wow fadeInUp" style="font-size: 14px;"> Copyright &copy Top Ace Motor Works Inc. 2015</div>
			<a href="#" class="scrollToTop"><i class="pe-7s-up-arrow pe-va"></i></a>
		</div>	
	</div>	
</footer>
	
	<!-- /.javascript files -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery.sticky.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script>
		new WOW().init();
	</script>
  </body>
</html>