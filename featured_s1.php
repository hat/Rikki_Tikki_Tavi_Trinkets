<?php


$query="SELECT column FROM table ORDER BY RAND() LIMIT 4";
$results = mysql_query($query);

while ($row = mysql_fetch_array($results)) {
    echo "{$row}";
}

// $file = fopen("featured_s1", "r");
// if ($file) {

// 	$i = 0;
// 	$items = [];

//     while (($line1 = fgets($file)) !== false) {
//     	if (($line2 = fgets($file)) !== false) {
//     		if (($line3 = fgets($file)) !== false) {
//     			$items[i] = array(
//         			"img" => $line1,
//         			"name" => $line2,
//         			"price" => $line3
//         		);
//     		}
//     	}
//     	echo "<div class=\"featured\">
//             	<img src=\"{$items[i]["img"]}\">
//             	<h4>{$items[i]["name"]}</h4>
//             	<p>{$items[i]["price"]}</p>
//         	</div>";
//         $i++;
//     }

//     fclose($file);
// }

?>