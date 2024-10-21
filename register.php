<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="systems.css">
    <title>Register</title>
</head>
<body>
<div class="wrapper">
<?php if ($error_message): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
    <form action="sign_up.php" method="POST">
        <h1>Register</h1>
        <div class="input-box">
            <input type="text" name="full_name" placeholder="Full Name" required>
        </div>
        <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
            <i class='material-symbols-outlined'>mail</i>
        </div>
        <div class="input-box">
            <input type="password" id="password1" name="password1" placeholder="Password" required>
            <i class="material-symbols-outlined" id="togglePassword1">visibility_off</i>
        </div>
        <div class="input-box">
            <input type="password" id="password2" name="password2" placeholder="Confirm Password" required>
            <i class="material-symbols-outlined" id="togglePassword2">visibility_off</i>
        </div>
        <button type="submit" class="btn" name="register">Register</button>
        <div class="register-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </form>
</div>
</body>
<script src="login.js"></script>
<script src="password.js"></script>
</html>