<!-- page section -->
<div class="page-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7 blog-posts">
                <!-- Post item -->
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'mon_blog',
                    'post_status' => 'publish',
                    'paged' => $paged,

                    'posts_per_page' => 5,
                );
                $arr_posts = new WP_Query($args);

                if ($arr_posts->have_posts()) :
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();

                        ?>

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



                                </div>
                                <p><?php echo excerpt_blog(30); ?></p>
                                <!-- <a href="blog-post.html" class="read-more">Read More</a> -->
                               
                            </div>
                        </div>
                        <!-- Post item -->

                <?php
                    endwhile;
                endif; ?>

                <!-- Pagination -->
                <div class="page-pagination">
                    <!-- <a class="active" href="">01.</a> -->
                    <a href=""> <?php
                                $big = 999999999;
                                echo paginate_links(array(
                                    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                                    'format' => '?paged=%#%',
                                    'current' => max(1, get_query_var('paged')),
                                    'total' => $loop->max_num_pages,
                                    'prev_text' => '&laquo;',
                                    'next_text' => '&raquo;'
                                ));
                                ?></a>


                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
            <!-- Sidebar area -->
            <?php get_template_part('templates-blog/sidebar-blog'); ?>
        </div>
    </div>
</div>
<!-- page section end-->