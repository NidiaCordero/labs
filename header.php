<!DOCTYPE html>
<html lang="en">

<head>
	<title>Labs - Design Studio</title>
	<meta charset="UTF-8">
	<meta name="description" content="Labs - Design Studio">
	<meta name="keywords" content="lab, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" rel="shortcut icon" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">

	<!-- Stylesheets -->
	<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flaticon.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/magnific-popup.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css"/> -->
	<?php wp_head(); ?>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<!-- Page Preloder -->
	<!-- <div id="preloder">
		<div class="loader">
			<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="">
			<h2>Loading.....</h2>
		</div>
	</div> -->


	<!-- Header section -->
	<header class="header-section">
		<div class="logo">
			<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt=""><!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive"><i class="fa fa-bars"></i></div>
		<nav>
			<!-- <ul class="menu-list">
				<li class="active"><a href="home.html">Home</a></li>
				<li><a href="services.html">Services</a></li>
				<li><a href="blog.html">Blog</a></li>
				<li><a href="contact.html">Contact</a></li>
				<li><a href="elements.html">Elements</a></li>
			</ul> -->
			<?php
			wp_nav_menu([
				// 'menu' => 'main-menu',
				'menu_class' => 'menu-list',
				'theme_location' => 'main-menu',
				'add_li_class' => '',
				'current-menu-item' => 'active',

				'container' => ''
			]);
			?>
		</nav>
	</header>
	<!-- Header section end -->
	<!-- Intro Section -->
	<div class="hero-section">
		<div class="hero-content">
			<div class="hero-center">
				<img src="<?php echo get_template_directory_uri(); ?>/img/big-logo.png" alt="">

				<?php
				$post_id = 20;
				$queried_post = get_post($post_id);
				?>
				<p><?php echo $queried_post->post_title; ?></p>



			</div>
		</div>
		<!-- slider -->
		<div id="hero-slider" class="owl-carousel">

			<?php
			$image = get_field('image_first');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
			if ($image) {
				?>
				<div class="item  hero-item" data-bg="<?php echo wp_get_attachment_image($image, $size); ?>"></div>
			<?php } ?>

			<?php
			$image = get_field('image_second');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
			if ($image) {
				?>

				<div class="item  hero-item" data-bg="<?php echo wp_get_attachment_image($image, $size); ?>"></div>
			<?php } ?>
		</div>




	</div>



	<!-- <?php
			$image = get_field('image_first');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
			if ($image) {
				echo wp_get_attachment_image($image, $size);
			}
			?> -->


	<!-- Intro Section -->