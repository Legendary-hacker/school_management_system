<?php
    include 'connect.php';
    $sql = "SELECT first_name FROM primary6 LIMIT 2";
    $result = $conn->query($sql);

    $conn->close();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="systems.css">
    <title>Teachers</title>
</head>
<body class="AdminBd"
>
    <div class="teachCon">
    <aside class="asAdmin">
            <div class="AdminSb">
                <nav>
                        <a href="school_management.php" >
                            <span class="material-symbols-outlined">
                                person
                                </span>
                            <h3>School Management</h3>
                        </a>
                        <a href="">
                            <span class="material-symbols-outlined">
                                admin_panel_settings
                                </span>
                            <h3>Administration</h3>
                        </a>
                        <a href="teachers.php"class="active">
                            <span class="material-symbols-outlined">
                                Groups
                                </span>
                            <h3>Teachers</h3>
                        </a>
                        <a href="students.php">
                            <span class="material-symbols-outlined">
                                school
                                </span>
                            <h3>Students</h3>
                        </a>
                        <a href="subjects.php">
                            <span class="material-symbols-outlined">
                                book_5
                                </span>
                            <h3>Subjects</h3>
                        </a>
                        <a href="classes.php">
                            <span class="material-symbols-outlined">
                                trending_up
                                </span>
                            <h3>Classes</h3>
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
        <section class="main">
            <div class="main-top">
              <h1>Head Teachers</h1>
              <i class="fas fa-user-cog"></i>
            </div>
            <div class="slider">
        <div class="users">
            <div class="card">
                <img src="./pic/img1.jpg" alt="Sam David">
                <h4>Sam David</h4>
                <p>Ui designer</p>
                <div class="per">
                    <table>
                        <tr>
                            <td><span>85%</span></td>
                            <td><span>87%</span></td>
                        </tr>
                        <tr>
                            <td>Month</td>
                            <td>Year</td>
                        </tr>
                    </table>
                </div>
                <button>Profile</button>
            </div>
            <div class="card">
                <img src="./pic/img2.jpg" alt="Balbina Kherr">
                <h4>Balbina Kherr</h4>
                <p>Programmer</p>
                <div class="per">
                    <table>
                        <tr>
                            <td><span>82%</span></td>
                            <td><span>85%</span></td>
                        </tr>
                        <tr>
                            <td>Month</td>
                            <td>Year</td>
                        </tr>
                    </table>
                </div>
                <button>Profile</button>
            </div>
            <div class="card">
                <img src="./pic/img3.jpg" alt="Badan John">
                <h4>Badan John</h4>
                <p>Tester</p>
                <div class="per">
                    <table>
                        <tr>
                            <td><span>94%</span></td>
                            <td><span>92%</span></td>
                        </tr>
                        <tr>
                            <td>Month</td>
                            <td>Year</td>
                        </tr>
                    </table>
                </div>
                <button>Profile</button>
            </div>
            <div class="card">
                <img src="./pic/img4.jpg" alt="Salina Michael">
                <h4>Salina Michael</h4>
                <p>Ui designer</p>
                <div class="per">
                    <table>
                        <tr>
                            <td><span>85%</span></td>
                            <td><span>82%</span></td>
                        </tr>
                        <tr>
                            <td>Month</td>
                            <td>Year</td>
                        </tr>
                    </table>
                </div>
                <button>Profile</button>
            </div>
            <div class="card">
                <img src="./pic/img5.jpg" alt="Salina Michael">
                <h4>Salina Michael</h4>
                <p>Ui designer</p>
                <div class="per">
                    <table>
                        <tr>
                            <td><span>85%</span></td>
                            <td><span>82%</span></td>
                        </tr>
                        <tr>
                            <td>Month</td>
                            <td>Year</td>
                        </tr>
                    </table>
                </div>
                <button>Profile</button>
            </div>
            <div class="card">
                <img src="./pic/img6.jpg" alt="Salina Michael">
                <h4>Salina Michael</h4>
                <p>Ui designer</p>
                <div class="per">
                    <table>
                        <tr>
                            <td><span>85%</span></td>
                            <td><span>82%</span></td>
                        </tr>
                        <tr>
                            <td>Month</td>
                            <td>Year</td>
                        </tr>
                    </table>
                </div>
                <button>Profile</button>
            </div>
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
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Join Time</th>
                        <th>Logout Time</th>
                        <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="active">
                        <td>01</td>
                        <td>Sam David</td>
                        <td>Design</td>
                        <td>03-24-22</td>
                        <td>8:00AM</td>
                        <td>3:00PM</td>
                        <td><button>View</button></td>
                        </tr>
                        <tr>
                        <td>02</td>
                        <td>Balbina Kherr</td>
                        <td>Coding</td>
                        <td>03-24-22</td>
                        <td>9:00AM</td>
                        <td>4:00PM</td>
                        <td><button>View</button></td>
                        </tr>
                        <tr>
                        <td>03</td>
                        <td>Badan John</td>
                        <td>testing</td>
                        <td>03-24-22</td>
                        <td>8:00AM</td>
                        <td>3:00PM</td>
                        <td><button>View</button></td>
                        </tr>
                        <tr>
                        <td>04</td>
                        <td>Sara David</td>
                        <td>Design</td>
                        <td>03-24-22</td>
                        <td>8:00AM</td>
                        <td>3:00PM</td>
                        <td><button>View</button></td>
                        </tr>
                        <tr >
                        <td>05</td>
                        <td>Salina</td>
                        <td>Coding</td>
                        <td>03-24-22</td>
                        <td>9:00AM</td>
                        <td>4:00PM</td>
                        <td><button>View</button></td>
                        </tr>
                        <tr >
                        <td>06</td>
                        <td>Tara Smith</td>
                        <td>Testing</td>
                        <td>03-24-22</td>
                        <td>9:00AM</td>
                        <td>4:00PM</td>
                        <td><button>View</button></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </section>
            </section>
        
    </div>
    <script>
        
    </script>
    <script src="systems.js></script>
</body>
</html>