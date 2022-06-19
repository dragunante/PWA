<?php

$lh = "localhost";
$username = "root";
$password = "";
$db = "bbc";

$dbc = mysqli_connect($lh, $username, $password, $db) or 
die('Error connecting to MySQL server.'. mysqli_connect_error());

?>