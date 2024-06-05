<?php
// Establish a PDO connection
$dsn = 'mysql:host=localhost;dbname=rememberme';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $token = $_POST["token"];
    $password = $_POST["pwd"];
    $password_confirmation = $_POST["password_confirmation"];

    if ($password !== $password_confirmation) {
        die("Passwords do not match.");
    }

    $token_hash = hash("sha256", $token);

    $sql = "SELECT * FROM users WHERE reset_token_hash = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$token_hash]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user === false) {
        die("Token not found.");
    }

    // Ensure the value is set and not empty
    if (isset($user["reset_token_expires_at"]) && !empty($user["reset_token_expires_at"])) {
        // Convert the expiration time to a timestamp
        $expirationTime = strtotime($user["reset_token_expires_at"]);

        // Check if the conversion was successful
        if ($expirationTime === false) {
            die("Invalid expiration time format.");
        }

        // Check if the token has expired
        if ($expirationTime <= time()) {
            die("Token has expired.");
        }
    } else {
        die("Expiration time not set.");
    }

    // Update the user's password in the database
    if (isset($user["Player_ID"])) {
        // Update the user's password in the database
        $sql = "UPDATE users SET pwd = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE Player_ID = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$password, $user["Player_ID"]]);
    } else {
        die("User ID not found.");
    }

    echo "Password has been reset successfully.";
}
?>