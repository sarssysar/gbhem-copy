<?php
/**
 * Single - Publishing
 */

get_header();

extract(gbhem_publications_data());
$archive_url=get_post_type_archive_link( 'publishing' );
?>

	<div class="gbhem-page-hero-alt" style="background-image: url(<?php echo get_template_directory_uri() . '/images/page-header-2.png'; ?>);">
		<div class="container-fluid">
			<div class="row">					
				<div class="col px-0">
					<div class="gbhem-overlay">
						<div class="gbhem-page-hero-alt-content">
							<header class="entry-header">
								<h1 class="entry-title">Publishing</h1>
							</header><!-- .entry-header -->
							<p class="gbhem-breadcrumbs"><a href="<?php site_url(); ?>"> gbhem.org</a> > <a href="<?php echo $archive_url; ?>">publishing</a></p>
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
							<button class="gbhem-page-navigation-bar-dropbtn">Publishing</button><i class="fas fa-caret-down"></i>
							<div class="gbhem-page-navigation-bar-dropdown-content">
							<?php foreach($top_level as $term): ?>
								<a href="<?=$archive_url; ?>?cat=<?=$term->term_id; ?>"><?=$term->name; ?></a>
							<?php endforeach; ?>
							</div>
						</div>				    
				    </div>
				    <div class="col-md-9">
					    <form class="gbhem-publication-search-form" action="<?=$archive_url; ?>">
						  <div class="form-row align-items-center">
						  	<?php if($sub_cats): ?>
						    <div class="col-sm-3 my-1">
						      <label class="sr-only" for="inlineFormCustomSelect1">Topic</label>
						      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect1" name="cat">
						        <option value="">Topic</option>
						        <?php foreach($sub_cats as $term): ?>
						        <option value="<?=$term->term_id; ?>" <?=($current_sub&&$current_sub->term_id==$term->term_id?'selected':''); ?>><?=$term->name; ?></option>
						    	<?php endforeach; ?>
						      </select>
						    </div>
							<?php endif; ?>
							<?php if($authors): ?>
						    <div class="col-sm-3 my-1">
						      <label class="sr-only" for="inlineFormCustomSelect2">Author</label>
						      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect2" name="pub_author">
						        <option value="">Author</option>
						        <?php foreach($authors as $value=>$name): ?>
						        <option value="<?=$value; ?>" <?=(isset($_GET['pub_author']) && $_GET['pub_author']==$value?'selected':''); ?>><?=$name; ?></option>
						    	<?php endforeach; ?>
						      </select>
						    </div>
						    <?php endif; ?>
						    <div class="col-sm-3 my-1">
						    	<label class="sr-only" for="inlineFormInputName2">Keyword</label>
								<input type="text" class="form-control mr-sm-2" id="inlineFormInputName2" placeholder="Keyword" name="pub_keyword" value="<?php the_search_query(); ?>">
						    </div>
						    <div class="col-auto my-1">
						      <button type="submit" class="btn btn-gbhem">Search</button>
						    </div>
						  </div>
						</form>
				    </div>
				</div><!-- .row -->
			</div><!-- .container -->		
		</div><!-- .gbhem-page-navigation --> 

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<div class="gbhem-page-content">
			<div class="container">		
				
				<?php while ( have_posts() ) : the_post();?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="row my-3 p-3 gbhem-publication-single">
					
					<div class="col-md-12 mb-3">
						<header class="entry-header">				    
							<?php the_title( '<h4 class="gbhem-publication-title">', '</h4>' ); ?>
						</header>
						<p class="gbhem-publication-author">by <?php the_field('gbhem_publication_author'); ?></p>
					</div>
														
			    	<div class="col-md-3 mb-3 ">					    
						<div class="gbhem-publication-image">
						    <img src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } ?>" class="img-fluid w-100" />
						</div>
					</div>
					
					<div class="col-md-9">						
						<div class="gbhem-publication-purchase-options-single">
							<div class="gbhem-publication-purchase-options-border d-md-none mt-2 mb-4"></div>
							
								<?php if( have_rows('gbhem_publication_purchase_options') ): while( have_rows('gbhem_publication_purchase_options') ): the_row(); 

										$price = get_sub_field('gbhem_publication_price');
										$format = get_sub_field('gbhem_publication_format');
										$isbn = get_sub_field('gbhem_publication_isbn');
										$buy_text = get_sub_field('gbhem_publication_purchase_link_text');
										$buy_url = get_sub_field('gbhem_publication_purchase_link_url');
								
								?>

									<div class="gbhem-publication-purchase-option">

											<?php if( $price ): ?>
												<p class="gbhem-publication-price">$<?php echo $price; ?></p>
											<?php endif; ?>
											
											<?php if( $format ): ?>
												<p class="gbhem-publication-format"><?php echo $format; ?></p>
											<?php endif; ?>
											
											<?php if( $isbn ): ?>
												<p class="gbhem-publication-isbn">ISBN: <?php echo $isbn; ?></p>
											<?php endif; ?>
											
											<?php if( $buy_url ): ?>
												<a class="gbhem-publication-purchase-button" href="<?php echo $buy_url; ?>"><?php echo $buy_text; ?></a>
											<?php endif; ?>
										
									</div>

								<?php endwhile; ?>
									
									<div class="gbhem-publication-purchase-options-border my-4"></div>
								
								<?php endif; ?>		
								
						</div>
						
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
