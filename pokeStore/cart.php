<?php

include("connector.php");
include("header.php");

if ($_GET["clear"] == "true")
{
	$_SESSION["cart"] = [];
	$sql="UPDATE users SET cart = '' WHERE login='".$_SESSION["logged_in"]."'";
	$req=mysqli_query($link,$sql);
}


if ($_SESSION["cart"])
{
	echo '<div class="menu">';
	echo '<a class="menu_inside" href="add.php?archive=true">Archive the cart</a><br>';
	echo '<a class="menu_inside" href="cart.php?clear=true">Clear cart</a><br>';
	echo '</div>';
	echo '<div class="products">';
	foreach($_SESSION["cart"] as $key => $value)
	{
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
	echo '<div class="total">Total = '.$total.' BTC</div>';
	echo '</div>';
}
