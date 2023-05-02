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
                $ID = $_POST["ID"];
           default:
               echo 0;            
       }
    }
?>