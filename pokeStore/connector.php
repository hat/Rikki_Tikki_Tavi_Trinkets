<?php
session_start();
$host="localhost";
$database="rush00";
$user="root";
$pass="jules";
$link=mysqli_connect($host,$user,$pass);
$sql="CREATE DATABASE rush00";
$req=mysqli_query($link, $sql);
mysqli_select_db($link, $database);


