<?php
include 'connect.php';

$report_id = $_POST['report_id'];
$score = $_POST['score'];

$sql = "UPDATE academic_reports SET score = ? WHERE report_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("di", $score, $report_id);

if ($stmt->execute()) {
    echo json_encode(array('status' => 'success'));
} else {
    echo json_encode(array('status' => 'error'));
}

$stmt->close();
$conn->close();
?>
