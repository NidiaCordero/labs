<?php
/*
Template Name: home
Template Post Type: home page
*/
 ?>

<?php 
get_header();
get_template_part('templates/about');
get_template_part('templates/banner');
get_template_part('templates/testimonial');
get_template_part('templates/services');
get_template_part('templates/team');
get_template_part('templates/promotion');
get_template_part('templates/contact');

// Ajout d'un fichier footer.php pour y mettre le footer
get_footer();

?>
