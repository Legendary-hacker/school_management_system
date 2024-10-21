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

if ($result->num_rows > 0) {
    echo "<table>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['subject_name'],) . "</td>";
        echo "<td>" . htmlspecialchars($row['class_score'],) . "</td>";
        echo "<td>" . htmlspecialchars($row['exam_score'],) . "</td>";
        echo "<td>" . htmlspecialchars($row['total_score'],) . "</td>";
        echo "<td>" . htmlspecialchars($row['grade']) . "</td>";
        echo "<td>" . htmlspecialchars($row['remarks']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<tr><td colspan='6'>No results found for this term.</td></tr>";
    echo "";
}

$stmt->close();
$conn->close();



