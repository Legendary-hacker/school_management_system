<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="systems1.css">
    <title>Head Teacher</title>
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
        <br>
        <br>
        <form id="reportCardForm" method="POST" action="save_results.php">
        <label for="termSelect">Select Term:</label>
                        <select id="termSelect" name="term">
                            <option value="1st Term">1st Term</option>
                            <option value="2nd Term">2nd Term</option>
                            <option value="3rd Term">3rd Term</option>
                        </select>
        <label for="classSelect">Select Class:</label>
        <select id="classSelect" name="classSelect">
            <?php
            include 'connect.php';
            $sql = "SELECT class_id, class_name FROM classes";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $firstClassId = null;
                while ($row = $result->fetch_assoc()) {
                    if (is_null($firstClassId)) {
                        $firstClassId = $row["class_id"];
                    }
                    echo "<option value='" . htmlspecialchars($row["class_id"]) . "'>" . htmlspecialchars($row["class_name"]) . "</option>";
                }
            } else {
                echo "<option value=''>No classes found</option>";
            }
            ?>
        </select>
        <label for="studentSelect">Select Student:</label>
        <select id="studentSelect" name="studentSelect">
            <option value="">Select Student</option>
        </select>
        <label for="studentID">Student ID:</label>
        <input type="text" id="studentID" name="studentID" readonly>
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" readonly>
        <label for="studentClass">Class:</label>
        <input type="text" id="studentClass" name="studentClass" readonly>
        <input type="hidden" id="classID" name="classID">
    <br>
    <table class="table" id="subjectsTable">
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
    </table>
    <button type="submit" class="btn" value="Save">Save</button>
        </form>
        <div >
    <!-- Student results will be displayed here -->
</div>

<script>
// Automatically select the first class on page load
document.addEventListener('DOMContentLoaded', function() {
    const classSelect = document.getElementById('classSelect');
    if (classSelect.options.length > 0) {
        classSelect.selectedIndex = 0; // Select the first class
        loadStudentsForClass(classSelect.value); // Load students for the first class
    }
});

// Fetch students for the selected class
function loadStudentsForClass(classId) {
    if (classId) {
        fetch(`get_students.php?class_id=${classId}`)
            .then(response => response.json())
            .then(students => {
                const studentSelect = document.getElementById('studentSelect');
                studentSelect.innerHTML = '<option value="">Select Student</option>';
                students.forEach((student, index) => {
                    studentSelect.innerHTML += `<option value="${student.student_id}" data-name="${student.first_name} ${student.other_names}">${student.first_name} ${student.other_names}</option>`;
                });

                if (students.length > 0) {
                    studentSelect.selectedIndex = 0; // Automatically select the first student
                    const selectedOption = studentSelect.options[studentSelect.selectedIndex];
                    selectStudent(selectedOption);
                }
            });
    } else {
        document.getElementById('studentSelect').innerHTML = '<option value="">Select Student</option>';
    }
}

// When a class is selected, load its students
document.getElementById('classSelect').addEventListener('change', function() {
    loadStudentsForClass(this.value);
});

// When a student is selected, fill the student info and load results
document.getElementById('studentSelect').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    selectStudent(selectedOption);
});

function selectStudent(selectedOption) {
    const studentId = selectedOption.value;
    const studentName = selectedOption.getAttribute('data-name');
    const classId = document.getElementById('classSelect').value;

    document.getElementById('studentID').value = studentId;
    document.getElementById('studentName').value = studentName;
    document.getElementById('classID').value = classId;
    document.getElementById('studentClass').value = 'Class ' + classId;

    fetchSubjectsForClass(classId);
    fetchResultsForStudent(studentId, classId);
}

