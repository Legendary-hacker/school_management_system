<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $class = $conn->real_escape_string($_POST['class']);
    $subject = $conn->real_escape_string($_POST['subject']);

    // Update the record
    $sql = "UPDATE teachers SET name='$name', email='$email', class='$class', subject='$subject' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: sch_admin.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();

