<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"]; 
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    try {
        $servername = "mysql:host=$servername;dbname=rememberme";
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
        

        $query = "INSERT INTO users (username, pwd,  email) VALUES( :username , :pwd , :email );";

        $stmt = $pdo ->prepare($query);

        $stmt -> bindParam( ":username" , $username);
        $stmt -> bindParam( ":pwd" , $pwd);
        $stmt -> bindParam( ":email" , $email);

        $stmt ->execute(); // [$username,$pwd,$email] not needed anymore due to bindParam

        $pdo = NULL;
        $stmt = NULL;

        header("Location: ../index.html");

        die();
    } catch (PDOException $e) {
        die("Query Failed: "  .  $e -> getMessage());
    }


}
else {
    header("Location: ../index.html");
}