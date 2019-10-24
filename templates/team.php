<?php

$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'category_name' => 'team',
	'posts_per_page' => 1,
);
$arr_posts = new WP_Query($args);

if ($arr_posts->have_posts()) :

	while ($arr_posts->have_posts()) :
		$arr_posts->the_post();
		?>
	<!-- Team Section -->
	<div class="team-section spad">
		<div class="overlay"></div>
		<div class="container">
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
			<?php
			endwhile;
		endif; ?>
			<div class="row">
				<!-- single member -->
				<?php

			$args = array(
				'post_type' => 'team',
				'post_status' => 'publish',
				'category_name' => 'team',
				'posts_per_page' =>3,
			);
			$arr_posts = new WP_Query($args);

			if ($arr_posts->have_posts()) :

				while ($arr_posts->have_posts()) :
					$arr_posts->the_post();
					?>
				<div class="col-sm-4">
					<div class="member">
						<img src="<?php echo get_field('profil_photo') ?>" alt="">
						<h2><?php echo get_field('name')?></h2>
						<h3><?php echo get_field('poste')?></h3>
					</div>
				</div>
				<?php
				endwhile;
			endif; ?>
				<!-- single member -->
			
			</div>
		</div>
	</div>
	<!-- Team Section end-->