<?php
/**
 * Homepage
 */

get_header();

$hero_quad = get_field('gbhem_homepage_hero_quad', 'option');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<div class="gbhem-homepage-hero">
			<div class="container-fluid pl-0 pr-0">
				<div class="row ml-0 mr-0">
				    <div class="col-xl-7 pl-0 pr-0 pr-lg-1 pb-lg-1">
					    <div class="gbhem-homepage-hero-large" style="background-image: url(<?php the_field('gbhem_homepage_large_hero_image', 'option'); ?>);">
						  	<?php if (get_field('homepage_hero_video', 'option')): ?>
									<div class="covervid-wrapper">
										<video class="covervid-video" autobuffer playsinline autoplay muted loop poster="<?php the_field('gbhem_homepage_large_hero_image', 'option'); ?>">
											<source src="<?php the_field('homepage_hero_video', 'option'); ?>" type="video/mp4">
										</video>
									</div>
								<?php endif; ?>
								<?php if (get_field('homepage_hero_link', 'option') !== ''): ?>
									<a id="gbhem-hero-link" href="<?php the_field('homepage_hero_link', 'option'); ?>"><div></div></a>
								<?php endif; ?>
								<?php if (get_field('hide_homepage_overlay', 'option') != true): ?>
									<div class="gbhem-overlay">
										<?php if (get_field('homepage_hero_video', 'option') == ''): ?>
											<h3 id="HeroHeadline"><?php the_field('gbhem_homepage_large_hero_text', 'option'); ?></h3>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<?php if(get_field('homepage_video_id','options')!==''): ?>
									<a href="#" class="js-modal-btn" data-video-id="<?php the_field('homepage_video_id','options'); ?>"><i class="far fa-play-circle"></i></a>
								<?php endif; ?>
					    </div>
				    </div>

				    <div class="col-xl-5 px-0 mt-1 mt-lg-0">
							<div class="row ml-0 mr-0">
								<div class="col-sm-6 mr-0 ml-0 pr-0 pl-0 pr-sm-1">
									<div class="gbhem-homepage-hero-small flip-box">
										<div class="flip-box-inner">
											<div class="front flip-box-front" style="background-image: url(<?php echo $hero_quad['gbhem_homepage_hero_quad_one_image']['url']; ?>);">
												<div class="gbhem-overlay"><h4><?php echo $hero_quad['gbhem_homepage_hero_quad_one_header']; ?></h4></div>
											</div>
											<div class="back flip-box-back" style="background-color: <?php echo $hero_quad['gbhem_homepage_hero_quad_one_flipped_background_color']; ?>">
												<h4><?php echo $hero_quad['gbhem_homepage_hero_quad_one_flipped_header']; ?></h4>
												<p><?php echo $hero_quad['gbhem_homepage_hero_quad_one_flipped_text']; ?></p>
												<a class="gbhem-homepage-hero-button" href="<?php echo ($hero_quad['gbhem_homepage_hero_quad_one_flipped_button_url_external'] ) ? $hero_quad['gbhem_homepage_hero_quad_one_flipped_button_url_external'] : $hero_quad['gbhem_homepage_hero_quad_one_flipped_button_url'];  ?>">
													<?php echo $hero_quad['gbhem_homepage_hero_quad_one_flipped_button_text']; ?>
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-6 mr-0 ml-0 pr-0 pl-0">
									<div class="gbhem-homepage-hero-small flip-box">
										<div class="flip-box-inner">
											<div class="front flip-box-front" style="background-image: url(<?php echo $hero_quad['gbhem_homepage_hero_quad_two_image']['url']; ?>);">
												<div class="gbhem-overlay"><h4><?php echo $hero_quad['gbhem_homepage_hero_quad_two_header']; ?></h4></div>
											</div>
											<div class="back flip-box-back" style="background-color: <?php echo $hero_quad['gbhem_homepage_hero_quad_two_flipped_background_color']; ?>">
												<h4><?php echo $hero_quad['gbhem_homepage_hero_quad_two_flipped_header']; ?></h4>
												<p><?php echo $hero_quad['gbhem_homepage_hero_quad_two_flipped_text']; ?></p>
												<a class="gbhem-homepage-hero-button" href="<?php echo ($hero_quad['gbhem_homepage_hero_quad_two_flipped_button_url_external'] ) ? $hero_quad['gbhem_homepage_hero_quad_two_flipped_button_url_external'] : $hero_quad['gbhem_homepage_hero_quad_two_flipped_button_url'];  ?>">
													<?php echo $hero_quad['gbhem_homepage_hero_quad_two_flipped_button_text']; ?>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row ml-0 mr-0">
								<div class="col-sm-6 mr-0 ml-0 pr-0 pl-0 pr-sm-1">
									<div class="gbhem-homepage-hero-small flip-box">
										<div class="flip-box-inner">
											<div class="front flip-box-front" style="background-image: url(<?php echo $hero_quad['gbhem_homepage_hero_quad_three_image']['url']; ?>);">
												<div class="gbhem-overlay"><h4><?php echo $hero_quad['gbhem_homepage_hero_quad_three_header']; ?></h4></div>
											</div>
											<div class="back flip-box-back" style="background-color: <?php echo $hero_quad['gbhem_homepage_hero_quad_three_flipped_background_color']; ?>">
												<h4><?php echo $hero_quad['gbhem_homepage_hero_quad_three_flipped_header']; ?></h4>
												<p><?php echo $hero_quad['gbhem_homepage_hero_quad_three_flipped_text']; ?></p>
												<a class="gbhem-homepage-hero-button" href="<?php echo ($hero_quad['gbhem_homepage_hero_quad_three_flipped_button_url_external'] ) ? $hero_quad['gbhem_homepage_hero_quad_three_flipped_button_url_external'] : $hero_quad['gbhem_homepage_hero_quad_three_flipped_button_url'];  ?>">
													<?php echo $hero_quad['gbhem_homepage_hero_quad_three_flipped_button_text']; ?>
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-6 mr-0 ml-0 pr-0 pl-0">
									<div class="gbhem-homepage-hero-small flip-box">
										<div class="flip-box-inner">
											<div class="front flip-box-front" style="background-image: url(<?php echo $hero_quad['gbhem_homepage_hero_quad_four_image']['url']; ?>);">
												<div class="gbhem-overlay"><h4><?php echo $hero_quad['gbhem_homepage_hero_quad_four_header']; ?></h4></div>
											</div>
											<div class="back flip-box-back" style="background-color: <?php echo $hero_quad['gbhem_homepage_hero_quad_four_flipped_background_color']; ?>">
												<h4><?php echo $hero_quad['gbhem_homepage_hero_quad_four_flipped_header']; ?></h4>
												<p><?php echo $hero_quad['gbhem_homepage_hero_quad_four_flipped_text']; ?></p>
												<a class="gbhem-homepage-hero-button" href="<?php echo ($hero_quad['gbhem_homepage_hero_quad_four_flipped_button_url_external'] ) ? $hero_quad['gbhem_homepage_hero_quad_four_flipped_button_url_external'] : $hero_quad['gbhem_homepage_hero_quad_four_flipped_button_url'];  ?>">
													<?php echo $hero_quad['gbhem_homepage_hero_quad_four_flipped_button_text']; ?>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
				    </div><!-- .col-5 -->
			    </div><!-- .row -->
			</div><!-- .container-fluid -->
		</div><!-- .gbhem-homepage-hero -->

		<div class="gbhem-homepage-message">
			<div class="container">
				<div class="row my-5 justify-content-center">
				    <div class="col-lg-7">
					    <h3><?php the_field('gbhem_homepage_message_header_text', 'option'); ?></h3>
						<p><?php the_field('gbhem_homepage_message_text', 'option'); ?></p>
				    </div><!-- .gbhem-homepage-message -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .gbhem-homepage-message -->

		<div class="gbhem-homepage-spotlight-header">
			<div class="container">
				<div class=" row">
					<div class="col">
					    <h2><?php the_field('gbhem_homepage_spotlight_section_header', 'option'); ?></h2>
				    </div>
				</div><!-- .gbhem-homepage-spotlight-header -->
			</div><!-- .container-fluid -->
		</div><!-- .gbhem-homepage-spotlight -->

		<div class="gbhem-homepage-spotlight-content" style="background-image: url(<?php the_field('gbhem_homepage_spotlight_background_image', 'option'); ?> );">
			<div class="gbhem-overlay">
			<div class="container">

				<div class="row">
					<div class="col-lg">
						<div class="gbhem-homepage-spotlight-text">
						   	<h3><?php the_field('ghbem_homepage_spotlight_header', 'option'); ?></h3>
							<p><?php the_field('ghbem_homepage_spotlight_text', 'option'); ?></p>
						</div>
				    </div>
				    <div class="col-lg text-center">
					    <div class="gbhem-homepage-spotlight-button-box">
							<a class="gbhem-homepage-spotlight-button" href="<?php the_field('ghbem_homepage_spotlight_button_url', 'option'); ?>"><?php the_field('ghbem_homepage_spotlight_button_text', 'option'); ?></a>
					    </div>
					    <div class="gbhem-homepage-spotlight-more">
							<a href="<?php the_field('ghbem_homepage_spotlight_more_link_url', 'option'); ?>" ><?php the_field('ghbem_homepage_spotlight_more_link_text', 'option'); ?><img src="<?php echo get_template_directory_uri(); ?>/images/icon-arrow.png" /></a>
					    </div>
				    </div>
				</div><!-- .gbhem-homepage-spotlight-background -->

			</div><!-- .container-fluid -->
			</div><!-- .gbhem-overlay -->
		</div><!-- .gbhem-homepage-spotlight-content -->

		<div class="gbhem-homepage-feature">
			<div class="container">
				<div class="row">

					<div class="col-lg-6 mb-5 mb-lg-0">
						<div class="gbhem-homepage-feature-image">
							<img src="<?php the_field('ghbem_homepage_feature_image', 'option'); ?>" class="img-fluid w-100" />
						</div>
						<div class="gbhem-homepage-feature-text gbhem-blue">
							<h3><?php the_field('ghbem_homepage_feature_header', 'option'); ?></h3>
							<p><?php the_field('ghbem_homepage_feature_text', 'option'); ?> <a href="<?php the_field('ghbem_homepage_feature_link_url', 'option'); ?>"><?php the_field('ghbem_homepage_feature_link_text', 'option'); ?></a></p>
							<span class="clearfix"></span>
						</div><!-- .gbhem-homepage-feature-text -->
				    </div>

				     <?php

						$args = array(
						  'post_type' => 'publishing',
						  'posts_per_page' => -1,
						  'meta_query' => array(
						    array(
						      'key' => 'gbhem_publication_featured',
						      'value' => '1',
						      'compare' => '==' // not really needed, this is the default
						    )
						  )
						);

						$the_query = new WP_Query($args);

						if ($the_query->have_posts()) {while ($the_query->have_posts()) {

						$the_query->the_post(); ?>

				    <div class="col-lg-6">

						<div class="gbhem-homepage-feature-publication">
							<div class="gbhem-homepage-feature-publication-image">
						    	<img src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } ?>" class="img-fluid" />
						    </div>
						    <div class="gbhem-homepage-feature-publication-content">
								<h4 class="gbhem-homepage-feature-publication-title"><?php the_title(); ?></h4>
							    <p class="gbhem-homepage-feature-publication-author"><?php the_field('gbhem_publication_author'); ?></p>

							    <div class="gbhem-homepage-feature-publication-purchase-options">

								    <?php if( have_rows('gbhem_publication_purchase_options') ): while( have_rows('gbhem_publication_purchase_options') ): the_row();

										$format = get_sub_field('gbhem_publication_format');
										$buy_text = get_sub_field('gbhem_publication_purchase_link_text');
										$buy_url = get_sub_field('gbhem_publication_purchase_link_url');?>

										<div class="gbhem-homepage-feature-publication-purchase-option">

											<?php if( $format ): ?>
												<p class="gbhem-homepage-feature-publication-purchase-format"><?php echo $format; ?></p>
											<?php endif; ?>

											<?php if( $buy_url ): ?>
												<a class="gbhem-homepage-feature-publication-purchase-button" href="<?php echo $buy_url; ?>"><?php echo $buy_text; ?></a>
											<?php endif; ?>

									    </div>

									    <?php endwhile; endif; ?>
							    </div><!-- .gbhem-homepage-feature-publication-purchase-options -->
						    </div><!-- gbhem-homepage-feature-publication-content -->
					    </div><!-- .gbhem-homepage-feature-publication -->

					    <div class="gbhem-homepage-feature-text gbhem-orange">
					    	<h3>Publication Spotlight</h3>
							<?php $content = get_the_content(); echo mb_strimwidth($content, 0, 240, '...');?> <a class="gbhem-homepage-publication-more-info" href="<?php the_permalink(); ?>">MORE ></a>
							<span class="clearfix"></span>
					    </div><!-- .gbhem-homepage-feature-text -->
				    </div>

				    <?php } wp_reset_postdata(); } ?>

				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .gbhem-homepage-feature -->

		<div class="gbhem-homepage-schedule">
			<div class="container">

				<div class="row">
					<?php
					$events = tribe_get_events( [
					   'posts_per_page' => 5,
					   'ends_after' => 'now',
					] );
					foreach ( $events as $event ) {
					?>
					<div class="col-md my-3 p-1">
						<div class="gbhem-homepage-schedule-block">
							<div class="gbhem-homepage-schedule-header">
								<?php
									$today_y = date('Y');
									$today_m = date('n');
									$today_d = date('d');

									$tribe_y = tribe_get_start_date( $event->ID, false, 'Y' );
									$tribe_m = tribe_get_start_date( $event->ID, false, 'n' );
									$use_d = tribe_get_start_date( $event->ID, false, 'd' );

									if (($today_m > $tribe_m && $today_y == $tribe_y) || ($today_m == $tribe_m && $today_d > $use_d)) {
										$use_m = date('F');
										$use_d = $today_d;
									}
									else {
										$use_m = tribe_get_start_date( $event->ID, false, 'F' );
									}
								?>
								<div class="gbhem-homepage-schedule-day"><?php echo $use_m; ?></div>
								<div class="gbhem-homepage-schedule-date"><?php echo $use_d; ?></div>
							</div>
							<div class="gbhem-homepage-schedule-content">
								<div class="gbhem-homepage-schedule-title"><a href="<?php the_permalink($event->ID);?>"><h4><?php echo $event->post_title;?></h4></a></div>
							</div>
						</div>
					</div> <!-- .col -->
					<?php	} ?>

					<div class="col-12 col-lg-1 p-1">
						<div class="gbhem-homepage-schedule-nav-next">
							<a href="/events">All Events</a>
						</div>
					</div><!-- .col -->

				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .gbhem-homepage-schedule -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
