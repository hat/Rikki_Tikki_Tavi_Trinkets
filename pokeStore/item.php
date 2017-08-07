<?php 
include("connector.php");

if ($_POST["delete"])
{
	$sql = "DELETE FROM cart WHERE id = '".$_POST["id"]."'";
	$req = mysqli_query($link,$sql);
}
if ($_POST["maj"])
{
	$sql="SELECT * FROM category";
	$req=mysqli_query($link,$sql);
	$categorys=[];
	while($data=mysqli_fetch_assoc($req))
		array_push($categorys, $data);
	$category = "";
	foreach ($categorys as $key => $value)
	{
		if ($_POST[$value["name"]])
		{
			if ($category != "")
				$category = $category.";".$value["name"];
			else
				$category = $value["name"];
		}
	}
	$sql="UPDATE cart SET 
	name = '".$_POST["name"]."' ,
	value = '".$_POST["value"]."' ,
	img = '".$_POST["img"]."' ,
	category = '".$category."' 
	WHERE id='".$_POST["id"]."'";
	$req=mysqli_query($link,$sql);
}
header("Location:admin.php");


?>