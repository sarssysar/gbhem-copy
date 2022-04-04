<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package GBHEM
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">


<div class="gbhem-page-content searchresults">
	<div class="container">



		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'gbhem' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
				<?php 
				if (strpos($_GET['s'], '-files')) {
				?>
				<p><input type="checkbox" id="search-nofiles" name="search-nofiles" value="<?php echo get_search_query(); ?>"> <label for="search-nofiles">Include PDF files in search results</label></p>
				<?php
				} else {
				?>
				<p><input type="checkbox" id="search-nofiles" name="search-nofiles" value="<?php echo get_search_query(); ?> -files"> <label for="search-nofiles">Exclude PDF files from search results</label></p>
				<?php } ?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

	</div>
</div>
<?php
get_sidebar();
get_footer();
