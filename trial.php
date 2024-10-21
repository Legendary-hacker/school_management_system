<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="systems1.css">
    <title>Head Teacher - Results</title>
</head>
<body class="AdminBd">
    <div class="AdminCon">

        <!-- Aside section -->
        <aside class="asAdmin">
            <div class="AdminSb">
                <nav>
                    <a href="head_teacher.php" >
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
                    <a href="students.php">
                        <span class="material-symbols-outlined">
                            school
                        </span>
                        <h3>Students</h3>
                    </a>
                    <a href="reports.php" class="active" >
                        <span class="material-symbols-outlined">
                            report
                        </span>
                        <h3>Terminal Report</h3>
                    </a>
                    <a href="">
                        <span class="material-symbols-outlined">
                            settings
                        </span>
                        <h3>Settings</h3>
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
                <br>
                <h2>Results</h2>
                <hr class="hr">
                <br><br>

                <!-- Form Section -->
                <form id="resultForm">
                    <div>
                        <label for="studentSelect">Select Student:</label>
                        <select id="studentSelect" name="student_id" required>
                            <option value="">Select Student</option>
                            <?php
                            include 'connect.php';
                            $sql = "SELECT student_id, CONCAT(first_name, ' ', other_names) AS full_name FROM primary1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . htmlspecialchars($row["student_id"]) . "'>" . htmlspecialchars($row["full_name"]) . "</option>";
                                }
                            } else {
                                echo "<option value=''>No students found</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="termSelect">Select Term:</label>
                        <select id="termSelect" name="term" required>
                            <option value="1st Term">1st Term</option>
                            <option value="2nd Term">2nd Term</option>
                            <option value="3rd Term">3rd Term</option>
                        </select>
                    </div>
                </form>

                <!-- Results Table -->
                <table class="table" id="resultsTable">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Class Score (30%)</th>
                            <th>Exam Score (70%)</th>
                            <th>Total Score (100%)</th>
                            <th>Grade</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody id="resultsContainer">
                        <!-- Student results will be displayed here -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
        document.getElementById('termSelect').addEventListener('change', function() {
            loadResults();
        });

        document.getElementById('studentSelect').addEventListener('change', function() {
            loadResults();
        });

        function loadResults() {
            const studentId = document.getElementById('studentSelect').value;
            const term = document.getElementById('termSelect').value;

            if (studentId && term) {
                fetch(`display_results.php?student_id=${studentId}&term=${term}`)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('resultsContainer').innerHTML = html;
                    })
                    .catch(error => console.error('Error fetching results:', error));
            } else {
                document.getElementById('resultsContainer').innerHTML = '';
            }
        }
    </script>

</body>
</html>
