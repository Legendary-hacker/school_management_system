<?php
session_start();
include('connect1.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = $_POST['username'];
    $password = $_POST['password'];

    // Check if username or email
    if (filter_var($username_or_email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email = ?";
    } else {
        $sql = "SELECT * FROM users WHERE username = ?";
    }

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username_or_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Password is correct, start a new session
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_id'] = $row['id'];
                
                // Redirect to a welcome page
                header("location: head_teacher.php");
            } else {
                // Display an error message if password is not valid
                echo "Invalid password.";
            }
        } else {
            // Display an error message if username or email doesn't exist
            echo "No account found with that username or email.";
        }
        $stmt->close();
    }
}
include('connect1.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $username, $email, $password);
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Something went wrong. Please try again later.";
        }
        $stmt->close();
    }
}
$conn->close();


