<?php
include("connector.php");

if ($_GET["archive"] == "true")
{
	$sql="UPDATE users SET cart = '".serialize($_SESSION["cart"])."' WHERE login='".$_SESSION["logged_in"]."'";
	$req=mysqli_query($link,$sql);
	header("Location: cart.php");
}
if ($_POST["id"] && $_POST["submit"] == "OK" && $_POST["number"])
{
	if ($_SESSION["cart"])
	{
			if ($_SESSION["cart"][$_POST["id"]]["number"])
			{
				$_SESSION["cart"][$_POST["id"]]["number"] = $_SESSION["cart"][$_POST["id"]]["number"] + $_POST["number"];
				$ok = 1;
			}
	}
	if ($ok != 1)
	{
		$item["value"] = $_POST["value"];
		$item["img"] = $_POST["img"];
		$item["number"] = $_POST["number"];
		$item["name"] = $_POST["name"];
		$_SESSION["cart"][$_POST["id"]]  = $item;
	}
}
header("Location: index.php");

?>