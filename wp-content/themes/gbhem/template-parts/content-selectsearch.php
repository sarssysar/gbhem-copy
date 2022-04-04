<?php
/**
 * Template part for displaying selective search options
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GBHEM
 */

/* lets call a custom query against the url parameter in order to pull the proper post */


?>
<div class="gbhem-page-content">
	<div class="container">
		<article class="page selectivesearchresults">
			<h3>I am a <strong><?php echo $selecttype; ?></strong> looking for <strong> <?php echo $selectsearch; ?></strong></h3>
<?php

$posts = get_field('select_search','option');

if( $posts ): ?>


    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

	    <?php if($post['looking_for_text'] == $selectsearch){ 
					$entries = $post['display_urls'];
					foreach($entries as $entry){ ?>
						<div class="ssitem">
							<a href="<?php echo get_permalink($entry->ID );?>"><h4><?php echo $entry->post_title; ?></h4></a>
							<p><?php echo get_post_meta($entry->ID, '_yoast_wpseo_metadesc', true); ?></p>
						</div>
			<?php }
						
       } ?>
        
    <?php endforeach; ?>

    
<?php
  wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
 endif; 
?>
		</article>
	</div>
</div>