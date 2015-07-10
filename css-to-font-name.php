<?php

$fa_contents = file_get_contents('flaticon.css');


//$regexp = '/\.([a-z0-9-]{7,})/i';

//$regexp2 = '/(\.[a-z0-9-]{7,})/i';



$flaticon = '/.flaticon-([^:|^"]+):before/i';

$fontawesome = '/.fa-([^:|^"]+):before/i';

$variable_name = '$flaticon_icons';

$prefix = 'flaticon-';


preg_match_all($flaticon, $fa_contents, $matches);



// print_r($matches);




// writing array

$content = '<?php

'.$variable_name.' = array(' . "\n";


$iconsArray = array();



foreach( $matches[1] as $icon ){

	$arr_index = $prefix . trim($icon);
	$arr_value = trim($icon);
	$iconsArray[] = "\tarray('". $arr_index . "'=>'" . $arr_value . "')"; 
}

$content .= implode(','."\n", $iconsArray);
$content .= "\n".');';
?>

<h1>Total: <?php echo count($iconsArray) ?> Icons :)</h1>



<textarea style="width: 900px;
height: 400px;
font-family: monospace;
font-size: large;"><?php echo $content ?></textarea>

