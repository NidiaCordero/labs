<!-- Services section -->
<?php

$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'category_name' => 'icon_services',
	'posts_per_page' => 1,
);
$arr_posts = new WP_Query($args);

if ($arr_posts->have_posts()) :

	while ($arr_posts->have_posts()) :
		$arr_posts->the_post();
		?>
		<div class="services-section spad">
			<div class="container">
				<div class="section-title dark">
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
		<div class="row">
			<!-- single service -->
			<?php

			$args = array(
				'post_type' => 'services_page',
				'post_status' => 'publish',
				'category_name' => 'icon_services',
				'posts_per_page' => 15,
			);
			$arr_posts = new WP_Query($args);

			if ($arr_posts->have_posts()) :

				while ($arr_posts->have_posts()) :
					$arr_posts->the_post();
					?>
					<div class="col-md-4 col-sm-6">
						<div class="service">
							<div class="icon">
								<i class="<?php the_field('icon'); ?>"></i>
							</div>
							<div class="service-text">
								<h2><?php the_title(); ?></h2>
								<p><?php echo excerpt(18); ?></p>
							</div>
						</div>
					</div>


			<?php
				endwhile;
			endif; ?>
		</div>
		<?php

		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'category_name' => 'icon_services',
			'posts_per_page' => 1,
		);
		$arr_posts = new WP_Query($args);

		if ($arr_posts->have_posts()) :

			while ($arr_posts->have_posts()) :
				$arr_posts->the_post();
				?>
				<div class="text-center">

					<?php
							$btn_name = get_field('btn_read_more');

							if (get_field('btn_read_more')) {
								echo '<a href="" class="site-btn">' . $btn_name . '</a>';
							} else {
								echo ' ';
							}
							?>
				</div>
		<?php
			endwhile;
		endif; ?>
			</div>

		</div>
		<!-- services section end -->