<?php
include 'connect.php';

// Fetch all students from primary1
$sqlStudents = "SELECT student_id FROM primary1";
$resultStudents = $conn->query($sqlStudents);

if ($resultStudents->num_rows > 0) {
    // Fetch all subjects
    $sqlSubjects = "SELECT subject_id FROM subjects";
    $resultSubjects = $conn->query($sqlSubjects);

    if ($resultSubjects->num_rows > 0) {
        while ($studentRow = $resultStudents->fetch_assoc()) {
            $student_id = $studentRow['student_id'];

            while ($subjectRow = $resultSubjects->fetch_assoc()) {
                $subject_id = $subjectRow['subject_id'];

                // Insert into student_subjects table
                $sqlInsert = "INSERT INTO student_subjects (student_id, subject_id) VALUES (?, ?)";
                $stmt = $conn->prepare($sqlInsert);
                $stmt->bind_param("ii", $student_id, $subject_id);

                if ($stmt->execute()) {
                    echo "Assigned student $student_id to subject $subject_id<br>";
                } else {
                    echo "Error: " . $stmt->error . "<br>";
                }
            }
            // Reset subject result pointer for next student
            $resultSubjects->data_seek(0);
        }
    } else {
        echo "No subjects found.";
    }
} else {
    echo "No students found in primary1.";
}

$conn->close();
?>
