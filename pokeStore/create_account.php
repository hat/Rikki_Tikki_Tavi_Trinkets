<?php

include("connector.php");

$error = 0;
$sql="SELECT * FROM users";
$req=mysqli_query($link,$sql);
$users=[];
while($data=mysqli_fetch_assoc($req)){
   array_push($users, $data);
}
foreach ($users as $key => $value) {
	if ($value["login"] == $_POST["login"])
	{
		$error = 1;
	}
}
if ($_POST["login"] && $_POST["mdp"] && !$error)
{
	$sql="INSERT INTO users (login, mdp, cart, admin) VALUES ('".$_POST['login']."', '".hash("whirlpool", $_POST['mdp'])."', '', 0)";
	$req=mysqli_query($link,$sql);
	$_SESSION["logged_in"] = $_POST['login'];
	header("Location: index.php");
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
	if ($error == 1)
		echo "Login deja utilisé";
	echo '
	<form class="jumbotron" action="create_account.php" method="post">
		<label>Login: </label><input type="text" name="login"><br>
		<label>Password: </label><input type="text" name="mdp"><br>
		<input type="submit" class="btn btn-secondary" name="submit" value=OK>
	</form>
</body>
</html>
';