<?php
include("connector.php");

if ($_GET["clear"] == "true")
{
	unset($_SESSION["cart"]);
}
if ($_POST["delete"] && $_POST["number"] && $_POST["id"])
{
	if ($_SESSION["cart"][$_POST["id"]])
	{
		if ($_POST["number"] >= $_SESSION["cart"][$_POST["id"]]["number"])
		{
			unset($_SESSION["cart"][$_POST["id"]]);
		}
		else
		{
			$_SESSION["cart"][$_POST["id"]]["number"] = $_SESSION["cart"][$_POST["id"]]["number"] - $_POST["number"];
		}
	}
}
header("Location: cart.php");