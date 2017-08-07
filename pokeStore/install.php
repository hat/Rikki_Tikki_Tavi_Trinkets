<?php
include("connector.php");
$sql = "CREATE DATABASE IF NOT EXISTS rush00";
$req = mysqli_query($link,$sql);
$sql="CREATE TABLE `rush00`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `login` TEXT NOT NULL , `mdp` TEXT NOT NULL , `cart` TEXT NOT NULL , `admin` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$req=mysqli_query($link,$sql);
$sql = "INSERT INTO users (login, mdp, cart, admin) VALUES ('admin', '".hash("whirlpool", "admin")."', '', 1)";
$req=mysqli_query($link,$sql);
$sql="CREATE TABLE `rush00`.`cart` ( `id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `value` TEXT NOT NULL , `img` TEXT NOT NULL , `category` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$req=mysqli_query($link,$sql);
$sql="CREATE TABLE `rush00`.`category` ( `id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$req=mysqli_query($link,$sql);
mysqli_select_db($link,'rush00');
// $sql = "CREATE TABLE IF NOT EXISTS category ( id INT(6), name VARCHAR(30) NOT NULL, articles VARCHAR(100))";
// $req = mysqli_query($link,$sql); //condition verif create
	$sql = "INSERT INTO category (name) VALUES ('Normal')";
	$req=mysqli_query($link,$sql);
	$sql = "INSERT INTO category (name) VALUES ('Fire')";
	$req=mysqli_query($link,$sql);
	$sql = "INSERT INTO category (name) VALUES ('Water')";
	$req=mysqli_query($link,$sql);
	$sql = "INSERT INTO category (name) VALUES ('Electric')";
	$req=mysqli_query($link,$sql);
	$sql = "INSERT INTO category (name) VALUES ('Grass')";
	$req=mysqli_query($link,$sql);
	$sql = "INSERT INTO category (name)
	VALUES ('Ice')";
	$req=mysqli_query($link,$sql);
	$sql = "INSERT INTO category (name)
	VALUES ('Poison')";
	$req=mysqli_query($link,$sql);
	$sql = "INSERT INTO category (name)
	VALUES ('Ground')";
	$req=mysqli_query($link,$sql);
	$sql = "INSERT INTO category (name)
	VALUES ('Bug')";
	$req=mysqli_query($link,$sql);
	$sql = "INSERT INTO category (name)
	VALUES ('Ghost')";
	$req=mysqli_query($link,$sql);
	$sql = "INSERT INTO category (name)
	VALUES ('Steel')";
	$req=mysqli_query($link,$sql);
	$sql = "INSERT INTO category (name)
	VALUES ('Fairy')";
	$req=mysqli_query($link,$sql);



$sql = "CREATE TABLE IF NOT EXISTS cart ( id INT(6), name VARCHAR(30) NOT NULL, category VARCHAR(100), value INT(6), img VARCHAR(100))";
$req = mysqli_query($link,$sql);
	$elem = 1;
	while ($elem != 151) //nb element
	{
		if (!$content)
			$content = file_get_contents("http://pokemondb.net/pokedex/bulbasaur");
		else if ($content)
		{
			preg_match('/<a rel=\"next\" class=\"entity-nav-next\" href=\"(.*?)\">/', $content, $match);
			$url = "http://pokemondb.net".$match[1];
			$content = file_get_contents($url);
		}
		preg_match('/<h1>(.*)<\/h1>/', $content, $match);
		$name = $match[1];
		preg_match('/<p><em>(.*?)<\/p>/', $content, $match);
		preg_match_all('/<a (.*?)>(.*?)<\/a/', $match[1], $new);
		$category = $new[2][0].";".$new[2][1];
		preg_match('/<img src=\"(.*?)\"/', $content, $new);
		$img = $new[1];
		preg_match('/<td class=\"num-total\"><b>(.*)<\/b/', $content, $new);
		$ct = $new[1];
		preg_match('/<th>Base EXP<\/th>\n\t\t\t\t<td>(.*)</', $content, $new);
		$ct *= $new[1];
		preg_match('/<th>Catch rate<\/th>\n\t\t\t\t<td>(.*)<sm/', $content, $new);
		$ct /= $new[1];
		$val = round($ct);
		$sql = "INSERT INTO cart (id, name, category, value, img)
		VALUES ('".$elem."', '".$name."', '".$category."', '".$val."', '".$img."')";
		$req = mysqli_query($link,$sql);
		//echo $name."  ".$category."  ".$img."  \n";
		$elem++;
	}
header("Location: logout.php");