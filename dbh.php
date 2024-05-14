<?php
$servername = "mysql:host=$servername;dbname=myfirstdatabase";
$username1 = "root";
$password = "";

try {
  $pdo = new PDO($servername, $username1, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?> 