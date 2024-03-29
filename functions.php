<?php

require_once(get_template_directory() . '/includes/footer/costum-footer.php');
require_once(get_template_directory() . '/includes/footer/costum-logo.php');


?>
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
  wp_enqueue_script('maps', get_template_directory_uri() . '/js/map.js',['jquery'],null, true);
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js',['jquery-perso'],null, true);
  
}



// Nous ajoutons un écouteur d'événements pour nous prévenir lorsque l'on peut ajouter des css et scripts.
// Cette écouteur va déclancher la fonction ajout_css_js()
// https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
add_action('wp_enqueue_scripts', 'ajout_css_js');

function register_main_menu()
{
  register_nav_menu('main-menu', 'Menu principal dans le header.');
  register_nav_menu('second_menu', 'Menu  secondaire le services.');
  register_nav_menu('third_menu', 'Menu third blog page.');

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
      $excerpt = implode(" ", $excerpt) . '... ';
  } else {
      $excerpt = implode(" ", $excerpt);
  }

  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

  return $excerpt;
}
// limite des extrait blog
function excerpt_blog($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt) >= $limit) {
      array_pop($excerpt);
      $excerpt = implode(" ", $excerpt) . ' <br> <a href="'. get_permalink($post->ID) . '" class="read-more">' . 'Read More' . '</a>';
  } else {
      $excerpt = implode(" ", $excerpt);
  }

  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

  return $excerpt;
}




// ajout sidebar gauche page blog
function my_custom_sidebar() {
  register_sidebar(
      array (
          'name' => __( 'sidebar blog', 'Sidebar gauche page blog' ),
          'id' => 'custom-side-bar',
          'description' => __( 'Custom Sidebar', 'your-theme-domain' ),
          'before_widget' => '<div class="widget-content">',
          'after_widget' => "</div><br><br>",
          'before_title' => '<h3 class="widget-title">',
          'after_title' => '</h3>',
      )
  );
}
add_action( 'widgets_init', 'my_custom_sidebar' );


/*
Plugin Name: List Categories Widget
Plugin URI: https://pippinsplugins.com/list-categories-widget-plugin-and-tutorial
Description: Provides a better category list widget, includes support for custom taxonomies
Version: 1.0
Author: Pippin Williamson
Author URI: http://184.173.226.218/~pippin
*/
 
/**
 * List Categories Widget Class
 */
class list_categories_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function list_categories_widget() {
        parent::WP_Widget(false, $name = 'List Categories');
    }
 
	/** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) {
		extract( $args );
		$title 		= apply_filters('widget_title', $instance['title']); // the widget title
		$number 	= $instance['number']; // the number of categories to show
		$taxonomy 	= $instance['taxonomy']; // the taxonomy to display
 
		$args = array(
			'number' 	=> $number,
			'taxonomy'	=> $taxonomy
		);
 
		// retrieves an array of categories or taxonomy terms
		$cats = get_categories($args);
		?>
			  <?php echo $before_widget; ?>
				  <?php if ( $title ) { echo $before_title . $title . $after_title; } ?>
						<ul>
							<?php foreach($cats as $cat) { ?>
								<li><a href="<?php echo get_term_link($cat->slug, $taxonomy); ?>" title="<?php sprintf( __( "View all posts in %s" ), $cat->name ); ?>"><?php echo $cat->name; ?></a></li>
							<?php } ?>
						</ul>
			  <?php echo $after_widget; ?>
		<?php
	}
 
	/** @see WP_Widget::update -- do not rename this */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		$instance['taxonomy'] = $new_instance['taxonomy'];
		return $instance;
	}
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
 
        $title 		= esc_attr($instance['title']);
        $number		= esc_attr($instance['number']);
        $exclude	= esc_attr($instance['exclude']);
        $taxonomy	= esc_attr($instance['taxonomy']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of categories to display'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
		<p>	
			<label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Choose the Taxonomy to display'); ?></label> 
			<select name="<?php echo $this->get_field_name('taxonomy'); ?>" id="<?php echo $this->get_field_id('taxonomy'); ?>" class="widefat"/>
				<?php
				$taxonomies = get_taxonomies(array('public'=>true), 'names');
				foreach ($taxonomies as $option) {
					echo '<option id="' . $option . '"', $taxonomy == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				?>
			</select>		
		</p>
        <?php
    }
 
 
} // end class list_categories_widget
add_action('widgets_init', create_function('', 'return register_widget("list_categories_widget");'));


// _________
add_theme_support( 'html5', array( 'search-form' ) );
// ----

