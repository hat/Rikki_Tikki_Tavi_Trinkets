<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'tinyRick');
   define('DB_PASSWORD', 'Wubalubadubdub!');
   define('DB_DATABASE', 'tinyRick');

   $conn = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
    if (!$conn)
        die("Connection Failed: " . mysql_connect_error());
    if (!mysql_select_db(DB_DATABASE))
        echo "Error creating database: " . mysql_error($conn);
    
?>