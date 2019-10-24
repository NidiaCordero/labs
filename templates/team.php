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
				<div class="col-sm-4">
					<div class="member">
						<img src="<?php echo get_template_directory_uri(); ?>/img/team/1.jpg" alt="">
						<h2>Christinne Williams</h2>
						<h3>Project Manager</h3>
					</div>
				</div>
				<!-- single member -->
				<div class="col-sm-4">
					<div class="member">
						<img src="<?php echo get_template_directory_uri(); ?>/img/team/2.jpg" alt="">
						<h2>Christinne Williams</h2>
						<h3>Junior developer</h3>
					</div>
				</div>
				<!-- single member -->
				<div class="col-sm-4">
					<div class="member">
						<img src="<?php echo get_template_directory_uri(); ?>/img/team/3.jpg" alt="">
						<h2>Christinne Williams</h2>
						<h3>Digital designer</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Team Section end-->