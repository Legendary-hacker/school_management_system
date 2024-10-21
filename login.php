

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="systems.css">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form action="users.php" method="Post">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" placeholder="Email or Username" name="username" required>
            <i class='material-symbols-outlined'>person</i>
        </div>
        <div class="input-box">
            <input type="password" id="password1" placeholder="Password" name="password" required>
            <i class="material-symbols-outlined" id="togglePassword1">visibility_off</i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox" >Remember Me</label>
            <a href="reset.php">Forgot Password?</a>
        </div>
        <button type="submit" class="btn" value="Login">Login</button>
        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
        </form>
    </div>
</body>
<script src="login.js"></script>
</html>