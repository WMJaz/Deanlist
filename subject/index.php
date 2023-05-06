<?php

    session_start();
    
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }


    require_once '../tools/variables.php';
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
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

        
        <title>Users | Dean's List Application System - CCS</title>
        <link rel="icon" href="../img/ccslogo.png" type="image/icon type">

        <meta charset="UTF-8">

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </head>

    <body>

         <div class="side-bar">
            <br>
                <div class="logo-details">
                    <img class="logo" style="margin-left:2px"src="../img/ccslogo.png" width ="55" height = "60">
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
                <a href="../settings/settings.php">
                    <i class='bx bx-cog'></i>
                    <span class="links-name">Settings</span>
                </a>
            </li>

            <li>
                <a href="../subject/index.php" class="active">
                <i class='bx bxs-file-plus'></i>
                    <span class="links-name">Subjects</span>
                </a>
            </li>

            <li>
                <a href="../users/index.php">
                    
                    <i class='bx bxs-user-account'></i>
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

	   <section class="home-section">
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
        
	        <div class="home-content">
	            <div class="table-container">
	                <div class="table-heading">
	                    <h3 class="table-title">Subject</h3>
	                    <?php
	                        if($_SESSION['user_type'] == 'admin'){ 
	                    ?>
	                        <a class="button" style="color:white"  data-bs-toggle="modal" data-bs-target="#addModal">Add Subject</a>
	                    <?php
	                        }
	                    ?>
	                </div>
	                
	                <br>

	                <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	                </div>

	                <table class="table" id="myTable">
	                    <thead>
	                        <tr>
	                            <th>#</th>
                                <th>Code</th>
	                            <th>Description</th>
	                            <th>Sem</th>
	                            <th>Cur</th>
	                            <th>Yr Lvl</th>
	                            <?php
	                                if($_SESSION['user_type'] == 'admin'){ 
	                            ?>
	                                <th class="text-center">ACTION</th>
	                            <?php
	                                }
	                            ?>
	                        </tr>
	                    </thead>
	                    <tbody id="dataTable">

	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </section>

	    
	    <?php
	    
	        include '../subject/create.php';
	        include '../subject/edit.php';
	        include '../subject/delete.php';
	        include '../subject/script.php';
	    ?>


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
                $('.home-section').css('width', 'calc(100%)');
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
    
    </body>

</html>