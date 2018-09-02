<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Metaweather API test case</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="<?php echo $base_url; ?>assets/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="<?php echo $base_url; ?>assets/style.css">
		
		<!--[if lt IE 9]>
		<script src="<?php echo $base_url; ?>js/ie-support/html5.js"></script>
		<script src="<?php echo $base_url; ?>js/ie-support/respond.js"></script>
		<![endif]-->

	</head>

	<body>
		
		<div class="site-content">

			<div class="site-header">
				<div class="container">
					<a href="./" class="branding">
						<img src="<?php echo $base_url; ?>assets/images/logo.png" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">Meta Weather API</h1>
							<small class="site-description">Assessment Test</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item <?php if($_GET['show'] == '' || $_GET['show'] == 'home'){?> current-menu-item <?php }?>"><a href="<?php echo $base_url; ?>">Home</a></li>
							<li class="menu-item <?php if($_GET['show'] == 'list'){?> current-menu-item <?php }?>"><a href="<?php echo $base_url; ?>list">Location list</a></li> 
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<div class="hero" data-bg-image="<?php echo $base_url; ?>assets/images/banner.png">
				<div class="container">
					<form action="<?php echo $base_url; ?>" method="post" class="find-location">
						<input type="text" name="search" placeholder="Find your location...">
						<input type="submit" value="Search">
					</form> 
				</div>
			</div>
			<div class="forecast-table">
				<div class="container">
					<div class="forecast-container">