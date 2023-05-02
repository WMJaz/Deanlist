<?php 

$conn = mysqli_connect('localhost', 'root', '', 'deanslist');

if (isset($_POST["accept"])) {
    $sql = "UPDATE deanslist_applicants SET app_status = 'Accepted', adviser_status = 'Accepted' WHERE id =".$_POST['app_id']."";
    mysqli_query($conn, $sql);

    $sql2 = "INSERT INTO deans_listers (app_id, fullname, gpa, department, yearlevel)
            VALUES (?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql2)) {
        echo "SOMETHING WENT WRONG!";
        return false;
    }

    mysqli_stmt_bind_param($stmt, "sssss", $_POST['app_id'], $_POST['fullname'], $_POST['gpa'], $_POST['department'], $_POST['year_level']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    
} else if (isset($_POST["decline"])) {
    $sql = "UPDATE deanslist_applicants SET app_status = 'Declined', adviser_status = 'Declined' WHERE id =".$_POST['app_id'].";";
    mysqli_query($conn, $sql);
    
}
Header("Location: admin-application.php");


exit();