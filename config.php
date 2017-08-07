<?php
   define('DB_SERVER', 'localhost:8888');
   define('DB_USERNAME', 'tinyRick');
   define('DB_PASSWORD', 'Wubalubadubdub!');
   define('DB_DATABASE', 'tinyRick');

   $conn = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
    if (!$conn)
        die("Connection Failed: " . mysql_connect_error());
//    $sql = "CREATE DATABASE tinyRick";
//    if (mysql_query($conn, $sql))
//        echo "Database Created Successfully";
    if (!mysql_select_db(DB_DATABASE))
        echo "Error creating database: " . mysql_error($conn);
    
?>