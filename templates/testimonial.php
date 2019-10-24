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
							<?php
				endwhile;
			endif; ?>
							<div class="owl-carousel" id="testimonial-slide">
								<!-- single testimonial -->
						<?php

							$args = array(
								'post_type' => 'temoignages',
								'post_status' => 'publish',
								'category_name' => 'temoignages',
								'posts_per_page' => 10,
							);
							$arr_posts = new WP_Query($args);

							if ($arr_posts->have_posts()) :

								while ($arr_posts->have_posts()) :
									$arr_posts->the_post();
									?>
								<div class="testimonial">
									<span>‘​‌‘​‌</span>
									<?php
								$contenu = get_field('temoi_contenu');
								$nom = get_field('prenom_nom');
								$poste = get_field('poste');
								$avatar = get_field('avatar');
								if (get_field('temoi_contenu')) {
									echo '<p>'.$contenu.'</p>';

								
									?>
									<div class="client-info">
										<div class="avatar">
											<img src="<?php echo $avatar ?>" alt="">
										</div>
										<div class="client-name">
											<h2><?php echo $nom ?></h2>
											<p><?php echo $poste ?></p>
										</div>
									</div>
									<?php 
								}
								?>
								</div>
							
								<?php
					endwhile;
				endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Testimonial section end-->