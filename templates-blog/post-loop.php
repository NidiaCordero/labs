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

        <?php the_tags('');
                                        ?>

            <!-- Post item -->
        </div>
        <p><?php echo excerpt_blog(30); ?></p>
    </div>
</div>