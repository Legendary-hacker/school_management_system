<?php
include 'connect.php';

$student_id = $_GET['student_id'];
$term = $_GET['term'];

$sql = "SELECT s.subject_name, r.class_score, r.exam_score, r.total_score, r.grade, r.remarks
        FROM results r
        JOIN subjects s ON r.subject_id = s.subject_id
        WHERE r.student_id = ? AND r.term = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $student_id, $term);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Results for Term: " . htmlspecialchars($term) . "</h2>";
if ($result->num_rows > 0) {
    echo "<table class='table' >";
    echo "<tr><th>Subject</th><th>Class Score</th><th>Exam Score</th><th>Total Score</th><th>Grade</th><th>Remarks</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['subject_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['class_score']) . "</td>";
        echo "<td>" . htmlspecialchars($row['exam_score']) . "</td>";
        echo "<td>" . htmlspecialchars($row['total_score']) . "</td>";
        echo "<td>" . htmlspecialchars($row['grade']) . "</td>";
        echo "<td>" . htmlspecialchars($row['remarks']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No results found for this term.</p>";
}

$stmt->close();
$conn->close();

