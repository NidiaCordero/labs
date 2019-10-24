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
			<!-- on va check si le titre personnalisé existe : on affiche si non on prend le titre de l'article -->
			<?php

			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'category_name' => 'header_intro',
				'posts_per_page' => 1,
			);
			$arr_posts = new WP_Query($args);

			if ($arr_posts->have_posts()) :

				while ($arr_posts->have_posts()) :
					$arr_posts->the_post();
					?>

					<div class="section-title">
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
					<div class="row">
						<div class="col-md-12">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="text-center mt60">
						<?php
								$btn_name = get_field('btn_read_more');

								if (get_field('btn_read_more')) {
									echo '<a href="" class="site-btn">' . $btn_name . '</a>';
								} else {
									echo ' ';
								}
								?>

					</div>
					<!-- popup video -->
					<div class="intro-video">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<?php
										$lien_video = get_field('lien_video');
										$cover_image = get_field('cover_video');
										$icon_video = get_field('icon_video');

										if (get_field('cover_video')) {
											echo '<img src="' . $cover_image . '" alt="">';
											echo '<a href=" ' . $lien_video . '" class="video-popup">
									<i class="' . $icon_video . '"></i> </a>';
										} else {
											echo ' ';
										};

										?>

							</div>
						</div>
					</div>
			<?php
				endwhile;
			endif; ?>

		</div>
	</div>
</div>
<!-- About section end -->