<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

$sql = "SELECT * FROM students WHERE id='$student_id'";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

$sql_activities = "SELECT * FROM activities WHERE student_id='$student_id' ORDER BY activity_date DESC";
$result_activities = $conn->query($sql_activities);
?>

<h1>Welcome, <?php echo $student['fullname']; ?></h1>
<p>Email: <?php echo $student['email']; ?></p>

<h2>Activities</h2>
<ul>
    <?php while ($activity = $result_activities->fetch_assoc()) { ?>
        <li><?php echo $activity['activity_date'] . ": " . $activity['activity_description']; ?></li>
    <?php } ?>
</ul>

<a href="logout.php">Logout</a>
