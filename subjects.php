<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="systems1.css"> 
</head>
<body class="AdminBd">
    <div class="AdminCon">
    <aside class="asAdmin">
            <div class="AdminSb">
                <nav>
                    <a href="head_teacher.php">
                        <span class="material-symbols-outlined">
                            grid_view
                            </span>
                        <h3>Dashboard</h3>
                        </a>
                        <a href="teacher.php">
                            <span class="material-symbols-outlined">
                                Groups
                                </span>
                            <h3>Teachers</h3>
                        </a>
                        <a href="subjects.php" class="active">
                                    <span class="material-symbols-outlined">
                                        auto_stories
                                        </span>
                                    <h3>Subjects</h3>
                                </a>
                        <div class="dropdown">
                        <a href="students.php">
                            <span class="material-symbols-outlined">
                                school
                                </span>
                            <h3>Students</h3>
                        </a>
                        <a href="reports.php">
                            <span class="material-symbols-outlined">
                                report
                                </span>
                            <h3>Terminal Report</h3>
                        </a>
                        <a href="logout.php">
                            <span class="material-symbols-outlined">
                                logout
                                </span>
                            <h3>Logout</h3>
                        </a>
                </nav>
            </div>
        </aside>
        <div class="sub">
        <div class="subjects-container">
    <?php
    include 'connect.php';

    // Fetch all subjects
    $sql = "SELECT DISTINCT subjects.subject_name FROM subjects
            INNER JOIN results ON subjects.subject_id = results.subject_id
            INNER JOIN all_students ON results.student_id = all_students.student_id
            INNER JOIN classes ON all_students.class_id = classes.class_id
            WHERE classes.class_name IN ('Primary 1', 'Primary 2', 'Primary 3', 'Primary 4', 'Primary 5', 'Primary 6', 'JHS 1', 'JHS 2', 'JHS 3')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($subject = $result->fetch_assoc()) {
            $subjectName = $subject['subject_name'];

            // Count total students taking this subject
            $sql_students = "SELECT COUNT(DISTINCT results.student_id) as student_count FROM results
                             INNER JOIN subjects ON results.subject_id = subjects.subject_id
                             WHERE subjects.subject_name = '$subjectName'";
            $student_result = $conn->query($sql_students);
            $student_count = $student_result->fetch_assoc()['student_count'];

            // Count number of classes offering this subject
            $sql_classes = "SELECT COUNT(DISTINCT classes.class_id) as class_count FROM classes
                            INNER JOIN all_students ON classes.class_id = all_students.class_id
                            INNER JOIN results ON all_students.student_id = results.student_id
                            INNER JOIN subjects ON results.subject_id = subjects.subject_id
                            WHERE subjects.subject_name = '$subjectName'";
            $class_result = $conn->query($sql_classes);
            $class_count = $class_result->fetch_assoc()['class_count'];

            echo "<div class='subject-card'>";
            echo "<h3>$subjectName</h3>";
            echo "<p>Total Students: $student_count</p>";
            echo "<p>Classes Offering: $class_count</p>";

            // Display student count for each class offering this subject
            $sql_class_students = "SELECT classes.class_name, COUNT(DISTINCT all_students.student_id) as students_in_class
                                FROM classes
                                INNER JOIN all_students ON classes.class_id = all_students.class_id
                                INNER JOIN results ON all_students.student_id = results.student_id
                                   INNER JOIN subjects ON results.subject_id = subjects.subject_id
                                   WHERE subjects.subject_name = '$subjectName'
                                   GROUP BY classes.class_name";
            $class_students_result = $conn->query($sql_class_students);

            if ($class_students_result->num_rows > 0) {
                echo "<ul>";
                while ($class_students = $class_students_result->fetch_assoc()) {
                    echo "<li>" . $class_students['class_name'] . ": " . $class_students['students_in_class'] . " students</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No students in this class</p>";
            }

            echo "</div>";
        }
    } else {
        echo "<p>No subjects found.</p>";
    }

    $conn->close();
    ?>
</div>

        </div>
        
    </div>



    
</body>
</html>
