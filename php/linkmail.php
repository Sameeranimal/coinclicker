<?php
// linkmail.php

$dsn = "mysql:host=localhost;dbname=rememberme;charset=utf8mb4";
$username = "root";
$password = "";

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $username, $password);
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Database error
    die("Database error: " . $e->getMessage());
}

// Check if token is set in GET request
if (!isset($_GET["token"])) {
    die("Token parameter missing.");
}

$token = $_GET["token"];
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

echo "Token is valid and hasn't expired.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    
<h1>Reset Password</h1>
<form method="post" action="resetpassword.php">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

    <label for="password">New Password</label>
    <input type="password" id="pwd" name="pwd" required>

    <label for="password_confirmation">Repeat Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required>

    <button type="submit" >Send</button>
</form>

</body>
</html>


