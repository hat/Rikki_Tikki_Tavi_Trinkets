<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="login.css">
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
    <form action="login_script.php" method="POST">
        <label>Username: <input class="input-box" type="text" name="login" value="" /></label>
        <br />
        <label>Password: <input class="input-box" type="password" name="passwd" value="" /></label>
        <br />
        <input class="btn-submit" type="submit" name="submit" value="OK"/>
    </form>
    <div id="create-account">
        <p>or</p>
        <h4><a href="/create_new_account.html">Create an Account</a></h4>
    </div>
</body>
</html>
