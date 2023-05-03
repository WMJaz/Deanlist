<?php
    session_start();
    if(isset($_POST['call'])){
        switch ($_POST['call']) {
            case "Get_DashboardData":
                include_once 'listers.class.php';
                $lister = new Listers;
                $data1 = $lister->GetDashboardData();
                $data2 = $lister->GetTopDeanLister_ByValue();
                $summdata = array();
                $summdata["Faculty"] = $data1["FacultyCount"];
                $summdata["Dean_Lister"] = $data1["DeanListerCount"];
                $summdata["Student_Lister"] = $data1["StundentCount"];
                $summdata["Program"] = $data1["ProgramCount"];
                $summdata["AsOf"] = $data1["AsOf"];
                $listdata = array();
                $ctrListData = 0;
                foreach ($data2 as $row) {
                    $listdata[$ctrListData]["Student_Name"] = $row["fullname"];
                    $listdata[$ctrListData]["GPA"] = $row["gpa"];
                    $listdata[$ctrListData]["Department"] = $row["department"];
                    $listdata[$ctrListData]["Year_Level"] = $row["yearlevel"];
                    $ctrListData++;
                }
                $returnData = array();
                $returnData["Summary_Data"] = $summdata;
                $returnData["Student_List"] = $listdata;
                echo json_encode($returnData);
               break;
            case "GetCertainStudentGrades":
                include_once 'subject.class.php';
                $subject = new subject;
                $ID = $_POST["ID"];
                $data = $subject->GetCertainStudentGrade($ID);
                $returnval = array();
                $ctrListData = 0;
                foreach ($data as $row) {
                    $returnval[$ctrListData]["ID"] = $row["tmpID"];
                    $returnval[$ctrListData]["Subject_Code"] = $row["subject_code"];
                    $returnval[$ctrListData]["Subject_Name"] = $row["subject_name"];
                    $returnval[$ctrListData]["Grades"] = $row["grade"];
                    $returnval[$ctrListData]["GPA"] = $row["gpa"];
                    $returnval[$ctrListData]["Img_File"] = $row["app_file"];
                    $ctrListData++;
                }
                echo json_encode($returnval);
                break;
            case "ApproveDeanlist":
                include_once 'listers.class.php';
                $lister = new Listers;
                $ID = $_POST["ID"];
                if($lister->Approved_Deanlist($ID))
                    echo 1;
                else
                    echo 0;
                break;
            case "DeclineDeanlist":
                include_once 'listers.class.php';
                $lister = new Listers;
                $ID = $_POST["ID"];
                $Feedback = $_POST["Feedback"];
                if($lister->Decline_Deanlist($ID,$Feedback))
                    echo 1;
                else
                    echo 0;
                break;
           default:
               echo 0;            
       }
    }
?>