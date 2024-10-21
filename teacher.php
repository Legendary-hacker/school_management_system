<?php
    include 'connect.php';
    $sql = "SELECT name FROM teachers LIMIT 3";
    $result = $conn->query($sql);

    $conn->close();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="systems.css">
    <title>Teaching staff</title>
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
                        
                        <a href="teacher.php" class="active">
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
        <section class="main">
            <div class="main-top">
              <h1>Head Teachers</h1>
              <i class="fas fa-user-cog"></i>
            </div>
            <div class="users">
              <div class="card">
                <img src="./pic/img1.jpg">
                <h4>
                <?php
                  if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      echo htmlspecialchars($row["name"]);
                  } else {
                      echo "No teacher assigned";
                  }
                  ?>
                </h4>
                <p>HEAD TEACHER</p>
                <div class="per">
                  <table>
                    <tr>
                      <td>ADMIN</td>
                    </tr>
                  </table>
                </div>
                <button>Profile</button>
              </div>
              <div class="card">
                <img src="./pic/img2.jpg">
                <h4>
                <?php
                  if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      echo htmlspecialchars($row["name"]);
                  } else {
                      echo "No teacher assigned";
                  }
                  ?>
                </h4>
                <p>ASSISTANT HEAD TEACHER</p>
                <div class="per">
                  <table>
                    <tr>
                      <td>ADMIN</td>
                    </tr>
                </table>
                </div>
                <button>Profile</button>
            </div>
            <div class="card">
                <img src="./pic/img3.jpg">
                <h4>
                <?php
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo htmlspecialchars($row["name"]);
                } else {
                        echo "No teacher assigned";
                }
                ?>
                </h4>
                <p>ACADEMIC HEAD</p>
                <div class="per">
                    <table>
                    <tr>
                        <td>ADMIN</td>
                    </tr>
                    </table>
                </div>
                <button>Profile</button>
                </div>
                <div class="card">
                    <img src="">
                    <h4>
                    <?php
                    include "connect.php";
                  if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      echo htmlspecialchars($row["name"]);
                  } else {
                      echo "No teacher assigned";
                  }
                  ?>
                    </h4>
                    <p> PRIMARY HEAD</p>
                    <div class="per">
                        <table>
                            <tr>
                                <td>ADMIN</td>
                            </tr>
                            </table>
                    </div>
                    <button>Profile</button>
                </div>
            </div>
            <section class="attendance">
                    <div class="attendance-list">
                        <h1>All Teachers</h1>
                        <table class="table">
                    <thead>
                    <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Class</th>
                            <th>Subject</th>
                        </tr>
                    </thead>
                    <tbody id="teacher-list">
                    <?php
                        include 'connect.php';
                        $sql = "SELECT id, name, email, class, subject FROM teachers";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["class"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["subject"]) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No teachers found</td></tr>";
                        }
                        ?>

                    </tbody>
                    </table>
                </div>
                </section>
            </section>
    </div>

            

    
</body>
<script src="systems.js"></script>
</html>