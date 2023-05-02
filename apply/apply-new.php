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
        $userid = $_SESSION['user_id'];


        $conn = mysqli_connect('localhost', 'root', '', 'deanslist');
        $sql = "SELECT * FROM deanslist_applicants WHERE user_id = '$userid' AND (app_status = 'Pending' OR app_status = 'Accepted' OR app_status = 'Declined')";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $existing = true;
        }
        ?>
        <div class="card" style="overflow: hidden;">
            <div class="card-body">
                <!-- Progress Bar -->
                <div class="stepper-wrapper">
                    <div class="stepper-item <?php if (isset($_POST['secondStepSubmit']) || $existing)
                                                    echo "completed";
                                                else
                                                        if (!isset($_POST['firstStepSubmit']))
                                                    echo "active";
                                                else
                                                    echo "completed" ?>">
                        <div class="step-counter">1</div>
                        <div class="step-name">Student Info</div>
                    </div>
                    <div class="stepper-item <?php if (isset($_POST['secondStepSubmit']) || $existing)
                                                        echo "completed";
                                                    else
                                                            if (isset($_POST['firstStepSubmit']))
                                                        echo "active";
                                                    else
                                                        echo "" ?>">
                        <div class="step-counter">2</div>
                        <div class="step-name">Application</div>
                    </div>
                    <div class="stepper-item <?php echo isset($_POST['secondStepSubmit']) || $existing ? "active" : "" ?>">
                        <div class="step-counter">3</div>
                        <div class="step-name">Assessment</div>
                    </div>
                </div>

                <div class="mainContent">
                    <div class="text-header w-100 text-center" style="margin-top: 2%">
                        <h6 style="font-weight: bold">APPLICATION FOR DEAN LIST</h6>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex flex-row justify-content-between" style="width: 95%">
                            <h6 class="fs-5" style="margin-left:40px; font-weight: bold; font-size: 100px">NAME: <span class="ms-3 fw-light "><?php echo '<span class="admin-name" style="font-weight: bold; font-size: 16px !important">' . $_SESSION['user_firstname'] . ' ' . $_SESSION['user_lastname'] . '</span>'; ?></h6>
                            <h6 class="fs-5" style="margin-left:10px; font-weight: bold; font-size: 100px">COURSE: <span class="ms-3 fw-light "><?php echo '<span class="admin-name" style="font-weight: bold; font-size: 16px !important">' . $_SESSION['curriculum'] . '</span>'; ?></h6>
                        </div>
                    </div>



                    <form action="application-new.php" method="post" enctype="multipart/form-data" class="firstStepForm d-flex flex-column align-items-center">
                        <!-- Logic is:
                                Checks first if user has clicked the "Submit" button on the Application UI.
                                If user has already clicked that button then display Assessment UI.

                                If user have not clicked the "Submit" button then proceed to the first step: Student Info UI
                                on the Student Info UI, if user clicks the "Next" button,
                                proceeds to the Application UI, where user can input grades.

                                After clicking the "Submit" on Application UI, proceed to the Assessment UI
                        -->

                        <?php
                        /* Check if user has already clicked "Submit" button or has existing application */

                        if (isset($_POST['secondStepSubmit']) || $existing) {
                            $sql = "SELECT * FROM deanslist_applicants WHERE user_id = '$userid' AND (app_status = 'Pending' OR app_status = 'Accepted' OR app_status = 'Declined');";
                            $result = mysqli_query($conn, $sql);

                            // $sql2 = "SELECT * FROM `applicants_grades` AS a JOIN sy_subjects as b on b.id = a.subject_id WHERE applicant_id = :id;";
                            // $resultViewGrades = mysqli_query($conn, $sql2);
                        ?>
                            <!-- Assessment UI -->
                            <div class="third_step">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="table-name">#</th>
                                            <th scope="col">Email</th>
                                            <th scope="col" class="academic-rank">Academic Rank</th>

                                            <th scope="col">Year</th>
                                            <th scope="col">GPA</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <!--  -->
                                    <tbody>
                                        <?php
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $applicantID = $row["id"];
                                        ?>
                                        <tr>
                                            <td><?php echo '<span class="admin-name">' . $row["user_id"] . '</span>'; ?></td>
                                            <td><?php echo '<span class="admin-name">' . $row["email"] . '</span>'; ?></td>
                                            <td><?php echo '<span class="admin-name">Student</span>'; ?></td>
                                            <td><?php echo strtoupper($row["year_level"])  ?></td>
                                            <td>
                                                <p><?php echo $row["gpa"] ?></p>
                                            </td>
                                            <td><mark style="<?php if ($row["app_status"] == 'Accepted') echo "background-color: rgb(181, 247, 57)";
                                                                elseif ($row["app_status"] == 'Declined') echo "background-color: rgb(238, 115, 32)" ?>"><?php echo ucfirst($row["app_status"]) ?></mark></td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                            <?php
                              
                        }  else {
                            ?>

                            <?php
                            /* Check if user have NOT clicked the "Next" button */
                            if (!isset($_POST['firstStepSubmit'])) {
                            ?>
                                <!-- Student Info UI -->
                                <div class="first_step">
                                    <div class="input-container w-100 d-flex flex-wrap justify-content-center">
                                        <div class="form-floating dropdown-select">
                                            <select class="form-select" name="schoolyear" id="schoolyear" required>
                                                <option value="">-- Select --</option>
                                                <?php
                                                foreach ($programs->showSchoolYears($_SESSION['curriculum']) as $schoolyear) {
                                                ?>

                                                <option value="<?php echo $schoolyear['id'] ?>">School Year <?php echo $schoolyear['school_year'] ?></option>
                                                <?php
                                                }
                                                ?>

                                                <!-- <option value="">-- Select --</option>
                                                <option value="School Year 2022-2023">School Year 2022 - 2023</option>
                                                <option value="School Year 2023-2024">School Year 2023 - 2024</option> -->
                                            </select>
                                            <label for="floatingSelect">School Year</label>
                                        </div>

                                        <div class="form-floating dropdown-select">
                                            <select class="form-select" name="semester" id="semester" required>
                                                <option value="">-- Select --</option>
                                                <option value="1">First Semester</option>
                                                <option value="2">Second Semester</option>
                                            </select>
                                            <label for="floatingSelect">Semester</label>
                                        </div>

                                        <?php
                                        $curriculumskie = " ";
                                        if ($_SESSION['curriculum'] == "BSCS") {
                                            $curriculumskie = "cs";
                                            $courseid = 1;
                                        } else {
                                            $curriculumskie = "it";
                                            $courseid = 2;
                                        }


                                        ?>

                                        <input type="hidden" name="curriculum" value="<?php echo $courseid ?>">

                                        <div class="form-floating dropdown-select">
                                            <select class="form-select" name="yearlevel" id="yearlevel" required>
                                                <option value="">-- Select --</option>
                                                <option value="1">First Year</option>
                                                <option value="2">Second Year</option>
                                                <option value="3">Third Year</option>
                                                <option value="4">Fourth Year</option>
                                            </select>
                                            <label for="floatingSelect">Year Level</label>
                                        </div>

                                        <div class="form-floating dropdown-select">
                                            <select class="form-select" name="section" id="section" required>
                                                <option value="">-- Select --</option>
                                                <option value="A">Section A</option>
                                                <option value="B">Section B</option>
                                                <option value="C">Section C</option>
                                            </select>
                                            <label for="floatingSelect">Section</label>
                                        </div>

                                        <div class="form-floating dropdown-select">
                                            <select class="form-select" name="adviser" id="adviser" required>
                                                <option value="">-- Select --</option>
                                                <?php
                                                include_once '../class/program.class.php';
                                                $faculty = new Program;

                                                foreach ($faculty->showAdvisers() as $advisers) {
                                                ?>
                                                    <option value="<?php echo $advisers['id'] ?>"><?php echo $advisers['firstname'] . " " . $advisers['lastname'] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                            <label for="floatingSelect">Adviser</label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                /* Check if user have clicked the "Next" button */
                            } elseif (isset($_POST['firstStepSubmit'])) {
                                // Check for application availability

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

                                    if ($semtocheck) {
                                ?>
                                        <script>
                                            window.alert('Application is closed for this semester!');
                                            window.location.href = 'application-new.php';
                                        </script>
                                    <?php
                                    } else {
                                    ?>
                                        <!-- Application UI -->
                                        <div class="second_step">
                                            <!-- Custom made table for subject list -->
                                            <div class="table-div d-flex flex-column align-items-center">
                                                <div class="table-header d-flex flex-row">
                                                    <h6>Subjects</h6>
                                                </div>

                                                <input type="hidden" name="schoolyear" value="<?php echo $curriculumskie ?>">
                                                <input type="hidden" name="yearlevel" value="<?php echo $curriculumskie ?>">
                                                <input type="hidden" name="section" value="<?php echo $curriculumskie ?>">

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
                                                                <input type="number" min="1" max="3.0" step=".25" name="grade[]" class="grade form-control" required>
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


                                            </div>
                                            <div class="file-input mb-3 d-flex flex-row justify-content-left">
                                                <label for="formFile" class="form-label">Portal Screenshot: </label>
                                                <input class="form-control" type="file" id="formFile" name="formFile" required>
                                            </div>
                                        </div>

                        <?php
                                    }
                                }
                            }
                        }
                        ?>

                        <?php
                        if ($existing) {

                        ?>
                            <div class="submit-container d-flex flex-row justify-content-between">
                                <a href="../dashboard/dashboard.php"><button type="button" name="homeBtn" class="btn btn-success homeBtn">Back to Homepage</button></a>
                                <a href="../PDF Format/pftTemplate.php?id=<?php echo $applicantID; ?>"><button type="button" name="homeBtn" class="btn btn-success homeBtn">Download PDF</button></a>
                          
                            </div> 
                                
                            <?php

                        } else {
                            if (!isset($_POST['secondStepSubmit'])) {
                            ?>
                                <div class="submit-container d-flex flex-row justify-content-between">
                                    <a href="./application-new.php"><button type="button" name="backBtn" class="btn btn-success backBtn">Back</button></a>
                                    <button <?php
                                            /* If on User Info UI, change buttton name to "firstStepSubmit" */
                                            if (!isset($_POST['firstStepSubmit'])) {
                                            ?> type="submit" name="firstStepSubmit" <?php
                                                                                } else {
                                                                                    ?> type="button" data-bs-toggle="modal" data-bs-target="#successModal" <?php
                                                                                                                                                    }
                                                                                                                                                        ?> class="btn btn-success nxtBtn"><?php echo isset($_POST['firstStepSubmit']) ? "Submit" : "Next" ?></button>


                                </div>
                                <br>
                                <br>


                            <?php
                            } else {
                            ?>
                                <div class="submit-container d-flex flex-row justify-content-between">
                                    <a href="../dashboard/dashboard.php"><button type="button" name="homeBtn" class="btn btn-success homeBtn">Back to Homepage</button></a>
                                </div>
                        <?php
                            }
                        }
                        ?>

                        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header d-flex justify-content-center">
                                        <h5 class="modal-title">Success!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h1>You have been qualified for the validation of the application, wait for the verification of your adviser.</h1>
                                        <button type="submit" name="secondStepSubmit" class="btn btn-success closeBtn">Complete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>