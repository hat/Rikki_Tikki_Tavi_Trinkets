<?php
// session_start();
// require("config.php");
// if (isset$_GET['page'])
// {
//    $pages = array("products", "cart");
//    if (in_array($_GET['page'], $pages))
//        $_page = $_GET['page'];
//    else
//        $_page = 'products';
// }
// else
//    $_page = 'products';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rikki-Tikki-Tavi Gadgets</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Neuton" rel="stylesheet">
</head>
<body>
    <nav>
        <a href="index.html"><img class="logo" src="imgs/Rikki_Tikki_Tavi_Logo.png"/></a>
        <ul>
            <li><a href="gadgets.html">Gadgets</a></li>
            <ul>
                <li>Laser Guns</li>
                <li>Guns</li>
            </ul>
            <li><a href="basket.html">Basket</a></li>
            <li><a href="login.html">Login</a></li>
        </ul>
    </nav>
    <div id="featured-items">
        <h1>Featured</h1>
        <hr>
        <?php include 'featured-items.php';?>
    </div>
    <div id="featured-items">
        <h1>Season 1 Inventions</h1>
        <hr>
        <?php include 'featured_s1.php';?>
    </div>
    <div id="featured-items">
        <h1>Season 2 Inventions</h1>
        <hr>
        <?php include 'featured_s2.php';?>
    </div>
</body>
</html>