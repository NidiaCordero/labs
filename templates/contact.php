<?php

$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'category_name' => 'contact',
	'posts_per_page' => 1,
);
$arr_posts = new WP_Query($args);

if ($arr_posts->have_posts()) :

	while ($arr_posts->have_posts()) :
		$arr_posts->the_post();
		?>
		<!-- Contact section -->
		<div class="contact-section spad fix">
			<div class="container">
				<div class="row">
					<!-- contact info -->
					<div class="col-md-5 col-md-offset-1 contact-info col-push">
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
						<p><?php echo excerpt(40); ?></p>
						<h3 class="mt60"><?php the_field('name_office'); ?></h3>
						<p class="con-item"><?php the_field('adress_1'); ?><br> <?php the_field('adress_2'); ?> </p>
						<p class="con-item"><?php the_field('phone'); ?></p>
						<p class="con-item"><?php the_field('mail_perso'); ?></p>
					</div>
					<!-- contact form -->
					<div class="col-md-6 col-pull">
						<form class="form-class" id="con_form">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" name="name" placeholder="<?php the_field('placeholder_name'); ?>">
								</div>
								<div class="col-sm-6">
									<?php the_field('placeholder_mail'); ?>
								</div>
								<div class="col-sm-12">
									<input type="text" name="subject" placeholder="<?php the_field('placeholder_name'); ?>">
									<textarea name="message" placeholder="<?php the_field('placeholder_subject'); ?>"></textarea>

									<?php
											$btn_name = get_field('btn_read_more');

											if (get_field('btn_read_more')) {
												echo '<button class="site-btn">' . $btn_name . '</button>';
											} else {
												echo ' ';
											}
											?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
<?php
	endwhile;
endif; ?>
<!-- Contact section end-->