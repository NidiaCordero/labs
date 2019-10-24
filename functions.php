<?php
/**
 * Fonction qui va ajouter des scripts dynamiquement afin que l'on puisse les inclures dans le thème avec wp_head() et wp_footer()
 *
 * @return void
 */
function ajout_css_js()
{
  // Ajout des scripts css
  // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css');
  wp_enqueue_style('font-Oswald', "https://fonts.googleapis.com/css?family=Oswald:300,400,500,700%7CRoboto:300,400,700");
  wp_enqueue_style('flaticon', get_template_directory_uri() . '/css/flaticon.css');
  wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css');
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');
//   wp_enqueue_style('media', get_template_directory_uri() . '/css/media.css');
  wp_enqueue_style('styles', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
  // Ajout des scripts js
  // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
  wp_enqueue_script('jquery-perso', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', null, true);
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js',['jquery-perso'],null, true);
  wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/magnific-popup.min.js',['jquery-perso'], null, true);
  wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js',['jquery-perso'], null, true);
  wp_enqueue_script('circle-progress', get_template_directory_uri() . '/js/circle-progress.min.js',['jquery-perso'], null, true);
//   wp_enqueue_script('maps', get_template_directory_uri() . '/js/map.js',['jquery'],null, true);
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js',['jquery-perso'],null, true);
}



// Nous ajoutons un écouteur d'événements pour nous prévenir lorsque l'on peut ajouter des css et scripts.
// Cette écouteur va déclancher la fonction ajout_css_js()
// https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
add_action('wp_enqueue_scripts', 'ajout_css_js');

function register_main_menu()
{
  register_nav_menu('main-menu', 'Menu principal dans le header.');
}
add_action('after_setup_theme', 'register_main_menu');
 /**
 * Fonction qui ajoute des attributes au balise a des nav_menu
 *
 * @param [type] $att
 * @param [type] $item
 * @param [type] $args
 * @return void
 */
// ajoute active menu
 add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

function ajout_image_article()
{
  //Ajout de la fonctionnalité d'ajout d'image pour les posts pour ce thème ci
  add_theme_support('post-thumbnails');
  $test = 0;
}
// Ajout d'un écouteur d'événement pour activer les images mise en avant pour les post (article)
add_action('init', 'ajout_image_article'); 

 //pour les post temoignages on cache l editor car par besoin
add_action( 'init', function() {
    remove_post_type_support( 'temoignages', 'editor' );
}, 99);
 //pour les post team on cache l editor car par besoin
add_action( 'init', function() {
    remove_post_type_support( 'team', 'editor' );
}, 99);
// limite des extrait
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt) >= $limit) {
      array_pop($excerpt);
      $excerpt = implode(" ", $excerpt) . '...';
  } else {
      $excerpt = implode(" ", $excerpt);
  }

  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

  return $excerpt;
}

function content($limit) {
$content = explode(' ', get_the_content(), $limit);

if (count($content) >= $limit) {
    array_pop($content);
    $content = implode(" ", $content) . '...';
} else {
    $content = implode(" ", $content);
}

$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content); 
$content = str_replace(']]>', ']]&gt;', $content);

return $content;
}
?>