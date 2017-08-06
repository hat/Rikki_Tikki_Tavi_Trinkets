<?php
session_start();
require("config.php");
if (isset$_GET['page'])
{
    $pages = array("products", "cart");
    if (in_array($_GET['page'], $pages))
        $_page = $_GET['page'];
    else
        $_page = 'products';
}
else
    $_page = 'products';
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
        <div class="featured">
            <img src="imgs/invention_freeze_ray.jpg">
            <h4>Freeze Ray</h4>
            <p>$150</p>
        </div>
        <div class="featured">
            <img src="imgs/invention_neutrino_bomb.png">
            <h4>Neutrino Bomb</h4>
            <p>$150</p>
        </div>
        <div class="featured">
            <img src="imgs/invention_portal_gun.jpg">
            <h4>Portal Gun</h4>
            <p>$150</p>
        </div>
        <div class="featured">
            <img src="imgs/invention_space_cruiser.png">
            <h4>Space Cruiser</h4>
            <p>$150</p>
        </div>
    </div>
</body>
</html>
