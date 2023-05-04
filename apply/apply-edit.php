<!DOCTYPE html>
<html>
<head>
    <title>Application | Dean's List Application System</title>
    <link rel="icon" href="../img/ccslogo.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <?php if (!isset($_POST['secondStepSubmit'])) { ?>
        <link rel="stylesheet" type="text/css" href="../css/calculator.style.css?v=<?php echo time(); ?>"> <?php } ?>
    <link rel="stylesheet" type="text/css" href="../css/apply.css?v=<?php echo time(); ?>">
    <script src="apply.js" defer></script>
</head>
<body>
    <br>
    <br>
    <div class="root d-flex flex-column align-items-center justify-content-center">

        <?php
        include_once '../class/program.class.php';
        $applicantID = 0;
        $programs = new Program();

        $existing = false;
        $withPending = false;

        $userid = $_SESSION['user_id'];

        $conn = mysqli_connect('localhost', 'root', '', 'deanslist');
        $sql = "SELECT * FROM deanslist_applicants WHERE (app_status = 'Pending' OR app_status = 'Accepted' OR app_status = 'Declined') AND (accept_reapplication = 0) AND user_id = '$userid'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $existing = true;
        }

        $sqlReApply = "SELECT * FROM `deanslist_applicants` WHERE (app_status = 'Pending' AND  user_id = $userid);";
        $resultReApply = mysqli_query($conn, $sqlReApply);
        if (mysqli_num_rows($resultReApply) > 0) {
            $withPending = true;
        }
        ?>
        <div class="card" style="overflow: hidden;">
            <div class="card-body">
                <!-- Progress Bar -->
                <div class="mainContent">
                    <div class="text-header w-100 text-center" style="margin-top: 2%">
                        <h6 style="font-weight: bold">Edit Application Grades</h6>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex flex-row justify-content-between" style="width: 95%">
                            <h6 class="fs-5" style="margin-left:40px; font-weight: bold; font-size: 100px">NAME: <span class="ms-3 fw-light "><?php echo '<span class="admin-name" style="font-weight: bold; font-size: 16px !important">' . $_SESSION['user_firstname'] . ' ' . $_SESSION['user_lastname'] . '</span>'; ?></h6>
                            <h6 class="fs-5" style="margin-left:10px; font-weight: bold; font-size: 100px">COURSE: <span class="ms-3 fw-light "><?php echo '<span class="admin-name" style="font-weight: bold; font-size: 16px !important">' . $_SESSION['curriculum'] . '</span>'; ?></h6>
                        </div>
                        <div class="col-12 d-flex flex-row justify-content-between" style="width: 95%">
                            <h6 class="fs-5" style="margin-left:40px; font-weight: bold; font-size: 100px">Email: <span class="ms-3 fw-light "><?php echo '<span class="admin-name" style="font-weight: bold; font-size: 16px !important">' . $_SESSION['user_email'] . '</span>'; ?></h6>
                        </div>
                    </div>
                    <!-- Application UI -->
                    <form action="application-edit.php?id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data" class="firstStepForm d-flex flex-column align-items-center">
                        <div class="table-div d-flex flex-column align-items-center">
                            <div class="table-header text-center mb-2">
                                <h6>List of Grades</h6>
                            </div>
                            <div class="table-body" style="overflow:scroll">
                                <?php foreach ($listOfSubject as $subject) { ?>
                                    <div class="table-row d-flex flex-row">
                                        <div class="subject-name-div d-flex flex-row">
                                            <h6><?php echo $subject['subject_name'] ?></h6>
                                        </div>
                                        <div class="lecture-units-div d-flex flex-row">
                                            <h6>Units: <?php echo $subject['lec_units'] + $subject['lab_units'] ?></h6>
                                        </div>
                                        <div class="grade-input-div d-flex flex-row">
                                            <h6>Grade: </h6>
                                            <input type="number" min="1" max="3.0" step=".25" name="grade[]" class="grade form-control" required value="<?php echo $subject['grade'] ?>">
                                            <input type="hidden" name="subjectId[]" value="<?php echo $subject['id'] ?>">
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <!-- Add more rows as needed -->
                            </div>
                            <p style="margin-left: 525px" class="totalGrade"><?php echo isset($average) ? $average : "GPA:" ?></p>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        <input type="submit" class="btn rounded text-light" name="calculate" value="calculate" style="background-color:#107869; margin-left: 500px">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-container d-flex flex-row justify-content-between">
                                <a href="application-new.php"><button type="button" name="backBtn" class="btn btn-secondary backBtn">Cancel</button></a>
                                <button type="submit" class="btn btn-success nxtBtn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script >
    $(function($) {
        $("#edit-grades").click(function(){ 
            var index = $(this).closest("form").find("input[name='app_id']").val();
            GetStudentGrades(index);
        });        
    });
</script>
</html>