function my_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . home_url( '/' ) . '" >
 
  
  <input type="text"  placeholder="Search" value="' . get_search_query() . '" name="s" id="s" />
  <input type="submit" id="searchsubmit" class="search-btn" value="'. esc_attr__( '<?php echo <i class="flaticon-026-search"></i> ?>' ) .'" />
  
  </form>';

  return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );




add_filter('wp_generate_tag_cloud', 'myprefix_tag_cloud',10,1);

function myprefix_tag_cloud($tag_string){
  return preg_replace('/style=("|\')(.*?)("|\')/','',$tag_string);
}



function perso_wp_tag_cloud_filter($return, $args)
{
  return '<ul class="tag">'.$return.'</ul> ';
}
 
add_filter('wp_tag_cloud','perso_wp_tag_cloud_filter', 10, 2);
  
// add_filter( 'wp_generate_tag_cloud_data', function( $tag_data )
// {
//     return array_map ( 
//         function ( $item )
//         {
//             $item['class'] .= ' btn btn-xs btn-primary';
//             return $item;
//         }, 
//         (array) $tag_data 
//     );

// } );

add_filter( 'wp_tag_cloud', 'no_follow_tag_cloud_links' );
function no_follow_tag_cloud_links( $return ) {
	$return = str_replace('<a', '<li><a ', $return );
	return $return;
}
function pagination_bar( $custom_query ) {

  $total_pages = $custom_query->max_num_pages;
  $big = 999999999; // need an unlikely integer

  if ($total_pages > 1){
      $current_page = max(1, get_query_var('paged'));

      echo paginate_links(array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format' => '?paged=%#%',
          'current' => $current_page,
          'total' => $total_pages,
      ));
  }
}




// ------
// commentaires
// -----------
// comment form fields re-defined:
  add_filter( 'comment_form_default_fields', 'mo_comment_fields_custom_html' );
  function mo_comment_fields_custom_html( $fields ) {
    // first unset the existing fields:
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    // then re-define them as needed:
    $fields = [
      'author' => ' <div class="col-sm-6">' . '<label>' . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
      '<input id="author" name="author" type="text" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></div>',
      'email'  => '<div class="col-sm-6"><label for="email" > ' . __( '', 'textdomain'  ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
      '<input id="email" name="email"  placeholder="email"' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>',
      'url'    => '  <div class="col-sm-12"><label for="url">' . __( '', 'textdomain'  ) . '</label> ' .
      '<input id="url" name="url"  placeholder="subject"' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></div>',
      'comment_field' => '  <div class="col-sm-12"><label for="comment">' . _x( '', 'noun', 'textdomain' ) . '</label> ' .
        '<textarea id="comment" name="comment" cols="45" rows="8"  placeholder="content" maxlength="65525" aria-required="true" required="required"></textarea></div>',
    ];
    // done customizing, now return the fields:
    return $fields;
  }
  // remove default comment form so it won't appear twice
  add_filter( 'comment_form_defaults', 'mo_remove_default_comment_field', 10, 1 ); 
  function mo_remove_default_comment_field( $defaults ) {
     if ( isset( $defaults[ 'comment_field' ] ) ) { 
       $defaults[ 'comment_field' ] = ''; 
      } return $defaults;
     }
     function mytheme_comment($comment, $args, $depth) {
      if ( 'div' === $args['style'] ) {
          $tag       = 'div';
          $add_below = 'comment';
      } else {
          $tag       = 'li';
          $add_below = 'div-comment';
      }?>
      <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
      if ( 'div' != $args['style'] ) { ?>
          <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
      } ?>
          <div class="comment-author vcard"><?php 
              if ( $args['avatar_size'] != 0 ) {
                  echo get_avatar( $comment, $args['avatar_size'] ); 
              } 
              printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
          </div><?php 
          if ( $comment->comment_approved == '0' ) { ?>
              <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
          } ?>
          <div class="comment-meta commentmetadata">
              <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
                  /* translators: 1: date, 2: time */
                  printf( 
                      __('%1$s at %2$s'), 
                      get_comment_date(),  
                      get_comment_time() 
                  ); ?>
              </a><?php 
              edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
          </div>
  
          <?php comment_text(); ?>
  
          <div class="reply"><?php 
                  comment_reply_link( 
                      array_merge( 
                          $args, 
                          array( 
                              'add_below' => $add_below, 
                              'depth'     => $depth, 
                              'max_depth' => $args['max_depth'] 
                          ) 
                      ) 
                  ); ?>
          </div><?php 
      if ( 'div' != $args['style'] ) : ?>
          </div><?php 
      endif;
  }

?>