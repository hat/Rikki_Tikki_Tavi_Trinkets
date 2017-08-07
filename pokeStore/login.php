<?php

include("connector.php");

$sql="SELECT * FROM users";
$req=mysqli_query($link,$sql);
$users=[];
while($data=mysqli_fetch_assoc($req)){
   array_push($users, $data);
}
foreach ($users as $key => $value) {
	if ($value["login"] == $_POST["login"] && $value["mdp"] == hash("whirlpool", $_POST["mdp"]))
	{
		$tmp = unserialize($value["cart"]);
		if ($_SESSION["cart"])
		{
			if (!$tmp)
				$tmp = [];
			foreach($tmp as $key2 => $value2)
			{
				if ($_SESSION["cart"][$key2])
				{
					$_SESSION["cart"][$key2]["number"] = $_SESSION["cart"][$key2]["number"] + $value2["number"];
				}
				else
				{
					unset($value2['id']);
					$_SESSION["cart"][$key2] = $value2;
				}
			}
		}
		else
			$_SESSION["cart"] = $tmp;
		$_SESSION["user"] = $value;
		$_SESSION["logged_in"] = $_POST["login"];
		header("Location: index.php");
	}
}
echo '
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
</head>
<body>
	';
	include("header.php");
	echo'
	<form class="jumbotron" action="login.php" method="post">
		<label>Login: </label><input type="text" name="login"><br>
		<label>Password: </label><input type="text" name="mdp"><br>
		<input type="submit" class="btn btn-secondary" name="submit" value=OK>
	</form>
</body>
</html>
';

?>