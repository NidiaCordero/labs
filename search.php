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
                    <?php get_template_part('/templates-blog/post-loop.php'); ?>
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