<?php
/*
 * Template Name: Placeholder
 */
the_post();
$page=get_field('page');
if(!$page)
	echo 'Missing page';
wp_redirect($page);
?>