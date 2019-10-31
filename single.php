<?php /* Template Name: single page */ ?>
<?php
get_template_part('templates/header-page');
?>
<!-- Page header -->
<div class="page-top-section">
  <div class="overlay"></div>
  <div class="container text-right">
    <div class="page-info">
      <h2><?php the_title() ?></h2>


    </div>
  </div>
</div>
</div>


<?php while (have_posts()) : the_post(); ?>



  <!-- page section -->
  <div class="page-section spad">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-7 blog-posts">
          <!-- Single Post -->
          <div class="single-post">
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

                <?php echo get_the_term_list(get_the_ID(), 'tag_blog', ' ', ' '); ?>


              </div>
              <p><?php echo excerpt_blog(30); ?></p>
              <!-- <a href="blog-post.html" class="read-more">Read More</a> -->

            </div>
            <!-- Post Author -->
           <?php
           get_template_part('templates/about-author');
            ?>
            <!-- Post Comments -->
            <div class="comments">
              
              <h2>Comments (2)</h2>
              <ul class="comment-list">
                <li>
                  <div class="avatar">
                    <img src="img/avatar/01.jpg" alt="">
                  </div>
                  <div class="commetn-text">
                    <h3>Michael Smith | 03 nov, 2017 | Reply</h3>
                    <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. </p>
                  </div>
                </li>
                <li>
                  <div class="avatar">
                    <img src="img/avatar/02.jpg" alt="">
                  </div>
                  <div class="commetn-text">
                    <h3>Michael Smith | 03 nov, 2017 | Reply</h3>
                    <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. </p>
                  </div>
                </li>
              </ul>
            </div>
            <!-- Commert Form -->
            <!-- <div class="row">
              <div class="col-md-9 comment-from">
                <h2>Leave a comment</h2>
                <form class="form-class">
                  <div class="row">
                    <div class="col-sm-6">
                      <input type="text" name="name" placeholder="Your name">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="email" placeholder="Your email">
                    </div>
                    <div class="col-sm-12">
                      <input type="text" name="subject" placeholder="Subject">
                      <textarea name="message" placeholder="Message"></textarea>
                      <button class="site-btn">send</button>
                    </div>
                  </div>
                </form>
               
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-9 comment-from">
                <!-- <h2>Leave a comment</h2> -->
               
              
                <?php
                ob_start();
                $args = array( 'class_submit' => 'site-btn' );
                comment_form($args);
                echo str_replace('class="comment-form"','class="form-class"',ob_get_clean());
                ?>
              </div>
            </div>
          </div>
        </div>
        <!-- Sidebar area -->
        <?php get_template_part('templates-blog/sidebar-blog'); ?>
      </div>
    </div>
  </div>
  <!-- page section end-->

<?php endwhile; ?>

<?php
get_template_part('templates-services/newsletter');
get_footer();
?>