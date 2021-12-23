<?php
//credentials for DB 
$servernameDB  = "localhost"; 
$usernameDB    = "root";
$passwordDB    = "";
$databaseNameDB = "igAnalyzer";

@$conn = new mysqli($servernameDB, $usernameDB, $passwordDB, $databaseNameDB);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
