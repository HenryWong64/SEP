<?php
//database local address
$dbhost= "localhost";
//database user
$dbuser= "testuser";
//database password
$dbpassword= "password";
//database name
$dbname= "datastores";

//check if connection is successfuly created
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if ($connection==false){
    echo"Error, cannot connect";
}

echo "<br>";
?>