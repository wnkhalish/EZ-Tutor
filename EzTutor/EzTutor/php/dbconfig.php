<?php
$servername = "localhost";
$username = "wnkbtm";
$password = "960623106126";
$dbname = "db_wnkbtm";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    // Below statement for debug only because its shows DB name
    //die("Connection failed: " . $conn->connect_error);
    die("Unable to connect database.");}
?>
