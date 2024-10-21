<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['student_id'])) {
    header("Location: change_password.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
    $student_id = $_SESSION['student_id'];

    $sql = "UPDATE students SET password='$new_password', first_login=0 WHERE id='$student_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: profile.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="change_password.php">
    New Password: <input type="password" name="new_password" required><br>
    <input type="submit" value="Change Password">
</form>
