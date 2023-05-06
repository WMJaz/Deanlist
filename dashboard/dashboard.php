<?php
session_start();
if (!isset($_SESSION['logged-in'])) {
    header('location: ../login/login.php');
}
require_once '../tools/variables.php';
$dashboard = 'active';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Dashboard | Dean's List Application System</title>
    <link rel="icon" href="../img/ccslogo.png" type="image/icon type">
    <link rel="stylesheet" href="../css/jquery.toast.css">
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
                <a href="../dashboard/dashboard.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links-name">Dashboard</span>
                </a>
            </li>

            <?php if ($_SESSION['user_type'] == 'student') { ?>
                <li>
                    <a href="../apply/application-new.php">
                        <i class='bx bxs-edit'></i>
                        <span class="links-name">Application</span>
                    </a>
                </li>
            <?php } ?>

            <?php if ($_SESSION['user_type'] == 'adviser') { ?>
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
                    <i class='bx bx-group'></i>
                    <span class="links-name">CCS Faculty</span>
                </a>
            </li>

            <li>
                <a href="../programs/programs.php">
                    <i class='bx bx-book-reader'></i>
                    <span class="links-name">CCS Courses</span>
                </a>
            </li>

            <?php if ($_SESSION['user_type'] == 'admin') { ?>
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
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Students</div>
                        <div class="number"><span id="dashboard_student_count"></span></div>
                        <div class="indicator">
                            <span class="text">As of <span class="text" name="dashboard_asof"></span></span>
                        </div>
                    </div>
                    <i class='bx bx-user'></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Faculty</div>
                        <div class="number"><span id="dashboard_faculty_count"></div>
                        <div class="indicator">
                            <span class="text">As of <span class="text" name="dashboard_asof"></span></span>
                        </div>
                    </div>
                    <i class='bx bx-group'></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Programs</div>
                        <div class="number"><span id="dashboard_program_count"></div>
                        <div class="indicator">
                            <span class="text">As of <span class="text" name="dashboard_asof"></span></span>
                        </div>
                    </div>
                    <i class='bx bx-book-reader'></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">
                            Dean's Listers
                        </div>
                        <div class="number"><span id="dashboard_deanlister_count"></div>
                        <div class="indicator">

                            <span class="text">As of <span class="text" name="dashboard_asof"></span></span>
                        </div>
                    </div>
                    <i class='bx bx-list-check'></i>
                </div>
            </div>

            <div class="container-fluid">
                <div class="col-12 mt-5">
                    <h4><strong>TOP 3 STUDENTS</strong></h4>
                </div>
                <div class="row" id="top-student">
                </div>
            </div>

    </section>
    
    <script type="text/javascript" src="../js/jquery.toast.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>