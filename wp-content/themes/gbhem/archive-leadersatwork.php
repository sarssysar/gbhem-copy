<?php
/**
 * Archive - Leaders @Work
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
								<h1 class="entry-title">Leaders@Work</h1>
							</header><!-- .entry-header -->
							<p class="gbhem-breadcrumbs"><a href="<?php site_url(); ?>"> gbhem.org</a> > <a href="<?php echo get_post_type_archive_link( 'leadersatwork' ); ?>">Leaders@Work</a></p>
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
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<div class="row my-3 mx-1 p-3 gbhem-publication-alt ">					
			    		
			    		<div class="col-md-3 mb-3">					    
								<div class="gbhem-publication-image">
								    <img src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } ?>" class="img-fluid" />
								</div>
							</div>
							
							<div class="col-md-9">
								<div class="gbhem-publication-content">
									<header class="entry-header">				    
										<?php the_title( '<h4 class="gbhem-publication-title">', '</h4>' ); ?>
									</header>
									<?php
										$author = get_the_author(); 
										if(!empty($author)){?>
											<p class="gbhem-publication-author">by: <?php echo $author; ?></p>
									<?php }?>
											<p><?php echo get_the_date();?></p>
									
									<div class="gbhem-publication-information">
										<?php the_excerpt();?>
										<div><a class="gbhem-publication-more-info" href="<?php the_permalink(); ?>">Find out more</a></div>
									</div><!-- .gbhem-publication-information -->
									
											
								</div><!-- .gbhem-publication-content -->				    
							</div><!-- .col -->
						</div><!-- .row -->
					</article>

				<?php endwhile;
	
				echo gbhem_paginate_links();
	
				else :
	
					get_template_part( 'template-parts/content', 'none' );
	
				endif; ?>
									
			</div><!-- .container -->		
		</div><!-- .gbhem-page-content -->
	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
