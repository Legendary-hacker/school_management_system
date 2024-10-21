<?php
session_start();
include 'connect1.php';

function generate_username($full_name) {
    // Remove spaces and special characters, and convert to lowercase
    $base_username = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $full_name));
    $username = $base_username;

    // Check if the username already exists and append numbers if necessary
    $count = 1;
    global $conn;
    $sql = "SELECT username FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    while ($stmt->num_rows > 0) {
        $username = $base_username . $count;
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $count++;
    }
    

    return $username;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $hashed_password = password_hash($password1, PASSWORD_BCRYPT);
    $username = generate_username($full_name);

    if($password1 != $password2){
        echo "Passwords do not match!";
    } else {
        // Hash the password
        $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

        // Insert data into the database
        $sql = "INSERT INTO users (full_name, email,username, password) VALUES ('$full_name', '$email','$username', '$hashed_password')";

        if($conn->query($sql) === TRUE){
            echo "Registration successful!";
            header("Location: login.php?success=" . urlencode($name));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if ($stmt->execute()) {
        echo "User registered successfully. Username: $username";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
return $username;



