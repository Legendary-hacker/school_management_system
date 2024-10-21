
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="systems.css">
    <title>Head Teacher</title>
</head>
<body class="AdminBd">
    <div class="AdminCon">

        <!-- Aside section -->
        <aside class="asAdmin">
            <div class="AdminSb">
                <nav>
                    <a href="head_teacher.php" class="active">
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
                        <a href="subjects.php">
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
        <!-- End of Aside -->
        
        <!-- Main Section --> 
        <main class="AdminMain">
        <div class="dashBoard">
                <h1>Dashboard</h1>
                <br>
            <div class="pas">
                <!-- exam Statistics -->
                <div class="pef">
                <span class="material-symbols-outlined">school</span>
                <div class="att">
                    <div class="score">
                        <h3>Total </h3>
                        <h1>
                            <?php
                            $host = "127.0.0.1"; 
                            $username = "root"; 
                            $password = ""; 
                            $dbname = "school_admin"; 
                            $tableName = "all_students"; 

                            // Create connection
                            $conn = new mysqli($host, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // SQL query to count rows
                            $sql = "SELECT COUNT(*) as total FROM $tableName";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output the row count
                            //     $row = $result->fetch_assoc();
                            //     $totalStudents = $row['total'];
                            //     echo $totalStudents . " students";
                            // } else {
                                $totalStudents = 0;
                                echo "0 students";
                            }

                            // Calculate percentage and stroke-dasharray value
                            $totalCapacity = 225;
                            $percentage = ($totalStudents / $totalCapacity) * 100;
                            $strokeDasharray = ($percentage / 100) * 240; // Assuming a circle of full stroke-dasharray 220

                            // Close connection
                            $conn->close();
                            ?>
                        </h1>
                    </div>
                    <div class="pro">
                        <svg>
                            <circle r="35" cx="40" cy="40" style="stroke-dasharray: <?php echo $strokeDasharray; ?>; stroke-dashoffset: <?php echo 220 - $strokeDasharray; ?>;"></circle>
                        </svg> 
                        <div class="num"><?php echo round($percentage); ?>%</div>
                    </div>
                </div>
            </div>

                <!-- End of exam Statistics -->
                <!-- Class Statistics  -->
                <div class="stat">
                    <span class="material-symbols-outlined">auto_stories</span>
                    <div class="att">
                        <div class="score">
                            <h3>Examination performance</h3>
                            <?php
                include 'connect.php';

                $classes = [
                    'Primary 1', 'Primary 2', 'Primary 3', 'Primary 4', 'Primary 5', 'Primary 6',
                    'JHS 1', 'JHS 2', 'JHS 3'
                ];

                $top_students = [];
                $total_percentage = 0;
                $student_count = 9;
                $max_score = 100; 

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
                        $student = $result->fetch_assoc();
                        $percentage = min(round(($student['overall_score'] / $max_score) * 1000), 100);
                        $student['percentage'] = $percentage;
                        $top_students[$class] = $student;

                        // Add to total percentage for average calculation
                        $total_percentage += $percentage;
                        $student_count++;
                    }
                }

                $average_percentage = ($student_count > 0) ? $total_percentage / $student_count : 0;
                ?>

                                            <h1 id="exam-performance-h1"><?php echo number_format($average_percentage, 1); ?>%</h1> <!-- Display average percentage -->
                                        </div>
                                        <div class="pro">
                                            <svg>
                                                <circle r="35" cx="40" cy="40"></circle>
                                            </svg> 
                                            <div class="num"><?php echo number_format($average_percentage, 1); ?>%</div> <!-- Display average percentage -->
                                        </div>
                                    </div>
                                    <small>First term</small>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const circle = document.querySelector('.stat svg circle');
                        const averagePercentage = <?php echo json_encode($average_percentage); ?>;

                        // Total circumference of the circle
                        const circumference = 2 * Math.PI * circle.r.baseVal.value;

                        // Calculate stroke-dasharray and update the circle
                        const offset = circumference - (averagePercentage / 100) * circumference;
                        circle.style.strokeDasharray = `${circumference}`;
                        circle.style.strokeDashoffset = `${offset}`;

                        // Update the percentage display in the .num div
                        document.querySelector('.stat .num').innerText = `${averagePercentage}%`;
                        document.querySelector('.stat .num').innerText = `${Math.round(averagePercentage)}%`;
                    });
                </script>
                <div class="ter">
    <span class="material-symbols-outlined">trending_up</span>
    <div class="att">
        <div class="score">
            <h3>Overall Performance</h3>
            <?php
            include 'connect.php';

            $classes = [
                'Primary 1', 'Primary 2', 'Primary 3', 'Primary 4', 'Primary 5', 'Primary 6',
                'JHS 1', 'JHS 2', 'JHS 3'
            ];

            $total_scores = 0;
            $total_max_scores = 0;
            $student_count = 0;
            $max_score_per_student = 170*900;

            foreach ($classes as $class) {
                // Fetch the total scores of all students in each class
                $sql = "SELECT SUM(results.total_score) as total_score
                        FROM all_students
                        INNER JOIN classes ON all_students.class_id = classes.class_id
                        INNER JOIN results ON all_students.student_id = results.student_id
                        WHERE classes.class_name = '$class'";
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $total_scores += $row['total_score'];
                    $total_max_scores += $max_score_per_student * $result->num_rows;
                    $student_count += $result->num_rows;
                }
            }

            // Calculate the overall percentage
            $overall_percentage = ($total_max_scores > 0) ? ($total_scores / $total_max_scores) * 100 : 0;
            $overall_percentage = min($overall_percentage, 100); // Ensure it doesn't exceed 100%

            ?>
            <h1 id="overall-performance-h1"><?php echo round($overall_percentage); ?>%</h1> <!-- Display overall percentage -->
        </div>
        <div class="pro">
            <svg>
                <circle r="35" cx="40" cy="40"></circle>
            </svg> 
            <div class="num"><?php echo round($overall_percentage); ?>%</div> <!-- Display overall percentage -->
        </div>
    </div>
    <small>First term</small>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const circle = document.querySelector('.ter svg circle');
        const overallPercentage = <?php echo json_encode($overall_percentage); ?>;

        // Total circumference of the circle
        const circumference = 2 * Math.PI * circle.r.baseVal.value;

        // Calculate stroke-dasharray and update the circle
        const offset = circumference - (overallPercentage / 100) * circumference;
        circle.style.strokeDasharray = `${circumference}`;
        circle.style.strokeDashoffset = `${offset}`;
    });
