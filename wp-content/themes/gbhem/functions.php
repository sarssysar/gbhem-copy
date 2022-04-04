<?php
/**
 * GBHEM functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GBHEM
 */

if ( ! function_exists( 'gbhem_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gbhem_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on GBHEM, use a find and replace
		 * to change 'gbhem' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gbhem', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'gbhem' ),
		) );

		register_nav_menus( array(
			'top' => esc_html__( 'Top', 'gbhem' ),
		) );

		register_nav_menus( array(
			'publishing' => esc_html__( 'Publishing', 'gbhem' ),
		) );
		register_nav_menus( array(
			'newsevents' => esc_html__( 'NewsandEvents', 'gbhem' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'gbhem_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'gbhem_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gbhem_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gbhem_content_width', 640 );
}
add_action( 'after_setup_theme', 'gbhem_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gbhem_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gbhem' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gbhem' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gbhem_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gbhem_scripts() {

	wp_enqueue_style( 'gbhem-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'gbhem-googlefonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Oswald:400,700' );
	wp_enqueue_style( 'gbhem-fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css' );
	wp_enqueue_style( 'gbhem-style', get_stylesheet_uri() );
	wp_enqueue_style( 'gbhem-stylecustom', get_template_directory_uri() . '/style-custom.css' );
	wp_enqueue_style( 'modalvideostyles', get_template_directory_uri() . '/modal-video.min.css' ); // headline modal
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/slick/slick.css' );
	wp_enqueue_style( 'pl-style', get_template_directory_uri() . '/style-pl.css' );
	wp_enqueue_script( 'gbhem-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'headlinerotation',get_template_directory_uri().'/js/headline.js',array(),array(),true); //headline copy rotate script.
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'gbhem-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' );
	wp_enqueue_script( 'gbhem-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' );
	wp_enqueue_script( 'jquery-flip', 'https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js' );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/slick/slick.min.js', array('jquery') );
	wp_enqueue_script( 'modalvideo',get_template_directory_uri().'/js/jquery-modal-video.js',array('jquery') ); //headline modal.
	wp_enqueue_script('covervid', get_template_directory_uri().'/covervid/covervid.min.js', ['jquery'], '1.0', true);
	wp_enqueue_script('customjs', get_template_directory_uri().'/js/custom.js', array('jquery', 'jquery-flip'), '1.0.3', true); //custom js in footer



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gbhem_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * ACF Options Page.
 */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Homepage Settings',
		'menu_title'	=> 'Homepage',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Homepage Settings',
		'menu_title'	=> 'Search',
		'parent_slug'	=> 'theme-general-settings',
	));

}
//modify oembed to only show channel recommended videos
function oembed_hd( $html, $url, $attr, $post_id ) {
  if ( strpos ( $html, 'feature=oembed' ) !== false )
    return str_replace( 'feature=oembed',
      'feature=oembed&amp;rel=0', $html );
  else
    return $html;
}
add_filter('embed_oembed_html', 'oembed_hd', 10, 4 );





function gbhem_primary_breadcrumb() {

        echo '<a href="' . get_option('home') . '"> gbhem.org</a> > ';
        if (is_category() || is_single()) {
            the_category('title_li=');
            if (is_single()) {
                echo " > ";
                the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        }
}

function gbhem_primary_navigation_section() {

		$page_id = get_queried_object_id();
		$page_slug = get_page_template_slug($page_id);

    if($page_slug == 'template-publishing.php' || $page_slug == "publishing")
    {
			$walker=new GBHEM_Nav_Walker();
			$args = array(
				'depth' => 2,
				'theme_location' => 'publishing',
				'walker'       => $walker,
				'link_before' => '<button type="button" data-test="asdf"><span class="screen-reader-text">toggle menu</span></button>',
				'link_after'  => '',
				'echo'=>false
			);
			wp_nav_menu( $args );
    }
    else
    {
		$walker=new GBHEM_Walker();
	    $args = array(
	        'child_of'    => $page_id,
	        'title_li'     => '',
	        'depth' => 2,
	        'walker'       => $walker,
	        'link_before' => '<button type="button"><span class="screen-reader-text">toggle menu</span></button>',
	        'link_after'  => '',
	    );
	    wp_list_pages( $args );
	}
    if(!$walker->items)
    	return;
    $cols=3;
    $per_col=ceil(count($walker->items)/$cols);
    foreach($walker->items as $i=>$item)
    {
    	if($i%$per_col==0)
    		echo '<ul class="col">';
    	echo $item;
    	if($i%$per_col==($per_col-1))
    		echo '</ul>';
    }
    if($i%$per_col!=($per_col-1))
    	echo '</ul>';
}

function gbhem_primary_navigation_section_alt() {

	$page_id = get_queried_object_id();

	$args = array(
		'child_of' => $page_id,
		'sort_order' => 'ASC',
		'sort_column' => 'post_date',
		'parent' => -1,
		'hierarchical' => 1,
	);

	$mypages = get_pages($args);

	echo '<ul>';

	foreach( $mypages as $page ) { ?>
		<li><a href="#<?php echo $page->post_name; ?>"><?php echo $page->post_title; ?></a></li>
	<?php }

	echo '</ul>';
}


function gbhem_secondary_title() {


		$current = get_post($post->ID);

		//Conditional to be sure there is a parent
		if($current->post_parent){
		    $grandparent = get_post($current->post_parent);

		    //conditional to be sure there is a greatgrandparent
		    if($grandparent->post_parent){
		        $greatgrandparent = get_post($grandparent->post_parent);
		    }

		}

		if ( $greatgrandparent != '' ) {
			echo get_the_title($greatgrandparent);
		} elseif ( $grandparent != '' ) {
			echo get_the_title($grandparent);
		} else {
			echo get_the_title($parent);
		}

}

function gbhem_secondary_breadcrumb() {

		$current = get_post($post->ID);

		//Conditional to be sure there is a parent
		if($current->post_parent){

		    $grandparent = get_post($current->post_parent);

		    //conditional to be sure there is a greatgrandparent
		    if($grandparent->post_parent){
		        $greatgrandparent = get_post($grandparent->post_parent);
		    }

		}

		echo '<a href="' . get_option('home') . '"> gbhem.org</a> > ';

		if ( $greatgrandparent != '' ) {

			echo '<a href="' . get_page_link($greatgrandparent) . '">' . get_the_title($greatgrandparent) . '</a> > <a href="' . get_page_link($grandparent) . '">' . get_the_title($grandparent) . ' > <a href="' . get_page_link($parent) . '">' . get_the_title($parent) . '</a>';

		} elseif ( $grandparent != '' ) {

			echo '<a href="' . get_page_link($grandparent) . '">' . get_the_title($grandparent) . ' > <a href="' . get_page_link($parent) . '">' . get_the_title($parent) . '</a>';

		} else {

			echo '<a href="' . get_page_link($parent) . '">' . get_the_title($parent) . '</a>';

		}
}

function gbhem_secondary_nav_bar() {

    $page_id = get_queried_object_id();
    $ancestors = get_post_ancestors($page_id);
    $ancestors_count = count($ancestors);
    if( $ancestors_count > 1 ) {

        //the last item in $ancestors will be the top parent page, that is "Services"
        //but we want the before top parent ("Service One", "Service Two", etc)
        $top_menu_page = $ancestors[$ancestors_count - 2];
 	} elseif($ancestors_count==1) {
 		$top_menu_page = $ancestors[0];
    } else {
        //We are actually on one of our top menu pages ("Service One", "Service Two", etc)
        $top_menu_page = $page_id;
    }

	$parent_page = get_the_title($top_menu_page);
	ob_start();
	if(get_page_template_slug($top_menu_page)=='template-publishing.php')
	{

		$args = array(
		    'depth' => 1,
		    'theme_location' => 'publishing',
		);
		wp_nav_menu( $args );
	}
	else
	{

	    $args = array(
	        'child_of'    => $top_menu_page,
	        'title_li'     => false,
	        //'walker'       => new WPSE_Walker_Page(),
	        //'link_before' => '<span class="icon '.do_shortcode('[some-custom-field-shortcode]').'"></span> <span class="text">',
	        //'link_after'  => '</span>',
	    );
	    wp_list_pages( $args );
	 }
	 $out=ob_get_clean();
	 if(!$out)
	 	return;
	 echo '<div class="gbhem-page-navigation-bar-dropbtn">' . $parent_page . ' <i class="fas fa-caret-down"></i></div><ul>';
	 echo $out;
	 echo '</ul>';
}

class GBHEM_Walker extends Walker_Page {
	public $items=array();
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) {
            $output .= "\n$indent<div class='panel'><div class='inner'><ul>\n";
        } else {
            $output .= "\n$indent<ul class='children'>\n";
        }
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) {
            $output .= "$indent</ul></div></div>\n";
        } else {
            $output .= "$indent</ul>\n";
        }
    }
    function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 )
    {
    	parent::start_el( $output, $page, $depth, $args, $current_page);
    	if($depth==0)
    	{
    		$this->items[]=$output;
    		$output="";
    	}

    }
    function end_el( &$output, $page, $depth = 0, $args = array() )
    {
    	parent::end_el( $output, $page, $depth, $args);
    	if($depth==0)
    	{
    		$this->items[count($this->items)-1].=$output;
    		$output="";
    	}

    }
}

