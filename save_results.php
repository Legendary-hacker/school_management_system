<?php
include 'connect.php';

$response = ['success' => false, 'error' => ''];

// Retrieve and sanitize form inputs
$student_id = $_POST['studentID'];
$class_id = $_POST['classID'];
$term = $_POST['term'];

try {
    // Start a transaction
    $conn->begin_transaction();

    // Loop through each subject and insert results into the database
    $index = 1;
    while (isset($_POST["subject$index"])) {
        $subject_name = $_POST["subject$index"];
        $class_score = $_POST["classScore$index"];
        $exam_score = $_POST["examScore$index"];
        $total_score = $_POST["totalScore$index"];
        $grade = $_POST["grade$index"];
        $remarks = $_POST["remarks$index"];

        // Get the subject ID based on the subject name (You should have a proper mapping, this is a simple example)
        $subject_id_result = $conn->query("SELECT subject_id FROM subjects WHERE subject_name = '$subject_name'");
        $subject_id_row = $subject_id_result->fetch_assoc();
        $subject_id = $subject_id_row['subject_id'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO results (student_id, class_id, subject_id, term, class_score, exam_score, total_score, grade, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiissssss", $student_id, $class_id, $subject_id, $term, $class_score, $exam_score, $total_score, $grade, $remarks);

        // Execute the statement
        $stmt->execute();

        $index++;
    }

    // Commit the transaction
    $conn->commit();

    // Set success response
    $response['success'] = true;
} catch (Exception $e) {
    // Rollback the transaction in case of error
    $conn->rollback();

    // Set error response
    $response['error'] = $e->getMessage();
}

// Return the response as JSON
echo json_encode($response);