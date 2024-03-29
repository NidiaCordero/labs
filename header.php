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
	<!-- <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet"> -->

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
	<div id="preloder">
		<div class="loader">
			<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>


	<!-- Header section -->
	<header class="header-section">
		<div class="logo">
		<?php
// check to see if the logo exists and add it to the page
if ( get_theme_mod( 'your_theme_logo' ) ) : ?>
 
<img src="<?php echo get_theme_mod( 'your_theme_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
 
<?php // add a fallback if the logo doesn't exist
else : ?>
 
<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
 
<?php endif; ?><!-- Logo -->
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

				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'category_name' => 'header',
					'posts_per_page' => 1,
				);
				$arr_posts = new WP_Query($args);

				if ($arr_posts->have_posts()) :

					while ($arr_posts->have_posts()) :
						$arr_posts->the_post();
						?>
						
						<p><?php the_title(); ?></p>

			</div>
		</div>
		<!-- slider -->

		<div id="hero-slider" class="owl-carousel">
			<?php 
			$image_first = get_field('image_first');
			$image_second = get_field('image_second');
			if (get_field('image_first')) {
				echo '<div class="item  hero-item" data-bg="'.$image_first.'"></div>';
				echo '<div class="item  hero-item" data-bg="'.$image_second.'"></div>';
			}
			
			?>
            <!-- <div class="item  hero-item" data-bg="img/test.jpg"></div>
            <div class="item  hero-item" data-bg="img/test.jpg"></div> -->
        </div>

		<?php
			endwhile;
		endif; ?>

	</div>
		
	<!-- Intro Section -->