<?php
    include 'connect.php';
    $sql = "SELECT first_name FROM jhs2 LIMIT 2";
    $result = $conn->query($sql);

    $conn->close();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="systems.css">
    <title>Primary One</title>
</head>
<body>
    <div class="teachCon">
        <aside class="asAdmin">
            <div class="AdminSb">
                <nav>
                        <a href="classes.php" class="active">
                            <span class="material-symbols-outlined">
                            trending_up
                            </span>
                        <h3>Class Records</h3>
                        </a>
                        <a href="">
                            <span class="material-symbols-outlined">
                                school
                                </span>
                            <h3>Subjects</h3>
                        </a>

                        <a href="">
                            <span class="material-symbols-outlined">
                                menu_book
                                </span>
                            <h3>Exams Results</h3>
                        </a>
                        <a href="">
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
        <section class="main">
            <div class="main-top">
              <h1>JHS 2</h1>
              <i class="fas fa-user-cog"></i>
            </div>
            <div class="users">
            <div class="card">
                <img src="./pic/img1.jpg">
                <h4>Sam David</h4>
                <p>Class Teacher</p>
                <div class="per">
                  <table>
                    <tr>
                      <td><span>JHS 2</span></td>
                    </tr>
                    <tr>
                      <td>Class</td>
                    </tr>
                  </table>
                </div>
                <button>Profile</button>
              </div>
              <div class="card">
                <img src="./pic/img2.jpg">
                <h4>Moses</h4>
                <p>Assistant class teacher</p>
                <div class="per">
                  <table>
                    <tr>
                      <td><span>JHS 2</span></td>
                    </tr>
                    <tr>
                      <td>Class</td>
                      
                    </tr>
                  </table>
                </div>
                <button>Profile</button>
              </div>
                <div class="card">
                    <img src="">
                    <h4>
                    <?php
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo htmlspecialchars($row["first_name"]);
                    } else {
                        echo "No student assigned";
                    }
                    ?>
                    </h4>
                    <p>Class Prefect</p>
                    <div class="per">
                        <table>
                            <tr>
                                <td><span>JHS 2</span></td>
                            </tr>
                            <tr>
                                <td>Class</td>
                            </tr>
                            </table>
                    </div>
                    <button>Profile</button>
                </div>
                
                <div class="card">
                    <img src="">
                    <h4>
                    <?php
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo htmlspecialchars($row["first_name"]);
                    } else {
                        echo "No student assigned";
                    }
                    ?>
                    </h4>
                    <p>Assistant Class Prefect</p>
                    <div class="per">
                        <table>
                            <tr>
                                <td><span>JHS 2</span></td>
                            </tr>
                            <tr>
                                <td>Class</td>
                            </tr>
                            </table>
                    </div>
                    <button>Profile</button>
                </div>
            </div>
            <section class="attendance">
                <div class="attendance-list">
                    <h1>Class List</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Other Names</th>
                                <th>Age</th>
                                <th>Class</th>
                                <th>Actions</th>
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
                                        <td><button>view</button></td>
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
            </section>
            </section>
        
    </div>
    <script src="systems.js"></script>
</body>
</html>