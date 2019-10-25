<!-- newsletter section -->
<?php

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'newsletter',
    'posts_per_page' => 1,
);
$arr_posts = new WP_Query($args);

if ($arr_posts->have_posts()) :

    while ($arr_posts->have_posts()) :
        $arr_posts->the_post();
        ?>
        <div class="newsletter-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php
                                $before_title = get_field('titre_before');
                                $span_title = get_field('span_title');
                                $titre_after = get_field('titre_after');



                                if (get_field('titre_before')) {
                                    echo '<h2>' . $before_title . '&nbsp <span>' . $span_title . '  </span>' . '&nbsp' . $titre_after . '</h2>';
                                } else {
                                    ?> <h2> <?php the_title(); ?> </h2>
                        <?php
                                }
                                ?>
                    </div>
                    <div class="col-md-9">
                        <!-- newsletter form -->
                        <form class="nl-form">
                            <input type="text" placeholder="<?php the_content(); ?>">
                            <?php
                                    $btn_name = get_field('btn_read_more');

                                    if (get_field('btn_read_more')) {
                                        echo '<button class="site-btn btn-2">' . $btn_name . '</button>';
                                    } else {
                                        echo ' ';
                                    }
                                    ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter section end-->
<?php
    endwhile;
endif; ?>