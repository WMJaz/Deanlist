<?php
session_start();
if (!isset($_SESSION['logged-in'])) {
    header('location: ../login/login.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'deanslist');
$path = "../";

require_once $path . "class/subject.class.php";
require_once $path . "class/listers.class.php";

include_once '../class/program.class.php';

date_default_timezone_set('Asia/Manila');
$subject = new subject;
$applicant = new Listers;
$subject -> applicant_id = $_SESSION['user_id'];

$listOfSubject = [];

$programs = new Program();

// button for form of selecting subjects
if (isset($_POST['firstStepSubmit'])) {
    // GET data from dtbase
    $subject->schoolyear = $_POST['schoolyear'];
    $subject->sem = $_POST['semester'];
    $subject->curriculum = $_POST['curriculum'];
    $subject->year_level = $_POST['yearlevel'];
    $subject->section = $_POST['section'];

    $sy = $_POST['schoolyear'];
    $sem = $_POST['semester'];
    $yearlevel = $_POST['yearlevel'];
    $section = $_POST['section'];

    $listOfSubject = $subject->getSubjects();
    
    $semtocheck = false;
    // ADD A NEW APPLICANT WHEN FIRST STEP DONE
    $fullname = $_SESSION['user_firstname'] . " " . $_SESSION['user_lastname'];
    $currentDate = date("Y-m-d");

    foreach ($programs->year_application($_POST['schoolyear']) as $yearapp) {
        if($sem == 1){
            $semstart = date("Y-m-d", strtotime($yearapp['1st_sem_start']));
            $semend = date("Y-m-d", strtotime($yearapp['1st_sem_end']));
            if($yearapp['1st_sem_start'] != null){

                if(strtotime($currentDate) >= strtotime($semstart) && strtotime($currentDate) <= strtotime($semend)){
                    $semtocheck = false;
                }
                else {
                    $semtocheck = true;
                }
            }
            else {
                $semtocheck = ($yearapp['1st_sem'] == 0) ? true : false;
            }
            
        } elseif($sem == 2) {
            $semstart = date("Y-m-d", strtotime($yearapp['2nd_sem_start']));
            $semend = date("Y-m-d", strtotime($yearapp['2nd_sem_end']));
            if($yearapp['2nd_sem_start'] != null){
                if(strtotime($currentDate) >= strtotime($semstart) && strtotime($currentDate) <= strtotime($semend)){
                    $semtocheck = false;
                }
                else {
                    $semtocheck = true;
                }
            }
            else {
                $semtocheck = ($yearapp['2nd_sem'] == 0) ? true : false;
            }
        }


        if($semtocheck){
            ?>
            <script>
                window.alert('Application is closed for this semester!');
                window.location.href='application-new.php';
            </script>
            <?php
        } else {
            $applicant->addApplicant($_SESSION['user_id'], $fullname, $_SESSION['user_email'], $_SESSION['curriculum'], $sem, $yearlevel, $section, $sy, 0, "Incomplete", '', $_POST['adviser'], "Pending");
        }
    }
}
 
if(isset($_POST['secondStepSubmit'])) {
    // 1. CALCULATE FOR GPA
    // Code to calculate for GPA
    // Formula I used: (SUM OF GRADES) / (NUMBER OF GRADES)
    // If wrong, adjust accordingly
    $_sem = null;
    $_sy = null;

    if(isset($_POST['_sem'])) {
        $_sem = $_POST['_sem'];
    }
    if(isset($_POST['_sy'])) {
        $_sem = $_POST['_sy'];
    }
    
    $initialGrade = 0;
    $count = 0;

    foreach($_POST['grade'] as $grade){
        $initialGrade += floatval($grade);
        $count++;
    }

    $average = $initialGrade / $count;
    // End of Code

    // 2. UPDATE CURRENT APPLICANT
    // File Handling
    $doc_type = "Document";
    $fileName = $_FILES['formFile']['name'];
    $fileTmpName = $_FILES['formFile']['tmp_name'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('pdf', 'jpeg', 'jpg', 'png'); // Allowed File Types. 

    if(in_array($fileActualExt, $allowed)){

        $fileNameNew = $fileName;
        $filesDestination = 'documents/'.$fileNameNew;

        if($applicant->updateApplicant($_SESSION['tableid'], $average, "Pending", $fileNameNew)){
            move_uploaded_file($fileTmpName, $filesDestination);
        }
    }
    else {
        ?>
            <script>
                alert("File Format is Not Acceptable!");
                window.location.href="application-new.php";
            </script>
        <?php
    }

    // 3. ADD TO DATABASE THE GRADES PER SUBJECT
    $grades = $_POST['grade'];
    $subjectIDs = $_POST['subjectId'];

    foreach($subjectIDs as $key => $n ) {
        if (!($applicant->ChecKIfExist_GradePerSubject($_SESSION['tableid'], $n))){
            $applicant->recordGradesPerSubject($_SESSION['tableid'], $n, $grades[$key]);
        }
    }

    // FINISH APPLICATION!!!
	/*
    // 1. Insert data to tlb_applicant
	// 1.1 CREATE A FUNCTION THAT WILL INSERT DATA TO tlb_applicant
	$subject -> user_id = $_SESSION['user_id'];
    
	$result = $subject -> addApplicant();
	// 1.2 Get applicant_id WHERE userid corresponds sa sino nag login
	// 1.3
	// 2. Insert data to tbl_list_grades
	// 2.1 CRREATE A FUMNCTION THAT WILL INSERT DATA TO tbl_list_grades
	$applicantInfo = $subject -> getApplicatInfo();
	$subject -> applicant_id = $applicantInfo['applicant_id'];
	$subject -> subject_id = $_POST['subjectId'];
	$subject -> grade = $_POST['grade'];

    // print_r($subject);

	$result = $subject -> addGrades();
	// 2.1.1 use for loop sa pag insert ng data


	$initial = 0;
	$count = 0;
	foreach($_POST['grade'] as $grade) {
		$initial += floatval($grade);
		$count += 1;
	}

	$average = $initial / $count;
    $subject->average = $average;

	// FETCH GRADES IN DATABASE
	$finalSubjects = $subject -> getGrades();

    $initial = 0;

    foreach($subject -> grade as $grade) {
        $initial += $grade;
    }
    
    $gradeInAverage = $initial / sizeof($subject -> grade);
    
    $string = floatval($gradeInAverage);
    // Use the number_format function to format the string
    $gradeInAverage = number_format($string, 2, '.', '');
    
    $name = $_SESSION['user_firstname'] . " " . $_SESSION['user_lastname'];
    $email = $_SESSION['logged-in'];
    $user_id = $_SESSION['user_id'];
    $curriculum = $_SESSION['curriculum'];
    $schoolyear = $_POST['schoolyear'];
    $year_level = $_POST['yearlevel'];
    $section = $_POST['section'];
    
    
    $addAplicant = "INSERT INTO `dean_applicants`(`id`, `name`, `email`, `school_year`, `curriculum`, `year_level`, `section`, `status`, `user_id`) 
    VALUES (NULL, '$name','$email','$schoolyear','$curriculum','$year_level','$section', 'pending', '$user_id')";
    mysqli_query($conn, $addAplicant);
    
    $updateGPA = "UPDATE dean_applicants SET total_gpa='$average' AND user_id = '1' WHERE name='$name'w ";
    mysqli_query($conn, $updateGPA);*/
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
    <link href="../css/application.css?v=<?php echo time(); ?>" rel="stylesheet">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Application | Dean's List Application System - CCS</title>
    <link rel="icon" href="../img/ccslogo.png" type="image/icon type">
</head>

<body style="overflow-x: hidden">
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
                <a href="../apply/application-new.php" class="active">
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
                <?php echo '<span class="admin-name">'.$_SESSION['user_firstname'].' '.$_SESSION['user_lastname'].'</span>'; ?>
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
                include '../apply/apply-new.php';
            ?>
        </div>
    </section>
</body>
</html>