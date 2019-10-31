 <!-- Post Author -->
 <div class="author">
              <div class="avatar">
              <?php echo get_avatar( get_the_author_meta( 'ID' ), 117 ); ?>
              </div>
              <div class="author-info">
                <h2><?php the_author(); ?> <span>Author</span></h2>
                <p><?php esc_textarea(the_author_meta('description')); ?></p>
              </div>
</div>