function gbhem_discover_more_image($link, $image) {

	echo '<a href="'. $link .'">';

	if ( $image ) {
		echo wp_get_attachment_image($image['ID'],'medium_large');
	} else {
		echo '<img src="'.get_template_directory_uri().'/images/discover-more-1.png" />';
	}

	echo '</a>';
}

function gbhem_enqueue() {
    wp_enqueue_script(
        'myguten-script',
        get_template_directory_uri().'/js/guten.js'
    );
}
add_action( 'enqueue_block_editor_assets', 'gbhem_enqueue' );

$gbhem_page_nav=array();
function gbhem_start_el($item_output, $item, $depth, $args)
{
	global $gbhem_page_nav;
	if($args->menu_id!='primary-menu')
		return $item_output;
	if(!$item->object || $item->object!="page")
		return $item_output;

	if(isset($gbhem_page_nav[$item->ID]))
		return '<button type="button"><span class="screen-reader-text">toggle submenu</span></button>'.$item_output.'<div class="sub-menu"><ul class="sub">'.$gbhem_page_nav[$item->ID].'</ul></div>';
	return $item_output;
}
function gbhem_menu_css($classes, $item, $args, $depth)
{
	global $gbhem_page_nav;
	if($args->menu_id!='primary-menu')
		return $classes;
	if(!$item->object || $item->object!="page")
		return $classes;

	if (($key = array_search('menu-item-has-children', $classes)) !== false) {
	    unset($classes[$key]);
	}
/*
	if (($key = array_search('gbhem-menu-highlight', $classes)) !== false) {
	    return $classes;
	}
*/


	$args = array(
        'child_of'    => $item->object_id,
        'title_li'     => '',
        'depth' => 2,
        'echo'=>0
    );
    $pages=wp_list_pages( $args );
    if(!$pages)
    	return $classes;
	$gbhem_page_nav[$item->ID]=$pages;
	$classes[]='menu-item-has-children';
	return $classes;
}
add_filter( 'nav_menu_css_class', 'gbhem_menu_css', 10, 4 );
add_filter( 'walker_nav_menu_start_el', 'gbhem_start_el', 10, 4 );


