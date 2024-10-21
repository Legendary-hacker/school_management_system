<?php
$servername = "127.0.0.1";
$username = "root"; // Change if you have a different username
$password = ""; // Change if you have a password
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};
?>
