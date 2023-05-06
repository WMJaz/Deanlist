<?php
  require_once '../functions/functions.php';
  require_once '../class/listers.class.php';
  $studName = "N/a";
  $adviser = "N/a";
  $fileDate = "N/a";
  $schoolYR = "N/a";
  $schoolSem = "N/a";
  $yearLVL = "N/a";
  $gpa = "N/a";
  $curiculum = "N/a";
  $section = "N/a";
  $totalUnits = 0;

  if(isset($_GET['id'])){
    $listers = new Listers();
    $ID = $_GET['id'];
    $listerProfile = $listers->GetCertainDeanListApplicant($ID);
    $grades = $listers->GetAllListerGrades($ID);
    
    $studName = $listerProfile["user_name"];
    $adviser =  $listerProfile["firstname"].", ". $listerProfile["lastname"];
    $fileDate = $listerProfile["filedate"];
    $schoolYR = $listerProfile["school_year"];
    $schoolSem = $listerProfile["semester"];
    $yearLVL = $listerProfile["year_level"];
    $gpa = $listerProfile["gpa"];
    $curiculum = $listerProfile["curriculum"];
    $section = $listerProfile["section"];
  }
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Application Form</title>
  <link rel="icon" href="../img/ccslogo.png" type="image/icon type">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

  <div class="container" >
    <div class="container" id="pdfbody">
      <!-- Header -->
      <div class="header">
        <div class="container">
          <div class="row">

            <div class="col-3">
              <img src="assets/wmsu logo.JPG" alt="" class="img-fluid w-50 float-end">
            </div>

            <div class="col-6">
              <div class="text-center">
                <small>
                  Republic of the Philippines <br>
                  Western Mindanao State University <br>
                  <strong> COLLEGE OF COMPUTING STUDIES</strong> <br>
                  Department of Computer Science <br>
                  Zamboanga City
                </small>
              </div>
            </div>

            <div class="col-3">
              <img src="assets/ccs logo.jpg" alt="" class=" img-fluid  w-50 float-start">
            </div>

            <div class="col-4 mt-2">
              <div class="text-center">
                <small>
                  FOR: <strong>RODERICK P. GO, PhD </strong>
                </small>
                <br>
                <small>OIC-DEAN, CCS</small>
              </div>
            </div>

            <div class="col-8">

            </div>

          </div>
        </div>

      </div>
      <!-- Header -->

      <!-- greeting-remarks -->
      <div class="greeting-remarks">

        <div class="row">
          <div class="col-12">
            <small><strong>Sir:</strong></small>

            <br>

            <p>
              <small class="text-center">
                I have the honor to apply for the inclusion in the Dean’s List for the (✓) 1st ( ) 2nd semester, <br>
                school year 2022-2023, based on my academic ratings for the given period, to wit:
              </small>
            </p>

          </div>
        </div>
      </div>
      <!-- greeting-remarks -->


      <!-- table -->
      <div class="container">
        <div class="col-12">
          <table class="table table-sm table-bordered">
            <thead>
              <tr class="text-center">
                <th scope="col"> <small>SUBJECT ENROLLED</small> </th>
                <th scope="col"> <small>UNITS</small> </th>
                <th scope="col"> <small>RATINGS</small> </th>
                <th scope="col"><small> INSTRUCTORS</small></th>
              </tr>
            </thead>
            <tbody>
              <?php
                   
                    for ($x = 0; $x <= count($grades) - 1; $x++) {
                      $totalUnits += ($grades[$x]['lec_units'] + $grades[$x]['lab_units']) ;
                      echo '<tr>
                              <td>'. $grades[$x]['subject_name'] .'</td>
                              <td>'. ($grades[$x]['lec_units'] + $grades[$x]['lab_units']) .'</td>
                              <td>'. $grades[$x]['grade'] .'</td>
                              <td><textarea style="width:100%; margin:0;border:none;" rows="1"></textarea></td>
                            </tr>';
                    }
                      
              ?>
            
              <tr>
                <td>
                  <small><strong>TOTAL UNITS</strong></small>
                </td>
                <td><?php echo $totalUnits;?> </td>
                <td>
                  <small><strong>GENERAL POINT AVERAGE</strong>: <?php echo $gpa ;?> </small>
                </td>
                <td> </td>
              </tr>

            </tbody>
          </table>

          <!-- <div class="col-8">
            <table class="table table-bordered">
              <tr class="text-center">
                <td>
                  <small><strong>TOTAL UNITS</strong></small>
                </td>
                <td> </td>
                <td>
                  <small><strong>GENERAL POINT AVERAGE</strong></small>
                </td>
                <td> </td>
              </tr>
            </table>
          </div> -->

        </div>

      </div>
      <!-- table -->

      <!-- Student Signature Section -->
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="float-end text-center">
              <small><strong><u><?php echo $studName; ?></u></strong></small>
              <br>
              <small>Student’s Signature over Printed Name</small>
              <br>
              <small>Course/Year/Section: <strong><u><?php echo $curiculum."/".$schoolYR."/"."SECTION ".$section; ?></u></strong></small>
            </div>

          </div>
        </div>

      </div>
      <!-- Student Signature Section -->

      <!-- Adviser Section -->
      <div class="container">
        <div class="row">
          <div class="col-12">

            <div class="float-start">
              <small>Verified by:</small>
              <nbsp></nbsp>
              <div class="text-center">
                <small>
                  <strong>
                    <u><?php echo $adviser;?></u>
                  </strong>
                  <br>
                  Adviser
                </small>
              </div>

            </div>

          </div>
        </div>
      </div>
      <!-- Adviser Section -->

      <hr>
      <!-- Verification Section -->
      <div class="container">
        <div class="row">

          <div class="col-12">
            <small class="float-start">
              <strong>RODERICK P. GO, PhD</strong>
              <br>
              OIC-DEAN, CSS
            </small>

            <small class="float-end">
              Date: <strong><u><?php echo $fileDate; ?></u></strong>
            </small>
          </div>

          <div class="container mt-1">

            <small>
              Sir:
              <br>
              Upon verification by the committee, Mr./Ms. <?php  echo "<u>". $studName."</u>";?> has been found to posses the qualification,
              and none of the disqualifications, for the inclusion in the College’s Dean’s List for the period
              indicated.
            </small>

            <br>

            Therefore, we hereby recommend for approval of his/her application as Dean’s Lister.

            <div class="row m-0 text-center">

              <div class="col-6 mt-2">
                <small>
                  <strong>LUCY FELIX-SADIWA, MSCS</strong>
                  <br>
                  Member/Computer Science Department Head
                </small>
              </div>

              <div class="col-6 mt-2">
                <small>
                  <strong>GADMAR M. BELAMIDE, MEnggEd</strong>
                  <br>
                  Member/College Secretary
                </small>

              </div>

              <div class="col-6 mt-2">
                <small>
                  <strong>MARJORIE A. ROJAS</strong>
                  <br>
                  Member/Student Affairs Coordinator
                </small>

              </div>

              <div class="col-6 mt-2">
                <small>
                  <strong>JOHN ED AUGUSTUS A. ESCORIAL, MIT</strong>
                  <br>
                  Member/Information Technology Department Head
                </small>
              </div>

              <div class="col-12 mt-2 text-center">
                <small>
                  <strong>ODON A. MARAVILLAS JR, MSCS
                  </strong>
                  <br>
                  Chairperson/Associate Dean
                </small>
              </div>

            </div>

          </div>

        </div>
      </div>
      <!-- Verification Section -->
      <hr>

      <!-- Footer Section -->
      <div class="container">
        <div class="row">
          <div class="col-12">
            <small class="float-end">
              Date: <strong><u><?php echo $fileDate; ?></u></strong>
            </small>
          </div>
          <div class="col-12">
            <small>
              Upon the recommendation of the Committee, Mr./Ms. <?php  echo "<u>". $studName."</u>";?>  is hereby admitted for the
              inclusion in the <br>
              Dean’s List for the academic period herein stated.
              <br>
            </small>
          </div>

          <div class="col-12">
            <small class="float-end">
              <div class="text-center">
                <small>
                  FOR: <strong>RODERICK P. GO, PhD </strong>
                </small>
                <br>
                <small>OIC-DEAN, CCS</small>
              </div>
            </small>
          </div>
        </div>
      </div>
      <!-- Footer Section -->
    </div>

            
    <button type="button" id="printButton" onclick="download()">Download</button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
      window.jsPDF = window.jspdf.jsPDF;
      var docPDF = new jsPDF();
      function download(){
        var elementHTML = document.querySelector("#pdfbody");
        docPDF.html(elementHTML, {
          callback: function(docPDF) {
            docPDF.save('Application Form.pdf');
          },
          x: 15,
          y: 15,
          width: 170,
          windowWidth: 650
          });
      }
          
    </script>
</body>

</html>