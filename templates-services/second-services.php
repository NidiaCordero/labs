<!-- features section -->
<div class="team-section spad">
    <div class="overlay"></div>
    <div class="container">
        <?php

        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => 'services-second',
            'posts_per_page' => 1,
        );
        $arr_posts = new WP_Query($args);

        if ($arr_posts->have_posts()) :

            while ($arr_posts->have_posts()) :
                $arr_posts->the_post();
                ?>
                <div class="section-title">
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

        <?php
            endwhile;
        endif; ?>
        <div class="row">
            <div class="col-md-4 col-sm-4 features">
        <?php
				query_posts(array('orderby' => 'rand', 'post_type' => 'services_page', 'category_name' => 'icon_services', 'showposts' => 3));
				if (have_posts()) :
					while (have_posts()) : the_post(); ?>
                    <!-- feature item -->
                        <div class="icon-box light left">
                            <div class="service-text">
                                <h2><?php the_title(); ?></h2>
                                <p><?php echo excerpt(40); ?></p>
                            </div>
                            <div class="icon">
                                <i class="<?php the_field('icon'); ?>"></i>
                            </div>
                        </div>


                    <?php endwhile;

endif; ?>
                    </div>

                    <!-- Devices -->
            <?php

            $args = array(
                'post_type' => 'services_page',
                'post_status' => 'publish',
                'category_name' => 'image-second-services',
                'posts_per_page' => 1,

            );
            $arr_posts = new WP_Query($args);

            if ($arr_posts->have_posts()) :

                while ($arr_posts->have_posts()) :
                    $arr_posts->the_post();
                    ?>
                    <div class="col-md-4 col-sm-4 devices">
                        <div class="text-center">
                            <?php
                                    $cover_second = get_field('img_second_services');
                                    if (get_field('img_second_services')) {
                                        echo '<img src="' . $cover_second . '" alt="">';
                                    }

                                    ?>

                        </div>
                    </div>
            <?php
                endwhile;
            endif; ?>
            <!-- feature item -->
                    <div class="col-md-4 col-sm-4 features">
            <?php
				query_posts(array('orderby' => 'rand', 'post_type' => 'services_page', 'category_name' => 'icon_services', 'showposts' => 3));
				if (have_posts()) :
					while (have_posts()) : the_post(); ?>
                        <div class="icon-box light">
                            <div class="icon">
                                <i class="flaticon-037-idea"></i>
                            </div>
                            <div class="service-text">
                                <h2>Get in the lab</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
                            </div>
                       
                <!-- feature item -->



                    
        </div>
                        <?php endwhile;
                    endif; ?>
                    </div>
        </div>
        <div class="text-center mt100">
            <a href="" class="site-btn">Browse</a>
        </div>
    </div>
</div>
<!-- features section end-->