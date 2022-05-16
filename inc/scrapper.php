<?php
    include "simple_html_dom.php"; // the url from where content to be scrapped

    $url = 'https://civica-inc.hiringthing.com';

    //processing to get the content
    $response = file_get_contents($url);

    $html = new simple_html_dom();
    $html->load($response);

    //storing the required info in an array for further processing
    $jobs = array();
	$i = 0 ;
	foreach($html->find('div[class=job-container] h2') as $title) {		
		$jobs[$i]['title'] = trim($title->plaintext);  
		$i++;
	}
    
    $i = 0 ;
	foreach($html->find('div[class=job-location]') as $location) {		
		$jobs[$i]['location'] = trim($location->plaintext);  
		$i++;
	}
    $i = 0 ;
	foreach($html->find('div[class=job-title-and-category] a') as $link) {		
		$jobs[$i]['link'] = $url.trim($link->href);
		$i++;
	}
    $i = 0 ;
	foreach($html->find('div[class=job-description]') as $desc) {		
		$jobs[$i]['description'] = trim($desc->plaintext);
		$i++;
	}
?>