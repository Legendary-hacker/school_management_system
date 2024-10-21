<?php
include 'connect.php';

if (isset($_GET['student_id'])) {
    $student_id = intval($_GET['student_id']);
    
    $sql = "SELECT subjects.subject_name, results.class_score, results.exam_score, results.total_score, results.grade, results.remarks
            FROM results
            INNER JOIN subjects ON results.subject_id = subjects.subject_id
            WHERE results.student_id = $student_id";

    $result = $conn->query($sql);

    $details = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $details[] = $row;
        }
    }

    echo json_encode($details);
} else {
    echo json_encode([]);
}

