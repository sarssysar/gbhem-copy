<?php
/**
 * Template part for displaying news/events in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GBHEM
 */

?>

	<div class="gbhem-page-navigation-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-3 justify-content-start">
						
							<div class="gbhem-page-navigation-bar-dropdown">
								<button class="gbhem-page-navigation-bar-dropbtn">News & Events </button><i class="fas fa-caret-down"></i>
								<div class="gbhem-page-navigation-bar-dropdown-content">
								<?php 
									$newssub = wp_get_nav_menu_items('newsevents'); 
									foreach($newssub as $menuitem){ //print_r($menuitem);?>
									<a href="<?php echo $menuitem->url;?>"><?php echo $menuitem->post_title;?></a>
								<?php	}	?>
								</div>
							</div>			
						</div>

				</div> <!-- //.row -->
			</div> <!-- //.container -->
		</div> <!-- //.gbhem-page-navigation --> 
		
		
		 
<div class="gbhem-page-content newslisting">
	<div class="container">
		
	
			
			
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>.entry-header -->


	

	<div class="entry-content">
		<?php	the_content(); ?>
		
		<div class="upcomingevents">
			<h2>Upcoming Events</h2>
			<div class="eventwrap">
			<?php 
				// To find all available array keys you can use in the parameter for tribe_get_events,
				// refer to /wp-content/plugins/the-events-calendar/src/Query.php and read through
				// the function's code. "ends_after" was found at line 1291.
				$events = tribe_get_events( [ 'posts_per_page' => 2, 'order_by' => 'date', 'ends_after' => 'now', 'order' => 'ASC' ] );
				// Loop through the events, displaying the title and content for each
				foreach ( $events as $event ) { ?>
					<div class="newsitem">
						<h3 class="dates"><a href="<?php the_permalink($event->ID);?>"><?php echo $event->post_title;?></a></h3>
							<h4><?php
						//print_r($event);
						$start = tribe_get_start_date( $event->ID );
						$end = tribe_get_end_date( $event->ID );
						echo (($start==$end) ? $start : $start." - ".$end);
						echo ' ' . tribe_get_event($event->ID)->timezone;
						?></h4>
							<?php echo apply_filters('gbhem_event_content', $event->post_content); ?>

						<div class="details">				
							<?php
							$post='';
							$organizer_id = tribe_get_organizer_id($event->ID);
							$post = get_post($organizer_id);
							if(!empty($post->post_title)){
								echo '<p class="organizer"><strong>Organization: </strong>';
								echo $post->post_title;
								echo '</p>';
							}
							?>
							<p><strong>Location: </strong>
								<?php 
									$venue = tribe_get_venue_details($event->ID);
									echo $venue['address'];
								?>
							</p>
							</div>
					</div>
				<?php
				}
			?>
			</div>
			<a href="<?php bloginfo( 'siteurl');?>/events" class="viewall">View all Events</a>
		</div>
		
		
		<div class="latestnews">
			<h2>Latest News</h2>
			
			<?php 
				$args=array(
					'post_type'=>'news',
					'posts_per_page'=>2,
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) { 
					while ( $the_query->have_posts() ) { ?>
					<div class="newsitem"> 
					<?php	$the_query->the_post();
						if(has_post_thumbnail()) {
							echo the_post_thumbnail('thumbnail');
						}
						?>
						<div class="itemtitle"><a href="<?php the_permalink();?>"><?php the_title();?> </a></div>
						<div class="itemsummary">
							<p class="postedwrap"><?php gbhem_posted_on();?></p>
							<?php the_excerpt();?>
						</div>
					</div>	
					<?php }?>
				<?php	wp_reset_postdata();
				}
			?>
			<a href="<?php bloginfo( 'siteurl');?>/news-list" class="viewall">View all News</a>
		</div>
		
<!--
		<div class="leadersatwork">
			<h2>Latest Leaders@ Work</h2>
			<?php 
				$args=array(
					'post_type'=>'leadersatwork',
					'posts_per_page'=>2,
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) { 
					while ( $the_query->have_posts() ) { ?>
					<div class="newsitem"> 
					<?php	$the_query->the_post();
						if(has_post_thumbnail()) {
							echo the_post_thumbnail('thumbnail');
						}
						?>
						<div class="itemtitle"><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></div>		
						 	<div class="itemsummary">
							<p class="postedwrap"><?php gbhem_posted_on();?></p>
							<?php the_excerpt();?>
						</div>
						<?php ?>
					</div>	
					<?php }?>
				<?php	wp_reset_postdata();
				}
			?>
			<a href="<?php bloginfo( 'siteurl');?>/leadersatwork" class="viewall">View all Leaders @Work</a>
		</div>
-->
		
		
		
		
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'gbhem' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->




	</div>
</div>
