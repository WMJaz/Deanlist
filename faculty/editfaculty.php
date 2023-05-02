<?php

    require_once '../functions/functions.php';
    require_once '../class/faculty.class.php';

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }
    //if the above code is false then code and html below will be executed
    $faculty = new Faculty;
    //if add faculty is submitted
    if(isset($_POST['save'])){
        //sanitize user inputs
        $faculty->id = $_POST['faculty-id'];
        $faculty->img = htmlentities($_POST['img']);
        $faculty->firstname = htmlentities($_POST['firstname']);
        $faculty->lastname = htmlentities($_POST['lastname']);
        $faculty->rank = $_POST['rank'];
        $faculty->email = $_POST['email'];
        $faculty->status = 'Not Set';
        if(isset($_POST['status'])){
            $faculty->status = $_POST['status'];
        }
        if(validate_add_faculty($_POST)){
            if($faculty->edit()){
                //redirect user to faculty page after saving
                header('location: faculty.php');
            }
        }
    }else{
        if ($faculty->fetch($_GET['id'])){
            $data = $faculty->fetch($_GET['id']);
            $faculty->id = $data['id'];
            $faculty->img = $data['img'];
            $faculty->firstname = $data['firstname'];
            $faculty->lastname = $data['lastname'];
            $faculty->rank = $data['rank'];
            $faculty->email = $data['email'];
            $faculty->status = $data['status'];
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
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


    <title>Edit Faculty | Dean's List Application System - CCS</title>
    <link rel="icon" href="../img/ccslogo.png" type="image/icon type">
</head>
<body>
    <div class="side-bar">
        <br>
        <div class="logo-details">
            <img class="logo" style="margin-left:2px"src="ccslogo.png" width ="55" height = "60">
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
                <a href="../faculty/faculty.php" class="active">
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
                    "Yes" : function() {
                        window.location.href = theHREF;
                    },
                    "No" : function() {
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
                <?php echo '<span class="admin-name">'.$_SESSION['user_firstname'].' '.$_SESSION['user_lastname'].'</span>'; ?>
            </div>
        </nav>

        <script>
        var reference = (function self(){
            if(sessionStorage.getItem("sidebar") == "small"){
                small();
            }else{
                large();
            }
        }());

        $('.bx-menu.small').on('click', function(){
            small();
        });
        $('.bx-menu.large').on('click', function(){
            large();
        });

        function small(){
            $('.bx-menu.small').hide();
            $('.bx-menu.large').show();

            $('.side-bar').css('width', '60px');
            $('.home-section').css('width', 'calc(100% - 60px)');
            $('.home-section').css('left', '60px');
            $('.home-section nav').css('width', 'calc(100% - 60px)');
            $('.home-section nav').css('left', '60px');

            sessionStorage.setItem("sidebar", "small");
        }

        function large(){
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
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Edit Faculty</h3>
                <a class="back" href="faculty.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <br>
            <div class="add-form-container">
                <form class="add-form" action="editfaculty.php" method="post">
                    <input type="text" hidden name="faculty-id" value="<?php echo $faculty->id; ?>">

                    <label for="img">Image</label>
                    <input type="file" name="img" id = "img" accept=".jpg, .jpeg, .png" value="<?php if(isset($_POST['img'])) { echo $_POST['img']; } else { echo $faculty->img; }?>">

                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required placeholder="Enter first name" value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } else { echo $faculty->firstname; }?>">
                    <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                    ?>
                                <p class="error">First name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required placeholder="Enter last name" value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } else { echo $faculty->lastname; }?>">
                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                                <p class="error">Last name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                   <label for="rank">Academic Rank</label>
                    <input type="text" id="rank" name="rank" required placeholder="Enter rank" value="<?php if(isset($_POST['rank'])) { echo $_POST['rank']; } else { echo $faculty->rank; }?>">
                    <?php
                        if(isset($_POST['save']) && !validate_rank($_POST)){
                    ?>
                                <p class="error">Rank is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } else { echo $faculty->email; }?>">
                    <?php
                        if(isset($_POST['save']) && !validate_email($_POST)){
                    ?>
                                <p class="error">Email is invalid. Use only @wmsu.edu.ph</p>
                    <?php
                        }
                    ?>
                    <div>
                        <label for="status">Faculty Role</label><br>
                        <label class="container" for="Admin">Admin
                            <input type="radio" name="status" id="Admin" value="Admin" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Admin') echo ' checked'; }  elseif ($faculty->status == 'Admin') echo ' checked'; ?>>
                            <span class="checkmark"></span>
                        </label>
                        <br>
                        <label class="container" for="Adviser">Adviser
                            <input type="radio" name="status" id="Adviser" value="Adviser" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Adviser') echo ' checked'; }  elseif ($faculty->status == 'Adviser') echo ' checked'; ?>>
                            <span class="checkmark"></span>
                        </label>
                        <br>
                        <label class="container" for="None">None
                            <input type="radio" name="status" id="None" value="None" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'None') echo ' checked'; }  elseif ($faculty->status == 'None') echo ' checked'; ?>>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <?php
                        if(isset($_POST['save']) && !validate_status($_POST)){
                    ?>
                                <p class="error">Please select Faculty role.</p>
                    <?php
                        }
                    ?>
                    <input type="submit" class="button" value="Save Faculty" name="save" id="save">
                </form>
            </div>
        </div>
    </div>
</body>
</html>