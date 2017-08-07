<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pokemon store</title>
	<link href="styles.css" rel="stylesheet" media="all" type="text/css">
	<link href="https://takezero.in/static/css/pokemon.css" rel="stylesheet" media="all" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="icon" href="img/favicon.ico" />
</head>
<body>
<div class="name">
		<?php 
		if ($_SESSION["logged_in"])
			echo "Signed In: ".ucwords($_SESSION["logged_in"]);

		 ?>

	</div>
<div class="navbar navbar-default">
	<h1>42 Pokemon Store</h1>
	<div class="menu">

<?php 

echo '<a class ="menu_inside" href="index.php">Home</a>';	
	if ($_SESSION["logged_in"])
	{
		echo '<a class ="menu_inside" href="account.php">Manage my account</a><br>';
		echo '<a class ="menu_inside" href="logout.php">Sign Out</a><br>';

	}
	else
	{
		echo '<a class ="menu_inside" href="login.php">Sign In</a><br>';
		echo '<a class ="menu_inside" href="create_account.php">Create an account</a><br>';
	}
	echo '<a class ="menu_inside" href="cart.php">My cart</a><br>';
	if ($_SESSION["user"]["admin"] == 1)
		echo '<a class ="menu_inside" href="admin.php">Admin</a><br>';
?>
	</div>
</div>
