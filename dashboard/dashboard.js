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
          $("#top-student").empty();
          var ctr = patListDT.length
          if (ctr > 3){
            ctr = 3
          }
          var tmpGPA = 0
          for (var i = 0; i < ctr; i++) {
            var view = "";
            if (tmpGPA == patListDT[i]["GPA"]){
              ctr+=1;
            }
            view = '<div class="box card text-center m-4 col-3">'+
                        '<div class="row mt-3">'+
                            '<div class="col-3">'+
                                //'<small class="text"><b>TOP ' +(i+1)+'</b></small>'+ 
                                '<i class="bx bxs-medal"></i>'+
                            '</div>'+
                            '<div class="col-4">'+
                              '<span><b>' + patListDT[i]["Student_Name"]+'</b></span>'+
                            '</div>'+
                            '<div class="col-5">'+
                                '<span>'+
                                   "GPA"+
                                '</span>'+
                                '<p>'+
                                   "<b>" + patListDT[i]["GPA"]+"</b>"
                                '</p>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
            $("#top-student").append(view);
            tmpGPA == patListDT[i]["GPA"]
          }
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
