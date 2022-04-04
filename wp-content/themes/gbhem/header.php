<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GBHEM
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script>
  /* https://github.com/madmurphy/cookies.js (GPL3) */
var docCookies={getItem:function(e){return e&&decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*"+encodeURIComponent(e).replace(/[\-\.\+\*]/g,"\\$&")+"\\s*\\=\\s*([^;]*).*$)|^.*$"),"$1"))||null},setItem:function(e,o,t,n,r,c){if(!e||/^(?:expires|max\-age|path|domain|secure)$/i.test(e))return!1;var s="";if(t)switch(t.constructor){case Number:s=t===1/0?"; expires=Fri, 31 Dec 9999 23:59:59 GMT":"; max-age="+t;break;case String:s="; expires="+t;break;case Date:s="; expires="+t.toUTCString()}return document.cookie=encodeURIComponent(e)+"="+encodeURIComponent(o)+s+(r?"; domain="+r:"")+(n?"; path="+n:"")+(c?"; secure":""),!0},removeItem:function(e,o,t){return!!this.hasItem(e)&&(document.cookie=encodeURIComponent(e)+"=; expires=Thu, 01 Jan 1970 00:00:00 GMT"+(t?"; domain="+t:"")+(o?"; path="+o:""),!0)},hasItem:function(e){return!(!e||/^(?:expires|max\-age|path|domain|secure)$/i.test(e))&&new RegExp("(?:^|;\\s*)"+encodeURIComponent(e).replace(/[\-\.\+\*]/g,"\\$&")+"\\s*\\=").test(document.cookie)},keys:function(){for(var e=document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g,"").split(/\s*(?:\=[^;]*)?;\s*/),o=e.length,t=0;t<o;t++)e[t]=decodeURIComponent(e[t]);return e},clear:function(e,o){for(var t=this.keys(),n=t.length,r=0;r<n;r++)this.removeItem(t[r],e,o)}};"undefined"!=typeof module&&void 0!==module.exports&&(module.exports=docCookies);
//# sourceMappingURL=cookies.min.js.map
</script>
	<script> var selectSearchData =
<?php
$selectsearch =array();
if( have_rows('select_search','options') ):// check if the repeater field has rows of data
   while ( have_rows('select_search','options') ) : the_row(); 	// loop through the rows of data
     $iama = ucwords(get_sub_field('iama'));//uppercase the potential key
     $text = get_sub_field('looking_for_text');
     if(!array_key_exists($iama,$selectsearch)){//assoc array item doesnt exist so create it;
			$selectsearch[$iama]=array();
     }
	  array_push($selectsearch[$iama],$text);
	endwhile;
endif;
echo json_encode($selectsearch, JSON_PRETTY_PRINT); ?>
</script>
<link rel='stylesheet'  href='/wp-content/themes/gbhem/style-mark.css' type='text/css' media='all' />
	<?php wp_head(); ?>
<meta name="google-site-verification" content="wbPb2zVUoM8W-rPZZI__dLlNtbg_76hBj6XWrHUt3r0" />
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '235002328333525');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=235002328333525&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>

