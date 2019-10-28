<?php// Ce fichier template spécial de wordpress est appelé pour afficher les catégories ou taxonomie ou autre archive. Voir le wp hierarchy
// https://wphierarchy.com/
?>

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


    <!-- Page header -->
    <div class="page-top-section">
        <div class="overlay"></div>
        <div class="container text-right">
            <div class="page-info">
                <h2><?php the_archive_title(); ?></h2>
                <!-- <div class="page-links">
					<a href="#">Home</a>
					<span>Services</span>
				</div> -->


            </div>
        </div>
    </div>
    <!-- Page header end-->

    <div class="page-section spad">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-7 blog-posts">
                    <!-- Dans cette boucle nous allons récupérer tout les post qui correspondent à la recherche -->
                    <?php while (have_posts()) : the_post(); ?>


                        <div class="post-item">
                            <div class="post-thumbnail">
                                <?php
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    echo '<img src="' . $featured_img_url . '" alt="">';
                                    ?>
                                <div class="post-date">

                                    <h2><?php echo get_the_date('d'); ?></h2>
                                    <h3><?php echo get_the_date('M Y'); ?></h3>
                                </div>

                            </div>
                            <div class="post-content">
                                <h2 class="post-title"><?php the_title(); ?></h2>
                                <div class="post-meta">

                                    <!-- afficher les tags du post -->
                                    <?php
                                            $tags = get_tags();
                                            if ($tags) :
                                                foreach ($tags as $tag) : ?>
                                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" title="<?php echo esc_attr($tag->name); ?>"><?php echo esc_html($tag->name); ?></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    <!-- Post item -->
                                </div>
                                <p><?php echo excerpt_blog(30); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php get_template_part('templates-blog/sidebar-blog'); ?>

            </div>





        </div>
    </div>
    <?php
    get_footer();
    ?>