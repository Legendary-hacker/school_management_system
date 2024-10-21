<?php
include 'connect.php';

$class_id = $_GET['class_id'];

$sql = "SELECT student_id, first_name, other_names FROM all_students WHERE class_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $class_id);
$stmt->execute();
$result = $stmt->get_result();

$students = [];
while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}

echo json_encode($students);

$conn->close();

