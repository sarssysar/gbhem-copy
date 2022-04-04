<?php 
// loop all the fields, build an array of arrays for each iama type with questions, 
/*
	array[
	students=["link text"=>"url","link text"=>"url"]
	pastors=["link text"=>"url","link text"=>"url"]
	];
*/
$selectsearch =array();

if( have_rows('select_search','options') ):// check if the repeater field has rows of data
  while ( have_rows('select_search','options') ) : the_row(); 	// loop through the rows of data 
    $iama = ucwords(get_sub_field('iama'));//uppercase the potential key
    $text = get_sub_field('looking_for_text');
    $link = get_sub_field('looking_for_page_link');
   
    if(!array_key_exists($iama,$selectsearch)){//assoc array item doesnt exist so create it;
			$selectsearch[$iama]=array();
    }
	  $selectsearch[$iama][$text]=$link; // add to array
 
	endwhile;
endif;

//print_r($selectsearch);
?>