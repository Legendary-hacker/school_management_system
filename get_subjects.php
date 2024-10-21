<?php
include 'connect.php';

$class_id = $_GET['class_id'];
$sql = "SELECT s.subject_id, s.subject_name FROM subjects s
        JOIN class_subjects cs ON s.subject_id = cs.subject_id
        WHERE cs.class_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $class_id);
$stmt->execute();
$result = $stmt->get_result();

$subjects = [];
while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;
}

echo json_encode($subjects);

$conn->close();