if(!function_exists('clog'))
{
    function clog($o)
    {
        echo '<script>console.log('.json_encode($o).');</script>';
    }
}


function new_excerpt_more($more) {
  return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


function wwp_custom_query_vars_filter($vars) {
    $vars[] = 'selectsearch';
    $vars[] = 'selecttype';
    return $vars;
}
add_filter( 'query_vars', 'wwp_custom_query_vars_filter' );


function gbhem_page_link($permalink, $id)
{
	if(get_page_template_slug($id)=="template-placeholder.php")
	{
		if($url=get_field('page',$id))
			return $url;
	}

	return $permalink;
}
add_filter('page_link','gbhem_page_link',10,2);


function gbhem_pre_get_posts($q)
{
    if(is_admin() || !$q->is_main_query())
    {
    	return $q;
    }
    if($q->is_post_type_archive('publishing'))
    {
    	$data=gbhem_publications_data();
    	if(isset($_GET['pub_keyword']) && $_GET['pub_keyword'])
    		$q->set('s',$_GET['pub_keyword']);
    	if(isset($_GET['pub_author']))
    	{
    		if(isset($data['authors'][$_GET['pub_author']]))
    		{
    			$meta_query=$q->get('meta_query');
				if(!$meta_query)
					$meta_query=array();
				$meta_query = array(
					'relation'=>'AND',
					array(
						'key'       => 'gbhem_publication_author',
						'value'     => $data['authors'][$_GET['pub_author']]
					)
				);
				$q->set('meta_query',$meta_query);
    		}
    	}
    	if(!$q->get('cat') && $data['default_top'])
    		$q->set('cat',$data['default_top']->term_id);
	}
}
add_filter('pre_get_posts','gbhem_pre_get_posts');

add_action('pre_get_posts', function ($query) {
  if(is_archive()) {
   //If you wanted it for the archive of a custom post type use:
     if ($query->is_post_type_archive('publishing')) {
     //Set the order ASC or DESC
     $query->set('order', 'ASC');
     //Set the orderby
     $query->set('orderby', 'title');
     }
  }
});

function gbhem_publications_data()
{
	global $gbhem_publications_data, $wpdb;
	if($gbhem_publications_data)
		return $gbhem_publications_data;

	$qo=get_queried_object();
	$top_level = get_terms(array(
	    'taxonomy' => 'category',
	    'hide_empty' => false,
	    'parent' => 0,
	    'exclude' => 1
	));

	$current_top=false;
	$current_sub=false;
	$default_top=false;
	$sub_cats=false;
	$authors=false;

	foreach($top_level as $term)
	{
		if($qo->term_id && $term->term_id==$qo->term_id)
		{
			$current_top=$term;
			break;
		}
		if($qo->term_id && $term->term_id==$qo->parent)
		{
			$current_top=$term;
			$current_sub=$qo;
			break;
		}
		if(get_field('default_category',$term))
			$default_top=$term;
	}

	if(!$current_top && $default_top)
	{
		$current_top=$default_top;
	}

	if($current_top)
	{
		$sub_cats = get_terms(array(
		    'taxonomy' => 'category',
		    'hide_empty' => false,
		    'parent' => $current_top->term_id
		));
		$terms=array_merge(array($current_top->term_id), get_term_children($current_top->term_id,'category'));
		$term_query = new WP_Term_Query();
		$term_list  = $term_query->query(array(
			'include'				 => wp_parse_id_list( $terms ),
			'get'                    => 'all',
			'number'                 => 0,
			'taxonomy'               => 'category',
			'update_term_meta_cache' => false,
			'orderby'                => 'none',
		));
		$terms=wp_list_pluck( $term_list, 'term_taxonomy_id' );

		$query="select distinct meta_value from {$wpdb->postmeta} where meta_key='gbhem_publication_author' and post_id in (select distinct p.ID from {$wpdb->posts} p left join {$wpdb->term_relationships} tr on p.ID=tr.object_id where tr.term_taxonomy_id in (".implode(',',$terms).") AND p.post_type = 'publishing' AND p.post_status = 'publish')";

		$authors_q=$wpdb->get_results($query, ARRAY_N);
		foreach($authors_q as $row)
		{
			$authors[sanitize_title($row[0])]=$row[0];
		}
		if($authors)
			asort($authors);
	}
	$gbhem_publications_data=array(
		'default_top'=>$default_top,
		'top_level'=>$top_level,
		'current_top'=>$current_top,
		'current_sub'=>$current_sub,
		'sub_cats'=>$sub_cats,
		'authors'=>$authors,
	);
	return $gbhem_publications_data;
}


function gbhem_paginate_links($args=array())
{
    $args['prev_text']='<span class="screen-reader-text">previous page</span><';
    $args['next_text']='<span class="screen-reader-text">next page</span>>';
    $screen_reader_text='Posts navigation';
    if(isset($args['screen_reader_text']))
        $screen_reader_text=$args['screen_reader_text'];

    $template = '<nav class="pagination" role="navigation">
        <h2 class="screen-reader-text">%1$s</h2>
        <div class="nav-links">%2$s</div>
    </nav>';
    return sprintf( $template, esc_html( $screen_reader_text ), paginate_links($args) );
}
function gbhem_category_link($link,$id)
{
	return get_post_type_archive_link('publishing').'?cat='.$id;
}
add_filter('category_link','gbhem_category_link', 10, 2);
class GBHEM_Nav_Walker extends Walker_Nav_Menu {
	public $items=array();
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) {
            $output .= "\n$indent<div class='panel'><div class='inner'><ul>\n";
        } else {
            $output .= "\n$indent<ul class='children'>\n";
        }
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) {
            $output .= "$indent</ul></div></div>\n";
        } else {
            $output .= "$indent</ul>\n";
        }
    }
    function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 )
    {
    	parent::start_el( $output, $page, $depth, $args, $current_page);
    	if($depth==0)
    	{
    		$this->items[]=$output;
    		$output="";
    	}

    }
    function end_el( &$output, $page, $depth = 0, $args = array() )
    {
    	parent::end_el( $output, $page, $depth, $args);
    	if($depth==0)
    	{
    		$this->items[count($this->items)-1].=$output;
    		$output="";
    	}

    }
}


// Format correctly the event content
add_filter( 'gbhem_event_content', 'wptexturize'       );
add_filter( 'gbhem_event_content', 'convert_smilies'   );
add_filter( 'gbhem_event_content', 'convert_chars'     );
add_filter( 'gbhem_event_content', 'wpautop'           );
add_filter( 'gbhem_event_content', 'shortcode_unautop' );
add_filter( 'gbhem_event_content', 'do_shortcode'      );