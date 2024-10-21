<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="systems.css">
    <link rel="stylesheet" href="swiper-bundle.min.css">
    <title>School Management</title>
</head>
<body class="AdminBd">
    <div class="AdminCon">
        <!-- Aside section -->
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
                        <a href="subjects.php">
                                    <span class="material-symbols-outlined">
                                        auto_stories
                                        </span>
                                    <h3>Subjects</h3>
                                </a>
                        <a href="students.php" class="active">
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
        
        <main class="AdminMain">
            <div class="attendance-list">
                    <h1>School List</h1>
                    <table class="table">
                    <u><h2>Primary 1</h2></u>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Other Names</th>
                                <th>Age</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody id="student-list">
                            
                        <?php
                        $sql = "SELECT student_id, first_name, other_names, age, class FROM primary1";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row["student_id"]) . "</td>
                                        <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                        <td>" . htmlspecialchars($row["other_names"]) . "</td>
                                        <td>" . htmlspecialchars($row["age"]) . "</td>
                                        <td>" . htmlspecialchars($row["class"]) . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No students found</td></tr>";
                        }
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                    <u><h2>Primary 2</h2></u>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Other Names</th>
                                <th>Age</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody id="student-list">
                            
                        <?php
                        include 'connect.php';
                        $sql = "SELECT student_id, first_name, other_names, age, class FROM primary2";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row["student_id"]) . "</td>
                                        <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                        <td>" . htmlspecialchars($row["other_names"]) . "</td>
                                        <td>" . htmlspecialchars($row["age"]) . "</td>
                                        <td>" . htmlspecialchars($row["class"]) . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No students found</td></tr>";
                        }
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                    <u><h2>Primary 3</h2></u>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Other Names</th>
                                <th>Age</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody id="student-list">
                            
                        <?php
                        include 'connect.php';
                        $sql = "SELECT student_id, first_name, other_names, age, class FROM primary3";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row["student_id"]) . "</td>
                                        <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                        <td>" . htmlspecialchars($row["other_names"]) . "</td>
                                        <td>" . htmlspecialchars($row["age"]) . "</td>
                                        <td>" . htmlspecialchars($row["class"]) . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No students found</td></tr>";
                        }
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                    <u><h2>Primary 4</h2></u>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Other Names</th>
                                <th>Age</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody id="student-list">
                            
                        <?php
                        include 'connect.php';
                        $sql = "SELECT student_id, first_name, other_names, age, class FROM primary4";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row["student_id"]) . "</td>
                                        <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                        <td>" . htmlspecialchars($row["other_names"]) . "</td>
                                        <td>" . htmlspecialchars($row["age"]) . "</td>
                                        <td>" . htmlspecialchars($row["class"]) . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No students found</td></tr>";
                        }
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                    <u><h2>Primary 5</h2></u>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Other Names</th>
                                <th>Age</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody id="student-list">
                            
                        <?php
                        include 'connect.php';
                        $sql = "SELECT student_id, first_name, other_names, age, class FROM primary5";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row["student_id"]) . "</td>
                                        <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                        <td>" . htmlspecialchars($row["other_names"]) . "</td>
                                        <td>" . htmlspecialchars($row["age"]) . "</td>
                                        <td>" . htmlspecialchars($row["class"]) . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No students found</td></tr>";
                        }
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                    <u><h2>Primary 6</h2></u>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Other Names</th>
                                <th>Age</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody id="student-list">
                            
                        <?php
                        include 'connect.php';
                        $sql = "SELECT student_id, first_name, other_names, age, class FROM primary6";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row["student_id"]) . "</td>
                                        <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                        <td>" . htmlspecialchars($row["other_names"]) . "</td>
                                        <td>" . htmlspecialchars($row["age"]) . "</td>
                                        <td>" . htmlspecialchars($row["class"]) . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No students found</td></tr>";
                        }
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                    <u><h2>JHS 1</h2></u>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Other Names</th>
                                <th>Age</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody id="student-list">
                            
                        <?php
                        include 'connect.php';
                        $sql = "SELECT student_id, first_name, other_names, age, class FROM jhs1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row["student_id"]) . "</td>
                                        <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                        <td>" . htmlspecialchars($row["other_names"]) . "</td>
                                        <td>" . htmlspecialchars($row["age"]) . "</td>
                                        <td>" . htmlspecialchars($row["class"]) . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No students found</td></tr>";
                        }
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                    <u><h2>JHS 2</h2></u>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Other Names</th>
                                <th>Age</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody id="student-list">
                            
                        <?php
                        include 'connect.php';
                        $sql = "SELECT student_id, first_name, other_names, age, class FROM jhs2";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row["student_id"]) . "</td>
                                        <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                        <td>" . htmlspecialchars($row["other_names"]) . "</td>
                                        <td>" . htmlspecialchars($row["age"]) . "</td>
                                        <td>" . htmlspecialchars($row["class"]) . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No students found</td></tr>";
                        }
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                    <u><h2>JHS 3</h2></u>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Other Names</th>
                                <th>Age</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody id="student-list">
                            
                        <?php
                        include 'connect.php';
                        $sql = "SELECT student_id, first_name, other_names, age, class FROM jhs3";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row["student_id"]) . "</td>
                                        <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                        <td>" . htmlspecialchars($row["other_names"]) . "</td>
                                        <td>" . htmlspecialchars($row["age"]) . "</td>
                                        <td>" . htmlspecialchars($row["class"]) . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No students found</td></tr>";
                        }
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                </div>
        </main>
    </div>

            

    
</body>
<script src="swiper-bundle.min.js"></script>
<script src="systems.js"></script>
</html>