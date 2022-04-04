<?php
/*
 * Template Name: Secondary Page
 */

get_header();
?>

<?php
global $post;
$parents = get_post_ancestors( $post->ID );
$id = ($parents) ? $parents[count($parents)-1]: $post->ID;/* Get the ID of the 'top most' Page if not return current page ID */
if(has_post_thumbnail( $id )) {
	$hero = get_the_post_thumbnail_url( $id, 'full');
}
?>

	<div class="gbhem-page-hero-alt" style="background-image: url(<?php if (!empty(get_the_post_thumbnail_url())) { echo get_the_post_thumbnail_url(); } else { echo $hero; } ?>);">
		<div class="container-fluid">
			<div class="row">					
				<div class="col px-0">
					<div class="gbhem-overlay">
						<div class="gbhem-page-hero-alt-content">
							<header class="entry-header">
								
								<?php
								if($post->ID == 1508){
								?>
								<div>
								<span class="tiny-title entry-title">Clinic Pastoral Education</span>
								<h1 class="entry-title">Building the skills to walk with people in their time of need.</h1>
								</div>
								<?php
								}else{
								?>
								<h1 class="entry-title"><?php gbhem_secondary_title(); ?></h1>
								<?php
								}
								?>
								
							</header><!-- .entry-header -->
							<p class="gbhem-breadcrumbs"><?php gbhem_secondary_breadcrumb(); ?></p>
						</div><!-- .gbhem-page-hero-content -->
					</div><!-- .gbhem-overlay -->
				</div><!-- .col -->		    
			</div><!-- .row -->
		</div><!-- .container-fluid -->			
	</div><!-- .gbhem-page-hero-alt -->
	
	<div class="gbhem-page-navigation-bar">
			<div class="container">
				<div class="row">
				    <div class="col justify-content-start">
					    <div class="gbhem-page-navigation-bar-dropdown">
						    <?php gbhem_secondary_nav_bar(); ?>
							<!--<button class="gbhem-page-navigation-bar-dropbtn"><?php echo $post->post_parent; ?></button><i class="fas fa-caret-down"></i>-->
						</div>				    
				    </div>
				</div><!-- .row -->
			</div><!-- .container -->		
		</div><!-- .gbhem-page-navigation --> 
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<div class="gbhem-page-content">
				<div class="container">
			
				<?php while ( have_posts() ) : the_post(); ?>
			
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							
							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title page-title-alt">', '</h1>' ); ?>
							</header><!-- .entry-header -->	
						
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
					

<?php
get_sidebar();
get_footer();