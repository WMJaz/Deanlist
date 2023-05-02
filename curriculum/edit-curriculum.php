<?php

session_start();

include_once '../class/program.class.php';

$program = new Program();

if (!isset($_SESSION['logged-in'])) {
    header('location: ../login/login.php');
}

if(isset($_POST["submit"])){
    $schoolyear = $_POST['sy'];
    $course = $_POST['course'];
    $sem = $_POST['sem'];
    $year = $_POST['yearlevel'];
    $syid = $_POST['sy_id'];

    $subCode = $_POST['subjcode'];
    $subName = $_POST['subjname'];
    $lecUnit = $_POST['lecunit'];
    $labUnit = $_POST['labunit'];
    $preReq = $_POST['prereq'];

    $courseID = 0;

    foreach ($program->getCourseID($course) as $value) {
        $courseID = $value['id'];
    }

    $program->editCurriculum($syid, $schoolyear);
    $program->deleteUpdate($sem, $year, $syid);

    foreach($subCode as $key => $n ) {
        if($program->addSubjects($n, $subName[$key], $lecUnit[$key], $labUnit[$key], $preReq[$key], $sem, $courseID, $year, $syid)){
        ?>
        <h1>ss</h1>
        <?php
            echo "Success!";
        }
        else {
        ?>
        <h1>ssSS</h1>
        <?php
            echo "Failed!";
        }
    }

    header('location: curriculum.php?course=' . $course);
}elseif(isset($_POST['sem'])){
    header('location: edit-curriculum.php?course=' . $_POST['course_name'] . "&sy=" . $_POST['sy'] . "&sem=" . $_POST['sem'] . "&year=" . $_POST['year'] . "&syid=" . $_POST['sy_id']);
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


    <title>Curriculum | CCS</title>
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
                <a href="../curriculum/curriculum.php" class="active">
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

        <div class="home-content">
            <?php
            if (isset($_GET['course']) && isset($_GET['sy'])) {
            ?>
                <div class="table-container course-select" style="width: 100%; height: 600px; background-color: white">
                    <div class="header-program d-flex flex-row">
                        <h1 class=" text-center" style="margin: 0; font-weight: bold; font-size: 28px; width: 100%"><?php echo $_GET['course'] ?> CURRICULUMS<br>YEAR <?php echo $_GET['sy'] ?></h1>

                    </div>
                    <div class="curriculum-container" style="margin-top: 20px ;overflow: auto; width: 100%; height: 90%; border: 1px gray solid; padding: 10px">
                        <div class="filter-div w-100 d-flex flex-row justify-content-between" style="min-height: 50px;">
                            <div class="d-flex flex-row align-items-center" style="width: 45%;">
                                <form class="d-flex flex-row align-items-center" style="width: 100%;" method="POST" action="edit-curriculum.php">
                                    <input class="form-control" form="editform" value="<?php echo $_GET['sy'] ?>" type="text" placeholder="School Year" style="width: 33%; margin-right: 10px; font-size: 15px !important" name="sy" required>
                                    <input hidden name="sy_id" value="<?php echo $_GET['syid'] ?>">
                                
                                    <select onchange="this.form.submit()" class="form-select sem-select" style="height: 40px; width: 33%; font-size: 15px !important; margin-right: 10px" name="sem" aria-label="semester">
                                        <option value="1" <?php if ($_GET['sem'] == 1) echo "selected" ?>>1st Semester</option>
                                        <option value="2" <?php if ($_GET['sem'] == 2) echo "selected" ?>>2nd Semester</option>
                                    </select>


                                    <select onchange="this.form.submit()" class="form-select year-select" style="height: 40px; width: 33%; font-size: 15px !important" name="year" aria-label="yearlevel">
                                        <option value="1" <?php if ($_GET['year'] == 1) echo "selected" ?>>1st year</option>
                                        <option value="2" <?php if ($_GET['year'] == 2) echo "selected" ?>>2nd year</option>
                                        <option value="3" <?php if ($_GET['year'] == 3) echo "selected" ?>>3rd year</option>
                                        <option value="4" <?php if ($_GET['year'] == 4) echo "selected" ?>>4th year</option>
                                    </select>
                                    <input hidden name="course_name" value="<?php echo $_GET['course'] ?>">
                                    <input hidden name="sy" value="<?php echo $_GET['sy'] ?>">
                                </form>
                            </div>

                            <button type="submit" form="editform" name="submit" class="btn btn-success edit-curr-btn d-flex flex-row align-items-center" style="height: 40px; margin-top: 5px"><i class='bx bx-plus'></i>
                                <p class="add-text" style="color: white; margin-top: 8px; margin-left: 5px">Save Curriculum</p>
                            </button>
                        </div>
                        <table class="table" id="inputTable" style="margin: 0">
                            <thead>
                                <tr>
                                    <th style="font-size: 16px">Subject Code</th>
                                    <th style="font-size: 16px">Subject Name</th>
                                    <th style="font-size: 16px">Lec</th>
                                    <th style="font-size: 16px">Lab</th>
                                    <th style="font-size: 16px">Pre-requisite</th>
                                    <th style="font-size: 16px"></th>
                                </tr>
                            </thead>
                            <tbody id="subjtable">
                                    
                                    <?php
                                    require_once '../class/program.class.php';

                                    $program = new Program();

                                    foreach ($program->showSubjects($_GET['course'], $_GET['sy'], $_GET['sem'], $_GET['year']) as $value) { //
                                    ?>
                                        <tr>
                                            <!-- always use echo to output PHP values -->
                                            <td style="font-size: 16px; width: 20%"><input form="editform" value="<?php echo $value['subject_code'] ?>" class="form-control" type="text" placeholder="Subject Code" style="width: 95%; margin-right: 10px; font-size: 15px !important" name="subjcode[]" required></td>
                                            <td style="font-size: 16px; width: 30%"><input form="editform" value="<?php echo $value['subject_name'] ?>"class="form-control" type="text" placeholder="Subject Name" style="width: 95%; margin-right: 10px; font-size: 15px !important" name="subjname[]" required></td>
                                            <td style="font-size: 16px; width: 7%"><input form="editform" value="<?php echo $value['lec_units'] ?>" class="form-control" type="number" min=0 max=10 style="width: 95%; margin-right: 10px; font-size: 15px !important" name="lecunit[]" id="lecunit" required></td>
                                            <td style="font-size: 16px; width: 7%"><input  form="editform"value="<?php echo $value['lab_units'] ?>" class="form-control" type="number" min=0 max=10 style="width: 95%; margin-right: 10px; font-size: 15px !important" name="labunit[]" id="labunit" required></td>
                                            <td style="font-size: 16px"><input form="editform" value="<?php echo $value['pre_req'] ?>" class="form-control" type="text" placeholder="Pre-requisite" style="width: 95%; margin-right: 10px; font-size: 15px !important" name="prereq[]" required></td>
                                            <td style="font-size: 16px; width: 7%"><button onclick="deleteTableRow(this)" type="button" class="btn btn-danger" style="margin-top: 4px; margin-left: 10px">X</button></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                        <form action="edit-curriculum.php" method="post" id="editform">
                            <input hidden name="course" value="<?php echo $_GET['course'] ?>">
                            <input hidden name="sem" value="<?php echo $_GET['sem'] ?>">
                            <input hidden name="yearlevel" value="<?php echo $_GET['year'] ?>">
                            <input hidden name="sy_id" value="<?php echo $_GET['syid'] ?>">
                        </form>
                        <button type="button" onclick="createRow()" class="btn btn-success">Add New Subject</button>
                    </div>
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
        col.innerHTML = '<input form="editform" class="form-control" type="text" placeholder="Subject Code" style="width: 95%; margin-right: 10px; font-size: 15px !important" name="subjcode[]" required>'; // put data in first column
        col2.innerHTML = '<input form="editform" class="form-control" type="text" placeholder="Subject Name" style="width: 95%; margin-right: 10px; font-size: 15px !important" name="subjname[]" required>'; // put data in second column
        col3.innerHTML = '<input form="editform" class="form-control" type="number" min=0 max=10 style="width: 95%; margin-right: 10px; font-size: 15px !important" name="lecunit[]" id="lecunit" required>';
        col4.innerHTML = '<input form="editform" class="form-control" type="number" min=0 max=10 style="width: 95%; margin-right: 10px; font-size: 15px !important" name="labunit[]" id="labunit" required>';
        col5.innerHTML = '<input form="editform" class="form-control" type="text" placeholder="Pre-requisite" style="width: 95%; margin-right: 10px; font-size: 15px !important" name="prereq[]" required>';
        col6.innerHTML = '<button type="button" onclick="deleteTableRow(this)" class="btn btn-danger" style="margin-top: 4px; margin-left: 10px">X</button>';
        var table = document.getElementById("subjtable"); // find table to append to
        table.appendChild(row); // append row to table
    }

    function deleteTableRow(a){
        var i = a.parentNode.parentNode.rowIndex;
        document.getElementById("inputTable").deleteRow(i);
    }
</script>

</html>