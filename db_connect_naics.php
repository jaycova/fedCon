<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
$servername = "localhost";
$username = "root";
$password = "RFVbgt%6";
$dbname = "NAICS";


// Create connection
$conn = new mysqli($servername, $username, $password , $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
#echo "Connected successfully";

