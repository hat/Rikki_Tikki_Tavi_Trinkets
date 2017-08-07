<?php
echo sqlite_libversion();
echo "<br>";
echo phpversion();
?>

<?php
$dbhandle = sqlite_open('db/pickleRick.db', 0666, $error);
if (!$dbhandle) die ($error);
$stm = "CREATE TABLE users(Id integer PRIMARY KEY," . 
       "Name text UNIQUE NOT NULL, Admin text CHECK(Admin IN ('TRUE', 'FALSE')))";
$ok = sqlite_exec($dbhandle, $stm, $error);

if (!$ok)
   die("Cannot execute query. $error");

echo "Database users created successfully";

sqlite_close($dbhandle);
?>
