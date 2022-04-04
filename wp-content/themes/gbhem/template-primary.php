<?php
/*
 * Template Name: Primary Page
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
	<div class="gbhem-page-hero" style="background-image: url(<?php if (!empty(get_the_post_thumbnail_url())) { echo get_the_post_thumbnail_url(); } else { echo $hero; } ?>);">
		<div class="container-fluid">
			<div class="row">					
			    <div class="col px-0">
					<div class="gbhem-overlay">
						<div class="gbhem-page-hero-content">
						    <header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->
							<p class="gbhem-breadcrumbs"><?php gbhem_primary_breadcrumb(); ?></p>							
						</div><!-- .gbhem-page-hero-content -->
					</div><!-- .gbhem-overlay -->
			    </div><!-- .col -->		    
		    </div><!-- .row -->
		</div><!-- .container-fluid -->			
	</div><!-- .gbhem-page-hero -->
	
	<?php if($post->ID=="574"){ // show the publication filtering on the publishing page.
		extract(gbhem_publications_data());
	?>
	
		<div class="gbhem-page-navigation-bar">
			<div class="container">
				<div class="row">
				    <div class="col-md-3 justify-content-start">
					    <div class="gbhem-page-navigation-bar-dropdown">
							<button class="gbhem-page-navigation-bar-dropbtn">Publishing</button><i class="fas fa-caret-down"></i>
							<div class="gbhem-page-navigation-bar-dropdown-content">
							<?php
							$args = array(
							    'depth' => 1,
							    'theme_location' => 'publishing',
							);
							wp_nav_menu( $args );
							?>
							</div>
						</div>				    
				    </div>
				    <div class="col-md-9">
					    <form class="gbhem-publication-search-form" action="publications">
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
	<?php }?>
	
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
	
	<div class="gbhem-page-navigation">
		<div class="container">			
			<?php gbhem_primary_navigation_section(); ?>			
		</div><!-- .container -->		
	</div><!-- .gbhem-page-navigation --> 
	
	<!-- BEGIN Accordion Script -->
	<script>
		var acc = document.querySelectorAll(".gbhem-page-navigation .container > ul > li > a button");
		
		for (var i = 0; i < acc.length; i++) {
			acc[i].addEventListener("click", function(e) {
				e.preventDefault();
			    this.parentElement.parentElement.classList.toggle("active");
			    var panel = this.parentElement.parentElement.querySelector('.panel');
			    
			    if (panel.style.maxHeight){
				    panel.style.maxHeight = null;
				} else {
				    panel.style.maxHeight = panel.scrollHeight + "px";
				} 
			});
		}
	</script>
	<!-- END Accordion Script -->

<?php
get_sidebar();
get_footer();