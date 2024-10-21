<?php
include 'connect.php';

$student_id = $_GET['student_id'];
$class_id = $_GET['class_id'];

$sql = "SELECT s.subject_name, r.class_score, r.exam_score, r.total_score, r.grade, r.remarks 
        FROM results r
        JOIN subjects s ON r.subject_id = s.subject_id
        WHERE r.student_id = ? AND r.class_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $student_id, $class_id);
$stmt->execute();
$result = $stmt->get_result();

$results = [];
while ($row = $result->fetch_assoc()) {
    $results[] = $row;
}

echo json_encode($results);

// $conn->close();


