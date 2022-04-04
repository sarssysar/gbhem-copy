<?php
/*
 * Template Name: Events
 * This was duplicated from the primary template.
 */

get_header();

$postID = get_queried_object_id();
?>

	<div class="gbhem-page-hero" style="background-image: url(<?php echo (has_post_thumbnail($postID)) ? get_the_post_thumbnail_url($postID, 'full') : get_template_directory_uri() . '/images/page-header.png'; ?>);">
		<div class="container-fluid">
			<div class="row">					
			    <div class="col px-0">
					<div class="gbhem-overlay">
						<div class="gbhem-page-hero-content">
						    <header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->
							<p class="gbhem-breadcrumbs"><?php //gbhem_primary_breadcrumb(); ?></p>							
						</div><!-- .gbhem-page-hero-content -->
					</div><!-- .gbhem-overlay -->
			    </div><!-- .col -->		    
		    </div><!-- .row -->
		</div><!-- .container-fluid -->			
	</div><!-- .gbhem-page-hero -->
	
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
	
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<div class="gbhem-page-content">
				<div class="container">
			
				<?php while ( have_posts() ) : the_post(); ?>
			
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
						
							<div class="entry-content">
								<?php
								the_content();
						
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gbhem' ),
									'after'  => '</div>',
								) );
								?>
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
			
						<?php // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
			
				endwhile; ?>
				
				</div><!-- .container -->		
			</div><!-- .gbhem-page-content -->

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<script type="text/javascript">
		jQuery(function($) {
			//$("li.page_item").children("a").attr('href', "javascript:void(0)");
		});
	</script>
	
	
	
	
	
	
	
<?php
get_sidebar();
get_footer();