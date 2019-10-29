<?php /* Template Name: services page */ ?>

<?php 
get_template_part('templates/header-page');
?>

	<!-- Page header -->
	<div class="page-top-section">
		<div class="overlay"></div>
		<div class="container text-right">
			<div class="page-info">
				<h2><?php the_title() ?></h2>
				<!-- <div class="page-links">
					<a href="#">Home</a>
					<span>Services</span>
				</div> -->
				
				<div class="page-links">				
			<?php 
			$menuParameters = array(
				'theme_location' => 'second_menu',
				'current-menu-item' => 'active',
				'container'       => false,
				'echo'            => false,
				'items_wrap'      => '%3$s',
				'depth'           => 0,
			  );
			  
			  echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
			?>
				
			</div>
			</div>
		</div>
	</div>
<?php

get_template_part('templates-services/all-services');
get_template_part('templates-services/second-services');
get_template_part('templates-services/project');
get_template_part('templates-services/newsletter');

get_template_part('templates/contact');




// Ajout d'un fichier footer.php pour y mettre le footer
get_footer();

?>
