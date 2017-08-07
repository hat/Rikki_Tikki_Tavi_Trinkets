<?php
include("connector.php");
if ($_SESSION["user"]["admin"] != 1)
	header("Location:index.php");

include("header.php");
include("header-admin.php");

if ($_POST["delete"])
{
	$sql = "DELETE FROM category WHERE id = '".$_POST["id"]."'";
	$req = mysqli_query($link,$sql);
}
if ($_POST["maj"])
{
	$sql="UPDATE category SET 
	name = '".$_POST["name"]."'
	WHERE id='".$_POST["id"]."'";
	$req=mysqli_query($link,$sql);
}

?>
<div class="products">

		<?php
		$sql="SELECT * FROM category";
		$req=mysqli_query($link,$sql);
		$items=[];
		while($data=mysqli_fetch_assoc($req)){
		   array_push($items, $data);
		}
		foreach ($items as $key => $value) {
			echo ' <form class="item" action="categorys.php" method="post"
				 	<label>Name: </label><input type="text" name="name" value="'.$value["name"].'"><br>
				 	<input type="hidden" name="id" value="'.$value["id"].'"><br>
				 	<input type="submit" class="btn btn-secondary" name="maj" value="Update"><br>
				 	<input type="submit" class="btn btn-secondary" name="delete" value="delete">
				 </form>';
		}
		 ?>

	 </div>