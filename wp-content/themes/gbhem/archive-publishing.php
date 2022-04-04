<?php
/**
 * Archive - Publishing
 */

get_header();

extract(gbhem_publications_data());
global $archive_url;
$archive_url=get_post_type_archive_link( 'publishing' );

$downloads_table_view=false;
if($current_top)
	$downloads_table_view=get_field('downloads_table_view',$current_top);
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
							<p class="gbhem-breadcrumbs"><a href="<?php site_url(); ?>"> gbhem.org</a> > <a href="<?php echo $archive_url; ?>">publishing</a>
							<?php if($current_top): ?> > <a href="?cat=<?=$current_top->term_id; ?>"><?=$current_top->name; ?></a><?php endif; ?>
							<?php if($current_sub): ?> > <a href="?cat=<?=$current_sub->term_id; ?>"><?=$current_sub->name; ?></a><?php endif; ?>
							</p>
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
			<div class="container gbhem-papers-content">		
				<?php
				if($downloads_table_view && have_posts())
				{
					?>
					<table class="table table-striped table-responsive-sm">
						<thead>
							<tr>
								<th scope="col">Paper</th>
								<th scope="col">Download Link</th>
							</tr>
						</thead>
						<tbody>
					<?php
					while(have_posts())
					{
						the_post();
						
							?>							
							<tr>
								<td><?php the_title(); ?></td>
								<td>
									<?php if($download=get_field('gbhem_publication_download')): ?>
									<a href="<?=$download; ?>" target="_blank">Download <i class="fas fa-caret-down"></i></a>
									<?php endif; ?>
								</td>
							</tr>								
							<?php
						
					}
					?>
						</tbody>
					</table>
					<?php
				}
				elseif(have_posts())
				{
					while(have_posts())
					{				
						the_post();		
						get_template_part( 'template-parts/content', 'publishing' );
					}
					echo gbhem_paginate_links();
				}	
				else
				{
				?>
					<section class="no-results not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'No Publications Found', 'gbhem' ); ?></h1>
						</header><!-- .page-header -->
					</section><!-- .no-results -->

				<?php } ?>
									
			</div><!-- .container -->		
		</div><!-- .gbhem-page-content -->
	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
