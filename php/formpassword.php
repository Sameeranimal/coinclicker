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

    <button type="submit">Send</button>
</form>

</body>
</html>