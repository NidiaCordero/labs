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
                                <p><?php echo excerpt(30); ?></p>
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
            <div class="col-md-4 col-sm-5 sidebar">
                <!-- Single widget -->
                <div class="widget-item">
                    <form action="#" class="search-form">
                        <input type="text" placeholder="Search">
                        <button class="search-btn"><i class="flaticon-026-search"></i></button>
                    </form>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">Categories</h2>
                    <ul>
                        <li><a href="#">Vestibulum maximus</a></li>
                        <li><a href="#">Nisi eu lobortis pharetra</a></li>
                        <li><a href="#">Orci quam accumsan </a></li>
                        <li><a href="#">Auguen pharetra massa</a></li>
                        <li><a href="#">Tellus ut nulla</a></li>
                        <li><a href="#">Etiam egestas viverra </a></li>
                    </ul>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">Instagram</h2>
                    <ul class="instagram">
                        <li><img src="img/instagram/1.jpg" alt=""></li>
                        <li><img src="img/instagram/2.jpg" alt=""></li>
                        <li><img src="img/instagram/3.jpg" alt=""></li>
                        <li><img src="img/instagram/4.jpg" alt=""></li>
                        <li><img src="img/instagram/5.jpg" alt=""></li>
                        <li><img src="img/instagram/6.jpg" alt=""></li>
                    </ul>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">Tags</h2>
                    <ul class="tag">
                        <li><a href="">branding</a></li>
                        <li><a href="">identity</a></li>
                        <li><a href="">video</a></li>
                        <li><a href="">design</a></li>
                        <li><a href="">inspiration</a></li>
                        <li><a href="">web design</a></li>
                        <li><a href="">photography</a></li>
                    </ul>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">Quote</h2>
                    <div class="quote">
                        <span class="quotation">‘​‌‘​‌</span>
                        <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. Sed lacinia turpis at ultricies vestibulum.</p>
                    </div>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">Add</h2>
                    <div class="add">
                        <a href=""><img src="img/add.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page section end-->