<?php
session_start();

if (!isset($_SESSION['logged-in'])) {
    header('location: ../login/login.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'deanslist');
include_once '../class/listers.class.php';
$lister = new Listers;
if (isset($_GET["file"])) {
    $file_name = basename($_GET['file']);
    $file_path = 'documents/' . $file_name;

    $path_parts = pathinfo($fullPath);
    echo $file_path;
    $ext = strtolower($path_parts["extension"]);

    switch ($ext) {
        case "pdf":
            $ctype = "application/pdf";
            break;
        case "jpeg":
        case "jpg":
            $ctype = "image/jpeg";
            break;
        case "png":
            $ctype = "image/png";
            break;
        default:
            $ctype = "application/force-download";
    }

    if (!empty($file_name) && file_exists($file_path)) {
        header('Cache-Control: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: inline; filename=' . $file_name);
        header('Content-Type: $ctype');
        header('Content-Transfer-Encoding: binary');

        readfile($file_path);
        exit;
    } else {
        echo "Not Found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="../css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link href="../css/admin-application.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <title>Application | Dean's List Application System - CCS</title>
    <link rel="icon" href="../img/ccslogo.png" type="image/icon type">
</head>

<body>
    <div class="side-bar">
        <br>
        <div class="logo-details">
            <img class="logo" style="margin-left:2px" src="../img/ccslogo.png" width="55" height="60">
            <span class="logo-name">Dean's List Application <br> System</span>
        </div>
        <br>
        <ul class="nav-links">



            <li>
                <a href="../dashboard/dashboard.php">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="links-name">Dashboard</span>
                </a>
            </li>

            <?php if($_SESSION['user_type'] == 'student') { ?>
            <li>
                <a href="../apply/application-new.php">
                <i class='bx bxs-edit'></i>
                    <span class="links-name">Application</span>
                </a>
            </li>
            <?php } ?> 

            <?php if($_SESSION['user_type'] == 'adviser') { ?>
            <li>
                <a href="../apply/adviser-application.php">
                <i class='bx bxs-edit'></i>
                    <span class="links-name">Application | Adviser</span>
                </a>
            </li>
            <?php } ?>   
            
            <?php if ($_SESSION['user_type'] == 'admin') { ?>
                <li>
                    <a href="../apply/admin-application.php" class="active">
                        <i class='bx bxs-edit'></i>
                        <span class="links-name">Application | Admin</span>
                    </a>
                </li>
            <?php } ?>

            <li>
                <a href="../listers/listers.php">
                <i class='bx bx-list-check'></i>
                    <span class="links-name">Dean's Listers</span>
                </a>
            </li>
            <li>
                <a href="../faculty/faculty.php">
                    <i class='bx bx-group' ></i>
                    <span class="links-name">CCS Faculty</span>
                </a>
            </li>

            <li>
                <a href="../programs/programs.php">
                    <i class='bx bx-book-reader'></i>
                    <span class="links-name">CCS Courses</span>
                </a>
            </li>

            <?php if($_SESSION['user_type'] == 'admin') { ?>
            <li>
                <a href="../curriculum/curriculum.php">
                <i class='bx bxs-edit'></i>
                    <span class="links-name">Curriculum</span>
                </a>
            </li>
            <?php } ?>

            <?php if ($_SESSION['user_type'] == 'admin') { ?>
            <li>
                <a href="../settings/settings.php">
                    <i class='bx bx-cog'></i>
                    <span class="links-name">Settings</span>
                </a>
            </li>

            <li>
                <a href="../users/index.php">
                    <i class='bx bx-cog'></i>
                    <span class="links-name">Users</span>
                </a>
            </li>
            <?php } ?>


            <hr class="line">


            <li id="logout-link">
                <a class="logout-link" href="../login/logout.php" title="Logout">
                    <i class='bx bx-log-out-circle'></i>
                    <span class="links-name">Logout</span>
                </a>
            </li>



            
        </ul>
    </div>
    <div id="logout-dialog" class="dialog" title="Logout">
        <p><span>Are you sure you want to logout?</span></p>
    </div>

    <script>
        $(document).ready(function() {
            $("#logout-dialog").dialog({
                resizable: false,
                draggable: false,
                height: "auto",
                width: 400,
                modal: true,
                autoOpen: false
            });
            $(".logout-link").on('click', function(e) {
                e.preventDefault();
                var theHREF = $(this).attr("href");

                $("#logout-dialog").dialog('option', 'buttons', {
                    "Yes": function() {
                        window.location.href = theHREF;
                    },
                    "No": function() {
                        $(this).dialog("close");
                    }
                });

                $("#logout-dialog").dialog("open");
            });
        });
    </script>

    <section class="home-section">
        <!-- NAVBAR -->
        <nav>
            <div class="side-bar-button">
                <i class='bx bx-menu small'></i>
                <i class='bx bx-menu large'></i>
            </div>
            <div class="profile-details">
                <i class='bx bx-user'></i>
                <?php echo '<span class="admin-name">' . $_SESSION['user_firstname'] . ' ' . $_SESSION['user_lastname'] . '</span>'; ?>
            </div>
        </nav>

        <script>
            var reference = (function self() {
                if (sessionStorage.getItem("sidebar") == "small") {
                    small();
                } else {
                    large();
                }
            }());

            $('.bx-menu.small').on('click', function() {
                small();
            });
            $('.bx-menu.large').on('click', function() {
                large();
            });

            function small() {
                $('.bx-menu.small').hide();
                $('.bx-menu.large').show();

                $('.side-bar').css('width', '60px');
                $('.home-section').css('width', 'calc(100%)');
                $('.home-section').css('left', '60px');
                $('.home-section nav').css('width', 'calc(100% - 60px)');
                $('.home-section nav').css('left', '60px');

                sessionStorage.setItem("sidebar", "small");
            }

            function large() {
                $('.bx-menu.small').show();
                $('.bx-menu.large').hide();

                $('.side-bar').css('width', '250px');
                $('.home-section').css('width', 'calc(100% - 100px)');
                $('.home-section').css('left', '170px');
                $('.home-section nav').css('width', 'calc(100% - 250px)');
                $('.home-section nav').css('left', '250px');

                sessionStorage.setItem("sidebar", "large");
            }
        </script>
        <!-- NAVBAR -->


        <div class="home-content">
            <div class="main-content">
                <h1>Applications</h1>
                <div class="content-table-container">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="pending nav-link d-flex flex-row active" aria-current="page" href="#pending" data-bs-toggle="tab">Pending <div class="number-pending d-flex flex-row justify-content-center align-items-center" style="background-color: red; padding: 2px; border-radius: 5px; font-size: 12px; width: 15px ;height: 20px; padding: 3px; color: white; margin-left: 4px"><?php $sql = "SELECT * FROM deanslist_applicants WHERE app_status = 'Pending'";
                                                                                                                                                                                                                                                                                                                                                                                                      $result = mysqli_query($conn, $sql); echo mysqli_num_rows($result) ?></div> </a>
                        </li>
                        <li class="nav-item">
                            <a class="accepted nav-link d-flex flex-row" href="#accepted" data-bs-toggle="tab">Approved <div class="number-pending d-flex flex-row justify-content-center align-items-center" style="background-color: red; padding: 2px; border-radius: 5px; font-size: 12px; width: 15px ;height: 20px; padding: 3px; color: white; margin-left: 4px"><?php $sql = "SELECT * FROM deanslist_applicants WHERE app_status = 'Accepted'";
                                                                                                                                                                                                                                                                                                                                                                        $result = mysqli_query($conn, $sql); echo mysqli_num_rows($result) ?></div> </a>
                        </li>
                        <li class="nav-item">
                            <a class="declined nav-link d-flex flex-row" href="#declined" data-bs-toggle="tab">Declined <div class="number-pending d-flex flex-row justify-content-center align-items-center" style="background-color: red; padding: 2px; border-radius: 5px; font-size: 12px; width: 15px ;height: 20px; padding: 3px; color: white; margin-left: 4px"><?php $sql = "SELECT * FROM deanslist_applicants WHERE app_status = 'Declined'";
                                                                                                                                                                                                                                                                                                                                                                        $result = mysqli_query($conn, $sql); echo mysqli_num_rows($result) ?></div> </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="pending">
                            <div class="filter-div d-flex flex-row ">
                                <p>Type</p>
                                <select class="form-select type">
                                    <option selected>All</option>
                                </select>
                                <p>Program</p>
                                <select class="form-select program">
                                    <option selected>All</option>
                                    <option>Computer Science</option>
                                    <option>Information Technology</option>
                                </select>
                                <p>Search</p>
                                <input class="form-control search-bar" type="text" placeholder="Enter Student Name Here">
                            </div>
                            <!-- Table for Pending Applicants -->
                            <div class="applicant-table-div">
                                <table class="table" id="pendingTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 15%">Name</th>
                                            <th scope="col" style="width: 11%">Year Level</th>
                                            <th scope="col" style="width: 11%">Curriculum</th>
                                            <th scope="col" style="width: 9%">Section</th>
                                            <th scope="col" style="width: 11%">Total GPA</th>
                                            <th scope="col" style="width: 11%">Email Address</th>
                                            <th scope="col" style="width: 14%">Adviser Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM deanslist_applicants WHERE app_status = 'Pending'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                if ($row["year_level"] % 10 == 1 && $row["year_level"] != 11) {
                                                    $suffix = "st";
                                                } else if ($row["year_level"] % 10 == 2 && $row["year_level"] != 12) {
                                                    $suffix = "nd";
                                                } else if ($row["year_level"] % 10 == 3 && $row["year_level"] != 13) {
                                                    $suffix = "rd";
                                                } else {
                                                    $suffix = "th";
                                                }
                                                $user_id = $row["id"];
                                                echo "<tr><td>" . $row["user_name"] . "</td><td>" . $row["year_level"] . $suffix . " Year</td><td>" . strtoupper($row["curriculum"]) . "</td><td>Section " . $row["section"] . "</td><td>" . $row["gpa"] . "</td><td>" . $row["email"] . "</td>" . "<td>" . $row["adviser_status"] . "</td>" . '<td>
                                                        <form action="update.php" method="post">
                                                            <button type="button" name="view" class="btn btn-warning view" data-bs-toggle="modal" data-bs-target="#viewModal" style="color: white">View</button><br>
                                                            <button type="button" name="accept" class="btn btn-success accept" data-bs-toggle="modal" data-bs-target="#confirmModal">Approve</button><br>
                                                            <button type="button" name="decline" class="btn btn-danger decline" data-bs-toggle="modal" data-bs-target="#declineModal">Decline</button>
                                                            <input type="hidden" name="app_id" value="' . $user_id . '">
                                                        </form></td>' . "</tr>";
                                            }
                                        }
                                        ?>

                                                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header d-flex justify-content-center">
                                                                <h5 class="modal-title">Applicant's Info</h5>
                                                            </div>
                                                            <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                                                                <div class="grades-table" style="width: 80%; margin-top: 10px">
                                                                    <div class="grades-table-header d-flex flex-row" style="width: 100%">
                                                                        <h1 class="text-left" style="margin: 0; width: 85%; font-weight: bold">Subject Name</h1>
                                                                        <h1 class="text-center" style="margin: 0; width: 20%; font-weight: bold">Grade</h1>
                                                                    </div>
                                                                    <div class="grades-table-body d-flex flex-column" style="width: 100%; margin-top: 5px">
                                                                        <?php
                                                                        $sql2 = "SELECT * FROM grades_list WHERE applicant_id = " . $user_id;
                                                                        $result = mysqli_query($conn, $sql2);
                                                                        if (mysqli_num_rows($result) > 0) {
                                                                            while ($row2 = mysqli_fetch_assoc($result)) {
                                                                        ?>
                                                                                <div class="grades-table-row d-flex flex-row" style="width: 100%; margin-bottom: 5px; border-bottom: 1px grey solid; padding-bottom: 3px">
                                                                                    <h4 class="text-left" style="margin: 0; width: 80%"><?php echo $row2['subject_name'] ?></h4>
                                                                                    <h4 class="text-center" style="margin: 0; width: 20%"><?php echo $row2['grade'] ?></h4>
                                                                                </div>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                    <div class="grades-table-bottom-div d-flex flex-row justify-content-between" style="width: 100%; margin-top: 10px">
                                                                        <a target="_blank" href="documents/<?php echo $row['app_file'] ?>">
                                                                            <h5 style="margin-top: 0;">View Proof</h5>
                                                                        </a>
                                                                        <h5 >GPA: <?php echo $row['gpa'] ?></h5>
                                                                    </div>
                                                                </div>


                                                                <div class="modal-btn-div">
                                                                    <button type="button" class="btn btn-danger cancelBtn" data-bs-dismiss="modal">Close</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header d-flex justify-content-center">
                                                                <h5 class="modal-title">Approve Selected Student?</h5>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h1>By clicking "Approve", you are now permitting the student to be in the Dean's List.</h1>
                                                                <div class="modal-btn-div">
                                                                    <form action="update.php" method="post">
                                                                        <button type="submit" name="accept" class="btn btn-success confirmBtn">Confirm</button>    
                                                                        <input hidden name="app_id" value="<?php echo $row['id'] ?>">  
                                                                        <input hidden name="fullname" value="<?php echo $row['user_name'] ?>">  
                                                                        <input hidden name="gpa" value="<?php echo $row['gpa'] ?>">  
                                                                        <input hidden name="department" value="<?php echo $row['curriculum'] ?>">  
                                                                        <input hidden name="year_level" value="<?php echo $row['year_level'] ?>">  
                                                                    </form>
                                                                    <button type="button" class="btn btn-danger cancelBtn" data-bs-dismiss="modal">Cancel</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="declineModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header d-flex justify-content-center">
                                                                <h5 class="modal-title">Decline Application</h5>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h1>Are you sure to decline this application? Please make a feeback about the application.</h1>
                                                                <div class="modal-btn-div">
                                                                    <form action="update.php" method="post">
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="col-form-label">Message:</label>
                                                                            <textarea class="form-control" name="decline-text"  rows="6"></textarea>
                                                                        </div>
                                                                        <div class="form-group mt-4">
                                                                            <button type="submit" name="decline" class="btn btn-success confirmBtn">Decline</button>  
                                                                            <button type="button" class="btn btn-danger cancelBtn " data-bs-dismiss="modal">Cancel</button> 
                                                                        </div>
                                                                         
                                                                        <input hidden name="app_id" value="<?php echo $row['id'] ?>">  
                                                                        <input hidden name="fullname" value="<?php echo $row['user_name'] ?>">  
                                                                        <input hidden name="gpa" value="<?php echo $row['gpa'] ?>">  
                                                                        <input hidden name="department" value="<?php echo $row['curriculum'] ?>">  
                                                                        <input hidden name="year_level" value="<?php echo $row['year_level'] ?>">  
                                                                    </form>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="accepted">
                            <div class="filter-div d-flex flex-row ">
                                <p>Type</p>
                                <select class="form-select type">
                                    <option selected>All</option>
                                </select>
                                <p>Program</p>
                                <select class="form-select program">
                                    <option selected>All</option>
                                    <option>Computer Science</option>
                                    <option>Information Technology</option>
                                </select>
                                <p>Search</p>
                                <input class="form-control search-bar" type="text" placeholder="Enter Student Name Here">
                            </div>
                            <!-- Table for Accepted Applicants -->
                            <div class="applicant-table-div">
                                <table class="table" id="acceptedTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="min-width: 15%">Name</th>
                                            <th scope="col" style="min-width: 11%">Year Level</th>
                                            <th scope="col" style="min-width: 11%">Curriculum</th>
                                            <th scope="col" style="min-width: 9%">Section</th>
                                            <th scope="col" style="min-width: 11%">Total GPA</th>
                                            <th scope="col" style="min-width: 25%">Email Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM deanslist_applicants WHERE app_status = 'Accepted'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                if ($row["year_level"] % 10 == 1 && $row["year_level"] != 11) {
                                                    $suffix = "st";
                                                } else if ($row["year_level"] % 10 == 2 && $row["year_level"] != 12) {
                                                    $suffix = "nd";
                                                } else if ($row["year_level"] % 10 == 3 && $row["year_level"] != 13) {
                                                    $suffix = "rd";
                                                } else {
                                                    $suffix = "th";
                                                }

                                                $user_id = $row["user_id"];
                                        ?>

                                                <tr>
                                                    <td><?php echo $row["user_name"] ?></td>
                                                    <td><?php echo $row["year_level"] . $suffix . " Year" ?></td>
                                                    <td><?php echo strtoupper($row["curriculum"]) ?></td>
                                                    <td><?php echo "Section " . $row["section"] ?></td>
                                                    <td><?php echo $row["gpa"] ?></td>
                                                    <td><?php echo $row["email"] ?></td>
                                                </tr>

                                        <?php

                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="declined">
                            <div class="filter-div d-flex flex-row ">
                                <p>Type</p>
                                <select class="form-select type">
                                    <option selected>All</option>
                                </select>
                                <p>Program</p>
                                <select class="form-select program">
                                    <option selected>All</option>
                                    <option>Computer Science</option>
                                    <option>Information Technology</option>
                                </select>
                                <p>Search</p>
                                <input class="form-control search-bar" type="text" placeholder="Enter Student Name Here">
                            </div>
                            <?php
                            $sql = "SELECT * FROM deanslist_applicants WHERE app_status = 'Declined'";
                            $result = mysqli_query($conn, $sql);
                            ?>
                            <!-- Table for Declined Applicants -->
                            <div class="applicant-table-div">
                                <table class="table" id="declinedTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="min-width: 15%">Name</th>
                                            <th scope="col" style="min-width: 11%">Year Level</th>
                                            <th scope="col" style="min-width: 11%">Curriculum</th>
                                            <th scope="col" style="min-width: 9%">Section</th>
                                            <th scope="col" style="min-width: 11%">Total GPA</th>
                                            <th scope="col" style="min-width: 25%">Email Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                if ($row["year_level"] % 10 == 1 && $row["year_level"] != 11) {
                                                    $suffix = "st";
                                                } else if ($row["year_level"] % 10 == 2 && $row["year_level"] != 12) {
                                                    $suffix = "nd";
                                                } else if ($row["year_level"] % 10 == 3 && $row["year_level"] != 13) {
                                                    $suffix = "rd";
                                                } else {
                                                    $suffix = "th";
                                                }
                                                $user_id = $row["user_id"];
                                                echo "<tr><td>" . $row["user_name"] . "</td><td>" . $row["year_level"] . $suffix . " Year</td><td>BS" . strtoupper($row["curriculum"]) . "</td><td>Section " . $row["section"] . "</td><td>" . $row["gpa"] . "</td><td>" . $row["email"] . "</td></tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>
</body>

<script>
    $('#pendingTable').dataTable({
        "lengthChange": false,
        "searching": false,
        "columns": [{
                "width": "15%"
            },
            {
                "width": "11%"
            },
            {
                "width": "11%"
            },
            {
                "width": "9%"
            },
            {
                "width": "11%"
            },
            {
                "width": "15%"
            },
            {
                "width": "12%"
            },
            {
                "width": "18%"
            },
        ],
        "autoWidth": false
    });
    $('#acceptedTable').dataTable({
        "lengthChange": false,
        "searching": false,
        "columns": [{
                "width": "15%"
            },
            {
                "width": "11%"
            },
            {
                "width": "11%"
            },
            {
                "width": "9%"
            },
            {
                "width": "11%"
            },
            {
                "width": "25%"
            }
        ],
        "autoWidth": false
    });
    $('#declinedTable').dataTable({
        "lengthChange": false,
        "searching": false,
        "columns": [{
                "width": "15%"
            },
            {
                "width": "11%"
            },
            {
                "width": "11%"
            },
            {
                "width": "9%"
            },
            {
                "width": "11%"
            },
            {
                "width": "25%"
            }
        ],
        "autoWidth": false
    });
    $('#gradesTable').dataTable({
        "lengthChange": false,
        "searching": false,
        "columns": [{
                "width": "15%"
            },
            {
                "width": "11%"
            }
        ],
        "autoWidth": false
    });
    $(function($) {
       
    });
</script>
</html>