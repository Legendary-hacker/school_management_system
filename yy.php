<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="systems2.css"> <!-- Link to your CSS file -->

</head>
<body class="light-mode">
    <div class="container">
        <h1>Welcome to the School Management System</h1>
        <div class="btn-container">
            <a href="login.php" class="btn">Admin Login</a>
            <a href="login.php" class="btn">Student Login</a>
        </div>
        <div class="dropdown">

        
            <button class="btn dropbtn">Switch Mode</button>
            <div class="dropdown-content">
                <a href="#" id="light-mode">Light Mode</a>
                <a href="#" id="dark-mode">Dark Mode</a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('light-mode').addEventListener('click', function() {
            document.body.classList.remove('dark-mode');
            document.body.classList.add('light-mode');
            localStorage.setItem('theme', 'light');
        });

        document.getElementById('dark-mode').addEventListener('click', function() {
            document.body.classList.remove('light-mode');
            document.body.classList.add('dark-mode');
            localStorage.setItem('theme', 'dark');
        });

        // Check for saved theme in localStorage
        window.onload = function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
            } else {
                document.body.classList.add('light-mode');
            }
        };
    </script>
</body>
</html>
