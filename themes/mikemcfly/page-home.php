<?php get_header(); ?>
	
	<?php if(have_posts()): the_post(); ?>
		<section id="intro" style="height: 709px; background: url(<?php echo get_field('main_image'); ?>) no-repeat center center; background-size: cover;">
			<h1><?php echo get_field('headline'); ?></h1>
			<script type="text/javascript">
				if($(window).width() < 767) {
					var words = $("#intro h1").text().split(" ");
					$("#intro h1").empty();
					$.each(words, function(i, v) {
					    $("#intro h1").append($("<span>").text(v));
					});
				}
			</script>
			<div class="notification">
				<span>This website uses cookies.</span>
				<a href="#" id="close">Accept</a>
				<a href="<?php bloginfo('url'); ?>/privacy-policy">See Policy</a>
			</div>
		</section>

		<style type="text/css">
			@media (max-width: 767px) {
				section#intro {
					height: 803px !important;
					background: url(<?php echo get_field('main_image_mobile'); ?>) no-repeat center !important;
					background-size: cover;
				}
			}
		</style>

		<section id="events">
			<div class="container">
				<h2 class="section-title">Upcoming Events</h2>

				<div class="row">
					<?php 
						$args = array(
							'post_type' => 'events',
							'posts_per_page' => 12
						);

						$the_query = new WP_Query( $args ); ?>

						<?php if ( $the_query->have_posts() ) : ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="col-sm-4 item">
									<div class="top">
										<h3 class="ev-title"><?php echo the_title(); ?></h3>
										<div class="date"><?php echo get_field('date'); ?></div>
									</div>
									<div class="event-content">
										<?php echo get_field('copy'); ?>
									</div>


									<div class="links">
										<?php if(!empty(get_field('tickets_link'))): ?>
											<a target="_blank" href="<?php echo get_field('tickets_link'); ?>" class="c-btn yellow">Buy Tickets</a>
										<?php endif; ?>
										<?php if(!empty(get_field('lame_instagram_link'))): ?>
											<a target="_blank" href="<?php echo get_field('tickets_link'); ?>" class="c-btn black">Lame Instagram</a>
										<?php endif; ?>
										<?php if(!empty(get_field('read_here'))): ?>
											<a target="_blank" href="<?php echo get_field('read_here'); ?>" class="c-btn yellow">Read Here</a>
										<?php endif; ?>
										<?php if(!empty(get_field('listen_here'))): ?>
											<a target="_blank" href="<?php echo get_field('listen_here'); ?>" class="c-btn black">Listen Here</a>
										<?php endif; ?>
									</div>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php else : ?>
							<p><?php esc_html_e( 'Sorry, no events there.' ); ?></p>
						<?php endif; ?>
				</div>
			</div>
		</section>

		<section id="about">
			<div class="container">
				<h2 class="headline"><?php echo get_field('headline_about'); ?></h2>

				<div class="copy">
					<?php echo get_field('copy_about'); ?>
				</div>

				<div class="excerpt">
					<?php echo get_field('excerpt_about'); ?>
				</div>
			</div>
		</section>

		<section id="mentor">
			<div class="container">
				<h2 class="section-title"><?php echo get_field('headline_program'); ?></h2>
			</div>
			<div class="copy">
				<?php echo get_field('copy_program'); ?>
			</div>
		</section>

		<section id="testimonials">
			<div class="container">
				<h2 class="section-title">Testimonials</h2>

				<div class="row">
					<?php 
						$args = array(
							'post_type' => 'testimonials',
							'posts_per_page' => -1
						);

						$the_query = new WP_Query( $args ); ?>

						<?php if ( $the_query->have_posts() ) : ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="col-sm-4 item">
									<h3><?php echo the_title(); ?></h3>

									<div class="thumb">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>">
									</div>

									<div class="quote"><?php echo get_field('quote'); ?></div>

									<div class="copy"><?php echo get_field('copy'); ?></div>

									<div class="links">
										<?php if(!empty(get_field('soundcloud_link'))): ?>
											<a target="_blank" href="<?php echo get_field('soundcloud_link'); ?>" class="c-btn yellow">Soundcloud</a>
										<?php endif; ?>
										<?php if(!empty(get_field('instagram_link'))): ?>
											<a target="_blank" href="<?php echo get_field('instagram_link'); ?>" class="c-btn black">Instagram</a>
										<?php endif; ?>
									</div>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php else : ?>
							<p><?php esc_html_e( 'Sorry, no events there.' ); ?></p>
						<?php endif; ?>
				</div>
			</div>
		</section>

		<section id="production-services">
			<div class="container">
				<h2 class="section-title"><?php echo get_field('headline_services'); ?></h2>

				<div class="copy"><?php echo get_field('copy'); ?></div>
			</div>
		</section>

		<section id="faq">
			<div class="container">
				<?php echo get_field('copy_faq'); ?>
			</div>
		</section>

		<section id="contact">
			<div class="container">
				<h2 class="section-title"><?php echo get_field('headline_contact'); ?></h2>

				<div class="copy">
					<?php echo get_field('copy_contact'); ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

<?php get_footer(); ?>