// Fetch subjects for the selected class
function fetchSubjectsForClass(classId) {
    fetch(`get_subjects.php?class_id=${classId}`)
        .then(response => response.json())
        .then(subjects => {
            const subjectsTable = document.getElementById('subjectsTable');
            subjectsTable.innerHTML = `
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
            `;
            subjects.forEach((subject, index) => {
                subjectsTable.innerHTML += `
                    <tbody>
                        <tr>
                            <td><input type="text" name="subject${index+1}" value="${subject.subject_name}" readonly></td>
                            <td><input type="text" inputmode="numeric" max="30" name="classScore${index+1}" oninput="updateTotalScore(${index+1})"></td>
                            <td><input type="text" inputmode="number" max="70" name="examScore${index+1}" oninput="updateTotalScore(${index+1})"></td>
                            <td><input type="text" name="totalScore${index+1}" readonly></td>
                            <td><input type="text" name="grade${index+1}" readonly></td>
                            <td><input type="text" name="remarks${index+1}" readonly></td>
                        </tr>
                    </tbody>
                `;
            });
        });
}
function fetchResultsForStudent(studentId, term) {
    fetch(`display_results.php?student_id=${studentId}&term=${term}`)
        .then(response => response.json())
        .then(results => {
            const subjectsTable = document.getElementById('subjectsTable');
            subjectsTable.innerHTML = `
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
            `;

            results.forEach((result, index) => {
                subjectsTable.innerHTML += `
                    <tbody>
                        <tr>
                            <td><input type="text" name="subject${index+1}" value="${result.subject_name}" readonly></td>
                            <td><input type="number" name="classScore${index+1}" value="${result.class_score}" readonly></td>
                            <td><input type="number" name="examScore${index+1}" value="${result.exam_score}" readonly></td>
                            <td><input type="text" name="totalScore${index+1}" value="${result.total_score}" readonly></td>
                            <td><input type="text" name="grade${index+1}" value="${result.grade}" readonly></td>
                            <td><input type="text" name="remarks${index+1}" value="${result.remarks}" readonly></td>
                        </tr>
                    </tbody>
                `;
            });
        })
        .catch(error => console.error('Error fetching results:', error));
}

// Fetch results for the selected student and class
function fetchResultsForStudent(studentId, classId) {
    fetch(`get_results.php?student_id=${studentId}&class_id=${classId}`)
        .then(response => response.json())
        .then(results => {
            results.forEach((result, index) => {
                document.querySelector(`input[name="classScore${index+1}"]`).value = result.class_score;
                document.querySelector(`input[name="examScore${index+1}"]`).value = result.exam_score;
                document.querySelector(`input[name="totalScore${index+1}"]`).value = result.total_score;
                document.querySelector(`input[name="grade${index+1}"]`).value = result.grade;
                document.querySelector(`input[name="remarks${index+1}"]`).value = result.remarks;
            });
        });
        
}

// Function to update total score
function updateTotalScore(index) {
    const classScore = document.querySelector(`input[name="classScore${index}"]`).value;
    const examScore = document.querySelector(`input[name="examScore${index}"]`).value;
    const totalScore = document.querySelector(`input[name="totalScore${index}"]`);
    const grade = document.querySelector(`input[name="grade${index}"]`);
    const remarks = document.querySelector(`input[name="remarks${index}"]`);

    const total = (parseFloat(classScore) || 0) + (parseFloat(examScore) || 0);
    totalScore.value = total;

    // Calculate grade and remark
    if (total >= 80) {
        grade.value = 'A';
        remarks.value = 'Excellent';
    } else if (total >= 70) {
        grade.value = 'B';
        remarks.value = 'Very Good';
    } else if (total >= 55) {
        grade.value = 'C';
        remarks.value = 'Good';
    } else if (total >= 40) {
        grade.value = 'D';
        remarks.value = 'Pass';
    } else {
        grade.value = 'F';
        remarks.value = 'Fail';
    }
}
document.getElementById('reportCardForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(event.target);

    fetch('save_results.php', {
        method: 'POST',
        body: formData
    }).then(response => response.json())
      .then(data => {
        console.log('Success:', data);
      }).catch((error) => {
          console.error('Error:', error);
      });
});

</script>






            
                    
        </div>
            <!-- End of Academic Chart -->
            
        </main>
        <!-- First container -->
        

        <!-- End of container -->

    
    
    </div>
    <script src="systems.js"></script>

    
</body>
</html>