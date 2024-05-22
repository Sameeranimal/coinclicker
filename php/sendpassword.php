<?php

// Database configuration
$dsn = "mysql:host=localhost;dbname=rememberme;charset=utf8mb4";
$username = "root";
$password = "";

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $username, $password);
    
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get email from POST data
    $email = $_POST["email"];
    
    // Generate a reset token
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    
    // Calculate expiry time (30 minutes from now)
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
    
    // Prepare SQL statement
    $sql = "UPDATE users 
            SET reset_token_hash = :token_hash,
                reset_token_expires_at = :expiry
            WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(":token_hash", $token_hash, PDO::PARAM_STR);
    $stmt->bindParam(":expiry", $expiry, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    
    // Execute the statement
    $stmt->execute();
    
    // Check if any rows were affected
    if ($stmt->rowCount() > 0) {
        // Success message
        echo "Password reset token generated and stored successfully.";
    } else {
        // No rows affected, email not found
        echo "Email not found in the database.";
    }
} catch (PDOException $e) {
    // Database error
    echo "Database error: " . $e->getMessage();
}