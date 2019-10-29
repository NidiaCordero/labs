<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'maps',
    'paged' => $paged,

    'posts_per_page' => 1,
);
$arr_posts = new WP_Query($args);

if ($arr_posts->have_posts()) :
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();

        ?>


        <!-- Google map -->
        <div class="map" id="map-area">
            <?php the_content(); ?>
            
        </div>
<?php
    endwhile;
endif; ?>