<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'tinyRick');
   define('DB_PASSWORD', 'Wubalubadubdub!');
   define('DB_DATABASE', 'tinyRick');

   $conn = mysqli_connect("localhost","tinyRick","Wubalubadubdub!","tinyRick");
    if (!$conn)
        die("Connection Failed: " . mysqli_connect_error());
    if (!mysqli_select_db(DB_DATABASE))
        echo "Error creating database: " . mysqli_error($conn);
    
?>