<?php
include 'connect.php';

$classes = [
    'Primary 1', 'Primary 2', 'Primary 3', 'Primary 4', 'Primary 5', 'Primary 6',
    'JHS 1', 'JHS 2', 'JHS 3'
];

$top_students = [];

foreach ($classes as $class) {
    // Fetch the top student for each class
    $sql = "SELECT all_students.student_id, all_students.first_name, all_students.other_names, classes.class_name, SUM(results.total_score) as overall_score
            FROM all_students
            INNER JOIN classes ON all_students.class_id = classes.class_id
            INNER JOIN results ON all_students.student_id = results.student_id
            WHERE classes.class_name = '$class'
            GROUP BY all_students.student_id, classes.class_name
            ORDER BY overall_score DESC
            LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $top_students[$class] = $result->fetch_assoc();
    }
}
?>
    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Class</th>
                <th>Overall Score</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($top_students as $class => $student): ?>
                <tr class="top-student">
                    <td><?php echo htmlspecialchars($student['first_name'] . ' ' . $student['other_names']); ?></td>
                    <td><?php echo htmlspecialchars($class); ?></td>
                    <td><?php echo htmlspecialchars($student['overall_score']); ?></td>
                    <td><a href="student_details.php?student_id=<?php echo $student['student_id']; ?>">View Details</a></td>
                </tr>
            <?php endforeach; ?>
        
