<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rikki-Tikki-Tavi Gadgets</title>
    <link rel="stylesheet" type="text/css" href="main.css">
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
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <h1>View cart</h1> 
    <a href="index.php?page=products">Go back to products page</a> 
    <form method="post" action="index.php?page=cart"> 
          
        <table> 
              
            <tr> 
                <th>Name</th> 
                <th>Quantity</th> 
                <th>Price</th> 
                <th>Items Price</th> 
            </tr> 
              
            <?php 
              
                $sql="SELECT * FROM products WHERE id_product IN ("; 
                          
                        foreach($_SESSION['cart'] as $id => $value) { 
                            $sql.=$id.","; 
                        } 
                          
                        $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                        $query=mysql_query($sql); 
                        $totalprice=0; 
                        while($row=mysql_fetch_array($query)){ 
                            $subtotal=$_SESSION['cart'][$row['id_product']]['quantity']*$row['price']; 
                            $totalprice+=$subtotal; 
                        ?> 
                            <tr> 
                                <td><?php echo $row['name'] ?></td> 
                                <td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td> 
                                <td><?php echo $row['price'] ?>$</td> 
                                <td><?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?>$</td> 
                            </tr> 
                        <?php 
                              
                        } 
            ?> 
                        <tr> 
                            <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
                        </tr> 
              
        </table> 
        <br /> 
        <button type="submit" name="submit">Update Cart</button> 
    </form> 
    <br /> 
    <p>To remove an item, set it's quantity to 0. </p>
</body>
</html>