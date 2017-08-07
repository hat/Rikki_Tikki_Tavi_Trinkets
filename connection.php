<?php

session_start();
$host="localhost";
$user="tinyRick";
$pass="Wubalubadubdub!";
$database="tinyRick";
$link=mysqli_connect($host,$user,$pass);
$sql="CREATE DATABASE tinyRick";
$req=mysqli_query($link, $sql);
mysqli_select_db($link, $database);

//	$link = mysqli_connect("localhost","tinyRick","Wubalubadubdub!","tinyRick") or die("Error " . mysqli_error($link)); 
?>