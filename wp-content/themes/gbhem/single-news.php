<?php
/**
 * Single - News
 */

get_header();
?>

	<div class="gbhem-page-hero-alt" style="background-image: url(<?php echo get_template_directory_uri() . '/images/page-header-2.png'; ?>);">
		<div class="container-fluid">
			<div class="row">					
				<div class="col px-0">
					<div class="gbhem-overlay">
						<div class="gbhem-page-hero-alt-content">
							<header class="entry-header">
								<h1 class="entry-title">News</h1>
							</header><!-- .entry-header -->
							<p class="gbhem-breadcrumbs"><a href="<?php site_url(); ?>"> gbhem.org</a> > <a href="<?php echo get_post_type_archive_link( 'news' ); ?>">news</a></p>
						</div><!-- .gbhem-page-hero-content -->
					</div><!-- .gbhem-overlay -->
				</div><!-- .col -->		    
			</div><!-- .row -->
		</div><!-- .container-fluid -->			
	</div><!-- .gbhem-page-hero-alt -->
	
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
				
				<?php while ( have_posts() ) : the_post();?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="row my-3 p-3 gbhem-news-single">
					
					
					


					<div class="col-md-12">
						<header class="entry-header">				    
							<?php the_title( '<h4 class="gbhem-news-title">', '</h4>' ); ?>
							<p class="gbhem-news-date"><?php the_date();?></p>
							<?php echo sharethis_inline_buttons(); ?>
						</header>
					</div>
					
<!--
					<div class="col-md-12 mt-3">					    
						<div class="gbhem-news-image">
						    <img src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } ?>" class="img-fluid w-100" />
						</div>
					</div>
-->
					
					<div class="col-md-12">						
						<div class="gbhem-publication-information">
							<div class="entry-content">
								<?php
								the_content( sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gbhem' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								) );
						
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gbhem' ),
									'after'  => '</div>',
								) );
								?>
							</div><!-- .entry-content -->
						</div><!-- .gbhem-publication-information -->	
						
					</div><!-- .col -->
					
				</div><!-- .row -->
				
				<footer class="entry-footer">
					<?php gbhem_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-<?php the_ID(); ?> -->


			<?php endwhile; // End of the loop. ?>

												
			</div><!-- .container -->		
		</div><!-- .gbhem-page-content -->
	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
