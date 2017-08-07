<?php

include("connector.php");
include("header.php");

	$sql="SELECT * FROM users WHERE id='".$_GET["id"]."'";
	$req=mysqli_query($link,$sql);
	$items=[];
	while($data=mysqli_fetch_assoc($req)){
	   array_push($items, $data);
	}
	$cart = unserialize($items[0]["cart"]);
	echo '<div class="products">';
	if ($cart)
	{
		foreach ($cart as $key => $value) {
			$total += $value["number"] * $value["value"];
			echo ' <form class="item" action="delete.php" method="post">
					<img src="'.$value["img"].'">
				 	<p>name : '.$value["name"].'</p>
				 	<p>value : '.$value["value"].'</p>
				 	<p>number : '.$value["number"].'</p>
				 	<p>category : </p>
				 	Quantity to Remove: 
				 	<input type="text" name="number" value="1"><br>
				 	<input type="hidden" name="name" value="'.$value["name"].'">
				 	<input type="hidden" name="id" value="'.$key.'">
				 	<input type="submit" class="btn btn-secondary" name="delete" value="delete">
				 </form>';
		}
	}
	echo '</div>';