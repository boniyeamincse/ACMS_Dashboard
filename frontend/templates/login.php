<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ACMS - Admin Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="backend/routes/web.php?action=login" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <div class="form-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>
            
            <button type="submit">Login</button>
            
            <div class="form-links">
                <a href="forgot_password.php">Forgot Password?</a>
            </div>
        </form>
    </div>
</body>
</html>