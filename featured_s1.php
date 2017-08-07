<?php

echo "hahaha";

include 'connection.php';

if ($result = mysqli_query($link, "SELECT * FROM products", MYSQLI_USE_RESULT)) {

	echo $result;
    /* Note, that we can't execute any functions which interact with the
       server until result set was closed. All calls will return an
       'out of sync' error */
    if (!mysqli_query($link, "SET @a:='this will not work'")) {
        printf("Error: %s\n", mysqli_error($link));
    }
    mysqli_free_result($result);
}
else
	echo "DIDNT WORK FUCKER!";

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