<?php
include("connector.php");
if ($_SESSION["user"]["admin"] != 1)
	header("Location:index.php");

include("header.php");
include("header-admin.php");

?>
<div class="products">

		<?php
		$sql="SELECT * FROM cart";
		$req=mysqli_query($link,$sql);
		$items=[];
		while($data=mysqli_fetch_assoc($req)){
		   array_push($items, $data);
		}
		$sql="SELECT * FROM category";
		$req=mysqli_query($link,$sql);
		$categorys=[];
		while($data=mysqli_fetch_assoc($req)){
		   array_push($categorys, $data);
		}
		foreach ($items as $key => $value) {
			$categoryitem = explode(";", $value["category"]);
			echo ' <form class="item" action="item.php" method="post">
				<img src="'.$value["img"].'"><br>
			 	<label>Img src: </label><input type="text" name="img" value="'.$value["img"].'"><br>
			 	<label>Value: </label><input type="text" name="value" value="'.$value["value"].'"><br>
			 	<label>Name: </label><input type="text" name="name" value="'.$value["name"].'"><br>';
			 	foreach ($categorys as $key => $value2) {
			 		if (in_array($value2["name"], $categoryitem))
		 				echo '<input type="checkbox" name="'.$value2["name"].'" value="'.$value2["name"].'" checked>'.$value2["name"].'<br>';
			 		else
	 					echo '<input type="checkbox" name="'.$value2["name"].'" value="'.$value2["name"].'">'.$value2["name"].'<br>';
				}
			 	echo '
			 	<input type="hidden" name="id" value="'.$value["id"].'"><br>
			 	<input type="submit" class="btn btn-secondary" name="maj" value="Update"> 
			 	<input type="submit" class="btn btn-secondary" name="delete" value="delete">
			 </form>';
		}
		 ?>

	 </div>