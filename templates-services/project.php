
	<div class="services-card-section spad">
		<div class="container">
			<div class="row">
				<!-- Single Card -->
    <!-- services card section-->
    <?php

	$args = array(
		'post_type' => 'project',
		'post_status' => 'publish',
		'posts_per_page' => 3,
	);
	$arr_posts = new WP_Query($args);

	if ($arr_posts->have_posts()) :

		while ($arr_posts->have_posts()) :
			$arr_posts->the_post();
			?>
				<div class="col-md-4 col-sm-6">
					<div class="sv-card">
						<div class="card-img">
                            <?php
                             $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                             echo '<img src="' . $featured_img_url .'" alt="">';
                             ?>
						
						</div>
						<div class="card-text">
							<h2><?php the_title();?></h2>
							<p><?php echo excerpt(18);?></p>
						</div>
					</div>
				</div>
				<!-- Single Card -->
			
    <?php
					endwhile;
				endif; ?>
				
			</div>
		</div>
    </div>
	<!-- services card section end-->