</script>

        

                                <!-- End of Terminal Statistics -->
                        </div>  
                        </div>
                        <div class="beStu">
                                <h1>Performing Student</h1>
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
                    <td>
                        <a href="#" class="view-details" data-student-id="<?php echo $student['student_id']; ?>"> <button>view</button></a>
                    </td> 
                </tr>
            <?php endforeach; ?>
                    </tbody>
                </table>
                        </div>
            <!-- End of Academic Chart -->
            
        </main>
        <!-- First container -->
        

        <!-- End of container -->

    
    
    </div>
    <script>
        document.querySelectorAll('.view-details').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                const studentId = this.getAttribute('data-student-id');
                const detailsRow = document.getElementById('details-' + studentId);
                const detailsContainer = detailsRow.querySelector('.student-details');

                if (detailsRow.classList.contains('hidden')) {
                    fetch(`get_student_details.php?student_id=${studentId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.length > 0) {
                                let html = '<table><thead><tr><th>Subject</th><th>Class Score</th><th>Exam Score</th><th>Total Score</th><th>Grade</th><th>Remarks</th></tr></thead><tbody>';
                                data.forEach(row => {
                                    html += `<tr>
                                                <td>${row.subject_name}</td>
                                                <td>${row.class_score}</td>
                                                <td>${row.exam_score}</td>
                                                <td>${row.total_score}</td>
                                                <td>${row.grade}</td>
                                                <td>${row.remarks}</td>
                                            </tr>`;
                                });
                                html += '</tbody></table>';
                                detailsContainer.innerHTML = html;
                            } else {
                                detailsContainer.innerHTML = '<p>No results found.</p>';
                            }
                            detailsRow.classList.remove('hidden');
                        })
                        .catch(error => console.error('Error fetching student details:', error));
                } else {
                    detailsRow.classList.add('hidden');
                }
            });
        });
    </script>
    <script src="systems.js"></script>

    
</body>
</html>