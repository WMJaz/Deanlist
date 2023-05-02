<?php

session_start();

include_once '../class/program.class.php';

$program = new Program();

if (!isset($_SESSION['logged-in'])) {
    header('location: ../login/login.php');
}

if (isset($_POST["app"])) {
    header('location: settings.php?course=' . $_POST['course_name'] . "&sy=" . $_POST['sy_id']);
}

if (isset($_POST["submitStatus"])) {
    $firstSemStatus = $_POST['app_status'];
    $secondSemStatus = $_POST['app_status2'];
    $syid = $_POST['sy_id'];

    $firstSemStartDate = null;
    $firstSemEndDate = null;

    $secondSemStartDate = null;
    $secondSemEndDate = null;

    if($firstSemStatus == "date"){
        $firstSemStartDate = $_POST['startDate'];
        $firstSemEndDate = $_POST['endDate'];
    }

    if($secondSemStatus == "date"){
        $secondSemStartDate = $_POST['startDate2'];
        $secondSemEndDate = $_POST['endDate2'];
    }

    $program->updateAppStatus($syid, $firstSemStatus, $secondSemStatus, $firstSemStartDate, $firstSemEndDate, $secondSemStartDate, $secondSemEndDate);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/programs.css?v=<?php echo time(); ?>" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


    <title>Settings | Dean's List Application System - CCS</title>
    <link rel="icon" href="../img/ccslogo.png" type="image/icon type">
</head>

<body>
    <div class="side-bar">
        <br>
        <div class="logo-details">
            <img class="logo" style="margin-left:2px" src="ccslogo.png" width="55" height="60">
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
                    <a href="../apply/admin-application.php">
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
                <a href="../settings/settings.php" class = "active">
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
                $('.home-section').css('width', 'calc(100% - 60px)');
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

        <div class="home-content d-flex flex-row justify-content-center align-items-center">
            <?php
            if (isset($_GET['sy'])) {
                foreach ($program->getAppTime($_GET['sy']) as $value) {
            ?>
                    <div class="table-container course-select" style="width: fit-content; height: fit-content; background-color: white">
                        <form method="POST" action="settings.php">
                            <div style="margin-bottom: 15px">
                                <h3>First Semester Application: </h3>
                                <div class="d-flex flex-column" style="margin-left: 25px">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="app_status" id="appstatus1" value=1 <?php if ($value['1st_sem'] == 1) echo "checked" ?>>
                                        <label class="form-check-label" for="flexRadioDefault1" style="margin-left: 10px; margin-top: 5px">
                                            Open Application
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="app_status" id="appstatus2" value=0 <?php if ($value['1st_sem'] == 0) echo "checked" ?>>
                                        <label class="form-check-label" for="flexRadioDefault2" style="margin-left: 10px; margin-top: 5px">
                                            Close Application
                                        </label>
                                    </div>
                                    <div class="form-check d-flex flex-row">
                                        <input class="form-check-input" type="radio" name="app_status" id="appstatus3" value="date" <?php if ($value['1st_sem_start'] != null) echo "checked" ?>>
                                        <label class="form-check-label" for="flexRadioDefault2" style="margin-left: 10px; margin-top: 5px">
                                            Set Date Duration
                                        </label>
                                        <input id="startDate" type="date" name="startDate" style="height: 40px;width: 170px" <?php if ($value['1st_sem_start'] != null) echo "value=" . $value['1st_sem_start']; else echo "disabled" ?>>
                                        <h1 style="margin-top: 7px;">-</h1>
                                        <input id="endDate" type="date" name="endDate" style="height: 40px;width: 170px" <?php if ($value['1st_sem_end'] != null) echo "value=" . $value['1st_sem_end']; else echo "disabled" ?>>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3>Second Semester Application: </h3>
                                <div class="d-flex flex-column" style="margin-left: 25px">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="app_status2" id="appstatus4" value=1 <?php if ($value['2nd_sem'] == 1) echo "checked" ?>>
                                        <label class="form-check-label" for="flexRadioDefault1" style="margin-left: 10px; margin-top: 5px">
                                            Open Application
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="app_status2" id="appstatus5" value=0 <?php if ($value['2nd_sem'] == 0) echo "checked" ?>>
                                        <label class="form-check-label" for="flexRadioDefault2" style="margin-left: 10px; margin-top: 5px">
                                            Close Application
                                        </label>
                                    </div>
                                    <div class="form-check d-flex flex-row">
                                        <input class="form-check-input" type="radio" name="app_status2" id="appstatus6" value="date" <?php if ($value['2nd_sem_start'] != null) echo "checked" ?>>
                                        <label class="form-check-label" for="flexRadioDefault2" style="margin-left: 10px; margin-top: 5px">
                                            Set Date Duration
                                        </label>
                                        <input id="startDate2" type="date" name="startDate2" style="height: 40px;width: 170px" <?php if ($value['2nd_sem_start'] != null) echo "value=" . $value['2nd_sem_start']; else echo "disabled" ?>>
                                        <h1 style="margin-top: 7px;">-</h1>
                                        <input id="endDate2" type="date" name="endDate2" style="height: 40px;width: 170px" <?php if ($value['2nd_sem_end'] != null) echo "value=" . $value['2nd_sem_end']; else echo "disabled" ?>>
                                    </div>
                                </div>
                            </div>

                            <input hidden name="sy_id" value="<?php echo $_GET['sy'] ?>">
                            <button class="btn btn-success" type="submit" name="submitStatus" style="font-size: 16px !important; padding: 5px 10px 5px 10px; margin-top: 25px">Update Application Status</button>
                        </form>
                    </div>
                <?php
                }
            } elseif (isset($_GET['course'])) {
                ?>
                <div class="table-container course-select" style="width: 100%; height: 600px; background-color: white">
                    <div class="header-program d-flex flex-row">
                        <h1 class=" text-center" style="margin: 0; margin-left: 100px;font-weight: bold; font-size: 28px; width: 100%"><?php echo $_GET['course'] ?> CURRICULUMS</h1>
                        <button type="button" name="add-curr" class="btn btn-success add-course-btn d-flex flex-row" data-bs-toggle="modal" data-bs-target="#add-curr"><i class='bx bx-plus'></i>
                            <p class="add-text" style="margin-top: 0 !important">Add New</p>
                        </button>
                    </div>
                    <div class="curriculum-container" style="overflow: auto; width: 100%; height: 90%; border: 1px gray solid">
                        <table class="table" id="syTable" style="margin: 0">
                            <thead>
                                <tr>
                                    <th style="width: 55%; font-size: 18px">School Year</th>
                                    <th style="width: 45%; font-size: 18px">Applications</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../class/program.class.php';

                                $program = new Program();

                                foreach ($program->showSchoolYears($_GET['course']) as $value) { //
                                ?>
                                    <form method="POST" action="settings.php">
                                        <input hidden name="sy_id" value="<?php echo $value['id'] ?>">
                                        <input hidden name="course_name" value="<?php echo $_GET['course'] ?>">
                                        <input hidden name="sy" value="<?php echo $value['school_year'] ?>">
                                        <input hidden name="sem" value=1>
                                        <input hidden name="year" value=1>
                                        <tr>
                                            <!-- always use echo to output PHP values -->
                                            <td style="font-size: 16px">Year <?php echo $value['school_year'] ?></td>
                                            <td style="font-size: 16px"><button class="btn btn-warning" name="app" type="submit" style="color: black !important; margin: 0; font-size: 16px; padding: 0 10px 0 10px">Edit Application Availability</button></td>
                                        </tr>
                                    </form>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="table-container course-select" style="width: 100%; height: 600px; background-color: white">
                    <div class="header-program d-flex flex-row">
                    <h1 class=" text-center" style="margin: 0; margin-left: 100px;font-weight: bold; font-size: 28px; width: 100%">CCS COURSES</h1>
                        
                    </div>
                    <div class="course-container d-flex flex-wrap flex-row justify-content-center" style="overflow: auto; width: 100%; padding-top: 20px; padding-bottom: 20px; height: 90%">
                        <a href="settings.php?course=BSCS" style="text-decoration: none;">
                            <button class="course-box d-flex justify-content-center align-items-center">
                                BSCS
                            </button>
                        </a>

                        <a href="settings.php?course=BSIT" style="text-decoration: none;">
                            <button class="course-box d-flex justify-content-center align-items-center">
                                BSIT
                            </button>
                        </a>
                    </div>
                    <h5 style="font-size: 20px; width: 100%; text-align:center">Select Department</h5>
                </div>
            <?php
            }
            ?>

        </div>


    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>


</body>
<script>
    function createRow() {
        var row = document.createElement('tr'); // create row node
        var col = document.createElement('td'); // create column node
        var col2 = document.createElement('td'); // create second column node
        var col3 = document.createElement('td');
        var col4 = document.createElement('td');
        var col5 = document.createElement('td');
        var col6 = document.createElement('td');
        row.appendChild(col); // append first column to row
        row.appendChild(col2); // append second column to row
        row.appendChild(col3);
        row.appendChild(col4);
        row.appendChild(col5);
        row.appendChild(col6);
        col.innerHTML = '<input class="form-control" type="text" placeholder="Subject Code" style="width: 95%; margin-right: 10px; font-size: 15px !important" name="subjcode[]" required>'; // put data in first column
        col2.innerHTML = '<input class="form-control" type="text" placeholder="Subject Name" style="width: 95%; margin-right: 10px; font-size: 15px !important" name="subjname[]" required>'; // put data in second column
        col3.innerHTML = '<input class="form-control" type="number" min=0 max=10 style="width: 95%; margin-right: 10px; font-size: 15px !important" name="lecunit[]" id="lecunit" required>';
        col4.innerHTML = '<input class="form-control" type="number" min=0 max=10 style="width: 95%; margin-right: 10px; font-size: 15px !important" name="labunit[]" id="labunit" required>';
        col5.innerHTML = '<input class="form-control" type="text" placeholder="Pre-requisite" style="width: 95%; margin-right: 10px; font-size: 15px !important" name="prereq[]" required>';
        col6.innerHTML = '<button type="button" onclick="deleteTableRow(this)" class="btn btn-danger" style="margin-top: 4px; margin-left: 10px">X</button>';
        var table = document.getElementById("subjtable"); // find table to append to
        table.appendChild(row); // append row to table
    }

    function deleteTableRow(a) {
        var i = a.parentNode.parentNode.rowIndex;
        document.getElementById("inputTable").deleteRow(i);
    }

    $(function() {
        $("input[name='app_status']").click(function() {
            if ($("#appstatus1").is(":checked") || $("#appstatus2").is(":checked")) {
                $("#startDate").attr("disabled", "disabled");
                $("#endDate").attr("disabled", "disabled");
            } else {
                $("#startDate").removeAttr("disabled");
                $("#endDate").removeAttr("disabled");

            }
        });

        $("input[name='app_status2']").click(function() {
            if ($("#appstatus4").is(":checked") || $("#appstatus5").is(":checked")) {
                $("#startDate2").attr("disabled", "disabled");
                $("#endDate2").attr("disabled", "disabled");
            } else {
                $("#startDate2").removeAttr("disabled");
                $("#endDate2").removeAttr("disabled");

            }
        });
    });
</script>

</html>