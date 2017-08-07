<?php

include("connector.php");
include("header.php");


?>
<form action="index.php" method="post">
	<select name="form">
	<?php 
	$sql="SELECT * FROM category";
	$req=mysqli_query($link,$sql);
	$items=[];
	while($data=mysqli_fetch_assoc($req)){
	   array_push($items, $data);
	}
	foreach ($items as $key => $value) {
		if ($_POST["form"] && $value["name"] == $_POST["form"])
		{
			echo '
			<option value="'.$value["name"].'" name="toto" selected>'.$value["name"].'</option>
			';
		}
		else
		{
				echo '
			<option value="'.$value["name"].'" name="toto">'.$value["name"].'</option>
			';	
		}
	}

	?>
	</select>
	<input type="submit" class="btn btn-secondary">
</form>

	 <div class="products container">

		<?php
		$sql="SELECT * FROM cart";
		$req=mysqli_query($link,$sql);
		$items=[];
		while($data=mysqli_fetch_assoc($req)){
		   array_push($items, $data);
		}
		foreach ($items as $key => $value) {
			$categorys = explode(";", $value["category"]);
			if ($_POST["form"])
			{
				if (in_array($_POST["form"], $categorys))
				{
				echo ' <form class="item col" action="add.php" method="post">
					<img src="'.$value["img"].'">
				 	<p>name : '.$value["name"].'</p>
				 	<p>price : '.$value["value"].' BTC</p>
				 	Quantity: <input type="text" name="number" value="1">';
				 	echo '
				 	<input type="submit" class="btn btn-secondary" name="submit" value="OK">
				 	<input type="hidden" name="img" value="'.$value["img"].'">
				 	<input type="hidden" name="value" value="'.$value["value"].'">
				 	<input type="hidden" name="name" value="'.$value["name"].'">
				 	<input type="hidden" name="id" value="'.$value["id"].'">
				 </form>';
				}
			}
			else
			{
				echo ' <form class="item col" action="add.php" method="post">
					<img src="'.$value["img"].'">
				 	<p>name : '.$value["name"].'</p>
				 	<p>price : '.$value["value"].' BTC</p>
				 	Quantity: <input type="text" name="number" value="1">';
				 	echo '
				 	<input type="submit" class="btn btn-secondary" name="submit" value="OK">
				 	<input type="hidden" name="img" value="'.$value["img"].'">
				 	<input type="hidden" name="value" value="'.$value["value"].'">
				 	<input type="hidden" name="name" value="'.$value["name"].'">
				 	<input type="hidden" name="id" value="'.$value["id"].'">
				 </form>';
			}

		}
		 ?>

	 </div>

</body>
</html>