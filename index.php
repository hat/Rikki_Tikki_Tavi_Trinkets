<?php 
    session_start(); 
    require("connection.php"); 
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
        <a href="index.php"><img class="logo" src="imgs/Rikki_Tikki_Tavi_Logo.png"/></a>
        <ul>
            <li><a href="gadgets.php">Gadgets</a></li>
            <ul>
                <li>Laser Guns</li>
                <li>Guns</li>
            </ul>
            <li><a href="cart.php">Cart</a></li>
<?php 
  
    if(isset($_SESSION['cart'])){ 
          
        $sql="SELECT * FROM products WHERE id_product IN ("; 
          
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
        $query=mysql_query($sql); 
        while($row=mysql_fetch_array($query)){ 
              
        ?> 
            <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?></p> 
        <?php 
              
        } 
    ?> 
        <hr /> 
        <a href="index.php?page=cart">Go to basket</a> 
    <?php 
          
    }else{ 
          
        echo "Your Cart is empty. Please add some products."; 
          
    } 
  
?>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <div id="featured-items">
        <h1>Featured</h1>
        <hr>
        <?php include 'featured_items.php';?>
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