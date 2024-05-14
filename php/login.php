<?php

session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "rememberme";

try {
  $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: ". $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];

  $sql = "SELECT * FROM users WHERE username = :username AND pwd = :pwd";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":pwd", $pwd);
  $stmt->execute();

  if ($stmt->rowCount() == 1) {
    $_SESSION["username"] = $username;
    header("Location: dashbord.php");
  } else {
    echo "Invalid username or password.";
  }
}
$conn = null;





/* session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "rememberme";

try {
  $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: ". $e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["pwd"];

  $sql = "SELECT * FROM users WHERE username = :username AND pwd = :pwd";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":pwd", $pwd);
  $stmt->execute();

  if ($stmt->rowCount() == 1) {
    $_SESSION["username"] = $username;
    header("Location: dashboard.php");
  } else {
    echo "Invalid username or password.";
  }
}*/
?>
