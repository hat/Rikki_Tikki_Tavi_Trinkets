<?php
include("connector.php");
if ($_SESSION["user"]["admin"] != 1)
	header("Location:index.php");

include("header.php");
include("header-admin.php");

if ($_POST["submit"] == "add" && $_POST["name"])
{
	$sql="SELECT * FROM category";
	$req=mysqli_query($link,$sql);
	$categorys=[];
	while($data=mysqli_fetch_assoc($req))
		array_push($categorys, $data);
	foreach ($categorys as $key => $value)
	{
		if ($value["name"] == $_POST["name"])
		{
			$error = 1;
			break; 
		}
	}
	if ($error != 1)
	{
		$sql="INSERT INTO category (name) VALUES ('".$_POST['name']."')";
			$req=mysqli_query($link,$sql);
	}
}

?>

<div style="margin:0 auto;width:50%;">
<?php 
echo '
<form class="item" style="float:none; margin:0 auto;" action="add_category.php" method="post">
	<label>Name: </label><input type="text" name="name"><br>
	<input type="submit" class="btn btn-secondary" name="submit" value="add">
</form>';
?>
</div>
