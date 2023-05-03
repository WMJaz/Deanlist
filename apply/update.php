<?php 

$conn = mysqli_connect('localhost', 'root', '', 'deanslist');

if (isset($_POST["accept"])) {
    $sql = "UPDATE deanslist_applicants SET app_status = 'Accepted', adviser_status = 'Accepted' WHERE id =".$_POST['app_id']."";
    mysqli_query($conn, $sql);
} 
else if (isset($_POST["decline"])) {
    $sql = "UPDATE deanslist_applicants SET app_status = 'Declined', adviser_status = 'Declined' WHERE id =".$_POST['app_id'].";";
    mysqli_query($conn, $sql);
}
//Header("Location: admin-application.php");


exit();