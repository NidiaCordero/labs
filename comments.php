<div id="comments" class="comments-area">
    <h2 class="comments-title">
        <?php
       $comments_number = get_comments_number();
   ?>
   <h3 class="mb-5"><?php echo $comments_number ;?> Comments on <?php the_title();?></h3>
    <ul class="comment-list">
        <?php
      wp_list_comments( 'type=comment&callback=mytheme_comment' ); 
       ?>
    </ul>
</div>