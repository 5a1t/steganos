<?php

//load library
require_once('./include/simple_html_dom.php');
require_once('./include/url_to_absolute.php');

$url = "http://127.0.0.1/index.php";
$html = file_get_html($url);

$count = 0;
$found = 0;


while(true){

//load it twice the first time.. sloppy yeah.
$html = file_get_html($url);

foreach($html->find('img[src$=.jpg]') as $image){
	$image = url_to_absolute($url, $image -> src);
	//echo $image, "\n";

	//save image.
	copy($image, 'test.jpg');

	$checksum = md5_file('test.jpg');

	//checksum of d835884373f4d6c8f24742ceabe74946 means file is missing.
	if($checksum != 'd835884373f4d6c8f24742ceabe74946'){
	    $count++;
	    $output = shell_exec('stegdetect test.jpg');
	    
	    //check if stegdetect worked
	    $star_count = substr_count($output, '***');
	    $camo_count = substr_count($output, 'camouflage');
	    if(($star_count > 0) || ($camo_count > 0)){
                $found++;
		$actual_name = substr($image,19,27);
		shell_exec('mv test.jpg data/hits/'.$actual_name);
	    }

	}
}

echo 'FOUND: '.$found.'//'.$count;

}
?>