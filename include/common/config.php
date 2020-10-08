<?php
$servername="localhost";
$username="root";
$password="9898";
$dbname="nature";

$conn =mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
?>