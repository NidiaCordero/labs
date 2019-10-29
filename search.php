<?php /* Template Name: search page */ ?>

<?php
get_template_part('templates/header-page');
?>

<div class="page-section spad">
    <div class="container">
        <div class="row">
            <?php
            global $query_string;
            $query_args = explode("&", $query_string);
            $search_query = array();

            foreach ($query_args as $key => $string) {
                $query_split = explode("=", $string);
                $search_query[$query_split[0]] = urldecode($query_split[1]);
            } // foreach

            $the_query = new WP_Query($search_query);
            if ($the_query->have_posts()) :
                ?>
                <!-- the loop -->
                <div class="col-md-8 col-sm-7 blog-posts">

                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
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

                                <?php echo get_the_term_list( get_the_ID(), 'tag_blog', '', ' ' ); ?>

                                    <!-- Post item -->
                                </div>
                                <p><?php echo excerpt_blog(30); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
                <?php get_template_part('templates-blog/sidebar-blog'); ?>

        </div>

        <!-- end -->
        <?php wp_reset_postdata(); ?>
    </div>
</div>

<!-- end of the loop -->


<?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php
get_footer();

?>