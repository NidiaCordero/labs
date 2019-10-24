	<!-- Testimonial section -->

	<?php

	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'category_name' => 'temoignages',
		'posts_per_page' => 1,
	);
	$arr_posts = new WP_Query($args);

	if ($arr_posts->have_posts()) :

		while ($arr_posts->have_posts()) :
			$arr_posts->the_post();
			?>
			<div class="testimonial-section pb100">
				<?php
						$image2 = get_field('img_temoin');
						if (get_field('img_temoin')) { 
					echo '<div class="test-overlay" style="background-image:url('.$image2.')"></div>';
				 } else {
					 echo 'no img';
				 }
						?>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-4">

							<div class="section-title left">
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
							<div class="owl-carousel" id="testimonial-slide">
								<!-- single testimonial -->
								<div class="testimonial">
									<span>‘​‌‘​‌</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
									<div class="client-info">
										<div class="avatar">
											<img src="<?php echo get_template_directory_uri(); ?>/img/avatar/01.jpg" alt="">
										</div>
										<div class="client-name">
											<h2>Michael Smith</h2>
											<p>CEO Company</p>
										</div>
									</div>
								</div>
								<!-- single testimonial -->
								<div class="testimonial">
									<span>‘​‌‘​‌</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
									<div class="client-info">
										<div class="avatar">
											<img src="<?php echo get_template_directory_uri(); ?>/img/avatar/02.jpg" alt="">
										</div>
										<div class="client-name">
											<h2>Michael Smith</h2>
											<p>CEO Company</p>
										</div>
									</div>
								</div>
								<!-- single testimonial -->
								<div class="testimonial">
									<span>‘​‌‘​‌</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
									<div class="client-info">
										<div class="avatar">
											<img src="<?php echo get_template_directory_uri(); ?>/img/avatar/01.jpg" alt="">
										</div>
										<div class="client-name">
											<h2>Michael Smith</h2>
											<p>CEO Company</p>
										</div>
									</div>
								</div>
								<!-- single testimonial -->
								<div class="testimonial">
									<span>‘​‌‘​‌</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
									<div class="client-info">
										<div class="avatar">
											<img src="<?php echo get_template_directory_uri(); ?>/img/avatar/02.jpg" alt="">
										</div>
										<div class="client-name">
											<h2>Michael Smith</h2>
											<p>CEO Company</p>
										</div>
									</div>
								</div>
								<!-- single testimonial -->
								<div class="testimonial">
									<span>‘​‌‘​‌</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
									<div class="client-info">
										<div class="avatar">
											<img src="<?php echo get_template_directory_uri(); ?>/img/avatar/01.jpg" alt="">
										</div>
										<div class="client-name">
											<h2>Michael Smith</h2>
											<p>CEO Company</p>
										</div>
									</div>
								</div>
								<!-- single testimonial -->
								<div class="testimonial">
									<span>‘​‌‘​‌</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
									<div class="client-info">
										<div class="avatar">
											<img src="<?php echo get_template_directory_uri(); ?>/img/avatar/02.jpg" alt="">
										</div>
										<div class="client-name">
											<h2>Michael Smith</h2>
											<p>CEO Company</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				endwhile;
			endif; ?>
			<!-- Testimonial section end-->