<body <?php body_class(); ?>>
	<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
	<div class="gbhem-top-bar">
			<div class="container">
				<div class="row justify-content-between">

				    <div class="gbhem-top-bar-slogan col">
				    	<p><?php $gbhem_description = get_bloginfo( 'description', 'display' ); echo $gbhem_description; ?></p>
				    </div><!-- .gbhem-top-bar-slogan -->

				    <div class="col-7 gbhem-top">
					    <div class="row align-items-end">

					    	<div class="gbhem-top-bar-menu col-9">
					    		<?php
					    		wp_nav_menu( array(
									'theme_location' => 'top',
									'depth'			=>1
								) );
								?>
					    	</div><!-- .gbhem-top-bar-menu -->

					    	<div class="gbhem-language-menu col">

						      <span class="gbhem-language-selector">Language Selection: <i class="fas fa-caret-down"> </i><span id="currentlang">English</span>
								    <div class="switcher notranslate">
								      <div class="option">
								        <a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="nturl ">English</a>
								        <a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="nturl ">French</a>
								        <a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="nturl ">German</a>
								        <a href="#" onclick="doGTranslate('en|ko');return false;" title="Korean" class="nturl ">Korean</a>
								        <a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="nturl ">Portuguese</a>
								        <a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian" class="nturl ">Russian</a>
								        <a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="nturl ">Spanish</a>
								        <a href="#" onclick="doGTranslate('en|zh-CN');return false;" title="Chinese" class="nturl ">Chinese</a>
								        <a href="#" onclick="doGTranslate('en|tl');return false;" title="Filipino" class="nturl ">Filipino</a>
								      </div>
								    </div>
								  </span>

								  <script type="text/javascript">


								    function GTranslateFireEvent(a, b) {
					            try {
				                if (document.createEvent) {
			                    var c = document.createEvent("HTMLEvents");
			                    c.initEvent(b, true, true);
			                    a.dispatchEvent(c)
				                } else {
			                    var c = document.createEventObject();
			                    a.fireEvent('on' + b, c)
				                }
					            } catch (e) {}
						        }
						        function doGTranslate(a) {

					            if (a.value) a = a.value;
					            if (a == '') return;
					            var b = a.split('|')[1]; //gran the country abbr from val
					            var c;
					            var d = document.getElementsByTagName('select');
					            for (var i = 0; i < d.length; i++) if (d[i].className == 'goog-te-combo') c = d[i]; // trigger the selected
					            //console.log(1)
											var langdisplay = document.getElementById('currentlang');
											langdisplay.innerHTML='';
											//console.log(2)

					            if (document.getElementById('google_translate_element2') == null || document.getElementById('google_translate_element2').innerHTML.length == 0 || c.length == 0 || c.innerHTML.length == 0) {
				                setTimeout(function() {
				                    doGTranslate(a)
				                }, 500)
					            } else {

											var langdisplay = document.getElementById('currentlang');
												langdisplay.innerHTML='';
				                c.value = b; //lang abbr
				                GTranslateFireEvent(c, 'change');

					              //console.log('change text',c,c.value,c.selectedIndex)
					              //console.log("index: ", si, "lang: ",langtext)

				                GTranslateFireEvent(c, 'change');
				                var si = c.selectedIndex;
				                if(si!=-1){

					                var optval = c.options[si].text;
					                if(optval!=undefined){
					                	var langtext = optval;
					                }
				                }else{
				                	var langtext = "English"; //setup default value
				                }

				                setTimeout(function() {
					                if(langtext=="Select Language"){
						                langdisplay.innerHTML = "English"
						              }else{
													langdisplay.innerHTML = langtext;
													}
				                }, 500)

					            }


						        }
						      </script>

							    <div id="google_translate_element2"></div>
							    <script type="text/javascript">function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en', autoDisplay: false}, 'google_translate_element2');}</script>
							    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
					    	</div><!-- .gbhem-language-menu -->

					    	<div class="gbhem-search-icon">
<!-- 						    	<a href="#"><i class="fas fa-search"></i></a> -->
									<button type="button" id="headersearchtoggle"><i class="fas fa-search"></i></button>

									<div class="gbhem-header-search">
										<?php get_search_form();?>
										<!--
										<div>
										I am a	<select name="" class="selectgroup"></select>
										Looking for <select name="" class="selectgroupurls"></select>
											<button name="" class="selectsearchgo">Go</button>
										</div>-->
									</div>

					    	</div>

					    	<!-- start -->
					    	<?php #include('template-parts/selectsearch.php'); ?>


					    	<!-- end -->


					    </div><!-- .row -->
				    </div><!-- .col -->

				</div><!-- .row -->
			</div><!-- .container-fluid -->
		</div><!-- .gbhem-top-bar -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gbhem' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="navbar navbar-expand-lg navbar-light">
			<div id="site-navigation" class="main-navigation gbhem-navigation-menu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'depth'			=>1
				) );
				?>
			</div><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content" data-template="<?php echo get_page_template(); ?>">
