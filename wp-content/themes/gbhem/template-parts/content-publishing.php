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
				<p class="gbhem-publication-author">by <?php the_field('gbhem_publication_author'); ?></p>
				<div class="gbhem-publication-information">
					<?php $content = get_the_content(); echo wp_trim_words( $content, 35, "..." ); ?>
					<div><a class="gbhem-publication-more-info" href="<?php the_permalink(); ?>">Find out more</a></div>
				</div><!-- .gbhem-publication-information -->
				<div class="gbhem-publication-purchase-options my-3">
					<?php if( have_rows('gbhem_publication_purchase_options') ): ?>
					<div class="gbhem-publication-purchase-options-border my-4"></div>
						
						<?php while( have_rows('gbhem_publication_purchase_options') ): the_row(); 

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
					<?php endif; ?>
				</div>
				
			</div><!-- .gbhem-publication-content -->				    
		</div><!-- .col -->
	</div><!-- .row -->
</article>