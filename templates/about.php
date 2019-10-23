<!-- About section -->
<div class="about-section">
	<div class="overlay"></div>
	<!-- card section -->
	<div class="card-section">
		<div class="container">
			<div class="row">
				
				<!-- single card  on affiche que les trois dernier article de Services-->
				<?php

				$args = array(
					'post_type' => 'services_page',
					'post_status' => 'publish',
					'category_name' => 'icon_services',
					'posts_per_page' => 3,
				);
				$arr_posts = new WP_Query($args);

				if ($arr_posts->have_posts()) :

					while ($arr_posts->have_posts()) :
						$arr_posts->the_post();
						?>
						
						<div class="col-md-4 col-sm-6">
							<div class="lab-card">
								<div class="icon">
								
								<i class="<?php the_field('icon'); ?>"></i>
									
								</div>
								<h2><?php the_title(); ?></h2>
								<p><?php the_content(); ?></p>
							</div>
						</div>
						
				<?php
					endwhile;
				endif; ?>
			</div>
		</div>
	</div>
	<!-- card section end-->


	<!-- About contant -->
	<div class="about-contant">
		<div class="container">
			<div class="section-title">
				<h2>Get in <span>the Lab</span> and discover the world</h2>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus. Donec maximus ipsum non ornare vporttitor porttitorestibulum. Sed libero nibh, feugiat at enim id, bibendum sollicitudin arcu.</p>
				</div>
				<div class="col-md-6">
					<p>Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices. Quisque porttitor porttitorlaoreet vel risus et luctus.</p>
				</div>
			</div>
			<div class="text-center mt60">
				<a href="" class="site-btn">Browse</a>
			</div>
			<!-- popup video -->
			<div class="intro-video">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<img src="<?php echo get_template_directory_uri(); ?>/img/video.jpg" alt="">
						<a href="https://www.youtube.com/watch?v=JgHfx2v9zOU" class="video-popup">
							<i class="fa fa-play"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- About section end -->