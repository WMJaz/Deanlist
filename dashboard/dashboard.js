function GetDashboardData(){
	$.ajax({
        type: 'POST',
        url: '../class/control.php',
        dataType: "json",
        data: {"call": "Get_DashboardData"},
        success: function(result){
          var dashboardData = result;
          var summaryDT = dashboardData["Summary_Data"];
          var patListDT = dashboardData["Student_List"];
          $("#dashboard_student_count").text("");
          $("#dashboard_faculty_count").text("");
          $("#dashboard_program_count").text("");
          $("#dashboard_deanlister_count").text("");
          $("span[name='dashboard_asof']").text("");
          if (summaryDT != 0){
            $("#dashboard_student_count").text(summaryDT["Student_Lister"]);
            $("#dashboard_faculty_count").text(summaryDT["Faculty"]);
            $("#dashboard_program_count").text(summaryDT["Program"]);
            $("#dashboard_deanlister_count").text(summaryDT["Dean_Lister"]);
            $("span[name='dashboard_asof']").text(summaryDT["AsOf"]);
          }

          //patListDT values ([Student_Name],[GPA],[Department],[Year_Level])
          //patListDT["Student_Name"];
          //patListDT["GPA"];
          //patListDT["Department"];
          //patListDT["Year_Level"];
          
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
        }
    });
}

$(function($) {
  GetDashboardData();
  setInterval(GetDashboardData, 10000);
});
