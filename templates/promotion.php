
	<!-- Promotion section -->
	<?php

$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'category_name' => 'newsletter',
	'posts_per_page' => 1,
);
$arr_posts = new WP_Query($args);

if ($arr_posts->have_posts()) :

	while ($arr_posts->have_posts()) :
		$arr_posts->the_post();
		?>
	<div class="promotion-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
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
					<p><?php echo excerpt(25); ?></p>
				</div>
				<div class="col-md-3">
					<div class="promo-btn-area">
					
						<?php
							$btn_name = get_field('btn_read_more');

							if (get_field('btn_read_more')) {
								echo '<a href="" class="site-btn btn-2">' . $btn_name . '</a>';
							} else {
								echo ' ';
							}
							?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
				endwhile;
			endif; ?>
	<!-- Promotion section end-->