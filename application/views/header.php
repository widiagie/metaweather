<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Metaweather API test case</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="assets/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="assets/style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>

	<body>
		
		<div class="site-content">

			<div class="site-header">
				<div class="container">
					<a href="./" class="branding">
						<img src="assets/images/logo.png" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">Meta Weather API</h1>
							<small class="site-description">Assessment Test</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item <?php if($_GET['show'] == ''){?> current-menu-item <?php }?>"><a href="./">Home</a></li>
							<li class="menu-item <?php if($_GET['show'] == 'list'){?> current-menu-item <?php }?>"><a href="./list">Location list</a></li> 
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<div class="hero" data-bg-image="assets/images/banner.png">
				<div class="container">
					<form action="./" method="post" class="find-location">
						<input type="text" name="search" placeholder="Find your location...">
						<input type="submit" value="Search">
					</form> 
				</div>
			</div>
			<div class="forecast-table">
				<div class="container">
					<div class="forecast-container">