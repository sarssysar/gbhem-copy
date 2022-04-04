<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GBHEM
 */


if(is_page()):
	$page_id = get_queried_object_id();
	$ancestors=get_post_ancestors($page_id);
	if($ancestors)
	{
		$root=count($ancestors)-1;
		$parent = $ancestors[$root];
	}
	else
	{
		$parent = $page_id;
	}
	$boxes=get_field('boxes',$parent);
	if($boxes): ?>		
	<div class="gbhem-discover-more">
		<div class="container-fluid container">
			<div class="row no-gutters">
				
			    <div class="col-md-2 py-4">
				    <div class="gbhem-discover-more-header">
					    <img src="<?php echo get_template_directory_uri(); ?>/images/discover-more-large.png" />
					    <h3>Discover More</h3>
				    </div>
			    </div>
			    <div class="col-md-10">
				    <div class="slider">					    
					    <?php foreach((array)$boxes as $box)
					    {
					    	?><div class="box">
							    <div class="gbhem-discover-more-content p-4">
								    <?php gbhem_discover_more_image( $box['link'], $box['image']); ?>
								    <p><?=$box['text']; ?></p>
							    </div>
						    </div><?php
					    } ?>
				    </div>
				</div>
			    <script>
			    jQuery(function($){
			    	var $slick_slider = $('.gbhem-discover-more .slider');
					var settings = {
					    infinite: true,
						slidesToShow: 3,
						slidesToScroll: 1,
						nextArrow:'<button type="button" class="slick-next slick-arrow"><span class="screen-reader-text">Next</span></button>',
						prevArrow:'<button type="button" class="slick-prev slick-arrow"><span class="screen-reader-text">Previous</span></button>',
						responsive: [							    
						    {
						        breakpoint: 992,
						        settings: {
						            slidesToShow: 2
						        }
						    }
						]
					}
					if($(window).width() >= 580)
  						$slick_slider.slick(settings);
  					$slick_slider.show();
					$(window).on('resize', function() {
						if ($(window).width() < 580) {
							if ($slick_slider.hasClass('slick-initialized')) {
								$slick_slider.slick('unslick');
							}
							return
						}

						if (!$slick_slider.hasClass('slick-initialized')) {
							return $slick_slider.slick(settings);
						}
					});
			    });
			    </script>
				
			</div><!-- .row -->
		</div><!-- .container -->		
	</div><!-- .gbhem-discover-more -->
	<?php endif; ?>
<?php endif; ?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer gbhem-footer">
		
		<div class="container">
			<div class="row">
					 
				<div class="col">
						<p class="gbhem-footer-slogan"><?php $gbhem_description = get_bloginfo( 'description', 'display' ); echo $gbhem_description; ?></p>
						<img class="gbhem-footer-logo" src="<?php the_field('gbhem_footer_logo', 'option'); ?>" />
						<p class="gbhem-footer-copyright"><?php the_field('gbhem_footer_copyright', 'option'); ?></p>
						
						<div class="gbhem-footer-menu">
							<?php
								$menuParameters = array(
							  'container'       => false,
							  'echo'            => false,
							  'items_wrap'      => '%3$s',
							  'depth'           => 1,
							  'menu_id'        => 'footer-menu',
							);
							echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
							?>
				    	</div><!-- .gbhem-footer-menu -->
					</div><!-- .col -->
						
				<div class="col-md-5 mt-5 mt-md-0">
						<h3 class="gbhem-footer-header"><?php the_field('gbhem_footer_header', 'option'); ?></h3>
						<div class="gbhem-footer-social-icons">
							<a class="gbhem-footer-social-icon-link" href="<?php the_field('gbhem_footer_social_link_facebook', 'option'); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
							<a class="gbhem-footer-social-icon-link" href="<?php the_field('gbhem_footer_social_link_twitter', 'option'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
							<a class="gbhem-footer-social-icon-link" href="<?php the_field('gbhem_footer_social_link_linkedin', 'option'); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
							<a class="gbhem-footer-social-icon-link" href="<?php the_field('gbhem_footer_social_link_youtube', 'option'); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
							<a rel="alternate" type="application/rss+xml"  class="gbhem-footer-social-icon-link" href="<?php the_field('gbhem_footer_social_link_rss', 'option'); ?>" target="_blank"><i class="fas fa-rss"></i></a>
						</div><!-- .gbhem-footer-social-icons -->					
						<div class="gbhem-footer-addresses">
							<div class="gbhem-footer-address">
								<p><?php the_field('gbhem_footer_address_1', 'option'); ?></p>
							</div><!-- .gbhem-footer-address -->
							<div class="gbhem-footer-address">
								<p><?php the_field('gbhem_footer_address_2', 'option'); ?></p>
							</div><!-- .gbhem-footer-address -->
						</div><!-- .gbhem-footer-addresses -->
					</div><!-- .col -->
					
			</div><!-- .row -->
		</div><!-- .container -->		

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php $show_help_popup = TRUE; ?>
<?php if($show_help_popup){ ?>
	
<script>
	var frequency = <?php the_field( 'help_frequency', 'option' ); ?> * 86400;// reset time period 
	var opendelay = <?php the_field( 'help_open_delay','option' ); ?>;	
</script>
<div class="needhelp">Need help? <button class="closebutton">⨯</button></div>
<button id="helppopup" class=""><span class="screen-reader-text">Open/close Help window</span></button>  

<div id="helpwindow" class="">
  <div class="windowtitle">WesBot <button class="closebutton">⨯</button></div>
  <div class="helpwindow-wrapper">
		<div class="bubbleback"><a href="#">&#8249; Go back</a></div>
		<div class="chatline"><p class="bubble"><?php the_field( 'help_bubble_one', 'option' ); ?></p></div>
		<div class="chatline"><p class="bubble option1"><?php the_field( 'help_bubble_two', 'option' ); ?></p></div>
		<div class="chatline"><p class="bubble option2"><?php the_field( 'help_bubble_three', 'option' ); ?></p></div>
    <div class="searchbox">	
			<p class="bubble">Kindly enter your search info below.</p>
			<form action="/" method="get">
				<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
				<input type="submit" value="Search" />
			</form>
    </div>
    <div class="contactform"> 
	    <?php 
		    // To show form, uncomment out lines below.
		    $nfid=get_field( 'help_contact_form_id', 'option' );
		    echo do_shortcode("[ninja_form id=$nfid]");
		  ?>
    </div>
    
  </div><!-- wrapper -->
</div> <!-- end help window-->

<?php } ?>
	
<?php wp_footer(); ?>
<script>
	  if (window.jQuery) {  
		  window.jQuery(".js-modal-btn").modalVideo();
		  }else{
			  console.log('jquery unavailable');
		  }
	</script>
</body>
</html>