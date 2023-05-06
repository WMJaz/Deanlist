<?php

require_once 'database.php';

class Listers{
    //attributes

    public $id;
    public $App_ID;
    public $Fullname;
    public $firstname;
    public $lastname;
    public $GPA;
    public $department;
    public $year_level;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function GetDashboardData(){
        $sql = "SELECT 
                (SELECT CURRENT_TIMESTAMP) as 'DateAsOf',
                (SELECT COUNT(id) FROM `faculty`)  as 'FacultyCount',
                (SELECT COUNT(id) FROM `deans_listers`) as 'DeanListerCount',
                (SELECT COUNT(user_id) FROM `users` WHERE user_type = 'student') as 'StundentCount',
                (SELECT COUNT(id) FROM `programs`) as 'ProgramCount';";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetch();
            $returnVal = array();
            $returnVal["FacultyCount"] = $data["FacultyCount"];
            $returnVal["DeanListerCount"] = $data["DeanListerCount"];
            $returnVal["StundentCount"] = $data["StundentCount"];
            $returnVal["ProgramCount"] = $data["ProgramCount"];
            $returnVal["AsOf"] = $data["DateAsOf"];
            return $returnVal;
        }        
    }

    //Methods
    function add(){
        $sql = "INSERT INTO deans_listers (app_id,fullname, gpa, department, yearlevel) VALUES
        (:appid, :fullname, :GPA, :department, :year_level);";
        $fullname = $this->firstname . " " . $this->lastname;
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':appid', $this->App_ID);
        $query->bindParam(':fullname', $this->Fullname);
        $query->bindParam(':GPA', $this->GPA);
        $query->bindParam(':department', $this->department);
        $query->bindParam(':year_level', $this->year_level);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function add2(){
        $sql = "INSERT INTO deans_listers (app_id,fullname, gpa, department, yearlevel) VALUES
        (:appid, :fullname, :GPA, :department, :year_level);";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':appid', $this->App_ID);
        $query->bindParam(':fullname', $this->Fullname);
        $query->bindParam(':GPA', $this->GPA);
        $query->bindParam(':department', $this->department);
        $query->bindParam(':year_level', $this->year_level);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function GetTopDeanLister_ByValue(){
        $sql = "SELECT * FROM deans_listers ORDER BY GPA ASC LIMIT 5;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function GetDeanListers_OrderByRank(){
        $sql = "SELECT * FROM deans_listers ORDER BY GPA ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function Approved_Deanlist($record_id){
        $sql = "UPDATE deanslist_applicants SET app_status = 'Accepted', adviser_status = 'Accepted' WHERE id = :ID";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':ID', $record_id);
        
        if($query->execute()){
            return true;
        }
        else {
            return false;
        }
    }

    function Decline_Deanlist($record_id,$feedback){
        $sql = "UPDATE deanslist_applicants SET app_status = 'Declined', adviser_status = 'Declined', feedback = :feed WHERE id = :ID";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':ID', $record_id);
        $query->bindParam(':feed', $feedback);
        if($query->execute()){
            return true;
        }
        else {
            return false;
        }
    }

    function ReApply($record_id){
        $sql = "UPDATE deanslist_applicants SET accept_reapplication = 1 
                WHERE user_id = :ID AND (app_status != 'Pending')";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':ID', $record_id);
        if($query->execute()){
            return true;
        }
        else {
            return false;
        }
    }
    
    function CancelPending($record_id){
        $sql = "DELETE FROM deanslist_applicants WHERE user_id = :ID AND (app_status = 'Pending')";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':ID', $record_id);
        if($query->execute()){
            return true;
        }
        else {
            return false;
        }
    }
    
    function show(){
        $sql = "SELECT * FROM deans_listers ORDER BY GPA ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function GetAllDeanlistApplicants(){
        $sql = "SELECT * FROM deanslist_applicants;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function GetAllDeanlistApplicants_ExeptDupicate(){
        $sql = "SELECT * FROM deanslist_applicants WHERE (app_status = 'Accepted' AND adviser_status = 'Accepted') AND id not in (SELECT app_id from deans_listers);";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function deleteDeansLister($record_id){
        $sql = "DELETE FROM deans_listers WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function delete($record_id){
        $sql = "DELETE FROM listers WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function editDeanLister(){
        $sql = "UPDATE `deans_listers` SET `fullname`=:name,`gpa`=:gpa,`department`=:dept,`yearlevel`=:yr WHERE `id`= :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':name', $this->Fullname);
        $query->bindParam(':gpa', $this->GPA);
        $query->bindParam(':dept', $this->department);
        $query->bindParam(':yr', $this->year_level);
        $query->bindParam(':id', $this->id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE listers SET firstname=:firstname, lastname=:lastname, GPA=:GPA, department=:department, year_level=:year_level WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':GPA', $this->GPA);
        $query->bindParam(':department', $this->department);
        $query->bindParam(':year_level', $this->year_level);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function GetCertainDeanLister($record_id){
        $sql = "SELECT * FROM `deans_listers` WHERE id = :id";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
            if (count($data) > 0) {
                $this->id = $data["id"];
                $this->App_ID = $data["app_id"];
                $this->Fullname = $data["fullname"];
                $this->GPA = $data["gpa"];
                $this->department = $data["department"];
                $this->year_level = $data["yearlevel"];
            }
        }
    }

    function GetCertainDeanListApplicant($record_id){
        $sql = "SELECT *, DATE_FORMAT(a.created_at, '%b, %d %Y') as 'filedate', a.id as 'tmp_appid'  FROM `deanslist_applicants` as a 
                JOIN course_schoolyear as b on b.id = a.school_year_id
                JOIN faculty as c on c.id = a.adviser_id
                WHERE a.id = :id";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
            if (count($data) > 0) {
                return $data;
            }
        }
    }

    function fetch($record_id){
        $sql = "SELECT * FROM listers WHERE id = :id; ";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function GetAllListerGrades($record_id){
        $sql = "SELECT * FROM `applicants_grades` AS a JOIN sy_subjects as b on b.id = a.subject_id WHERE applicant_id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function addApplicant($userid, $fullname, $email, $curriculum, $sem, $yearlevel, $section, $schoolyear, $gpa, $status, $filename, $adviserid, $adviserstatus){

        $conn = mysqli_connect('localhost', 'root', '', 'deanslist');
        $sql = "INSERT INTO deanslist_applicants (user_id, user_name, email, curriculum, semester, year_level, section, school_year_id, gpa, app_status, app_file, adviser_id, adviser_status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SOMETHING WENT WRONG!";
            return false;
        }

        mysqli_stmt_bind_param($stmt, "sssssssssssss", $userid, $fullname, $email, $curriculum, $sem, $yearlevel, $section, $schoolyear, $gpa, $status, $filename, $adviserid, $adviserstatus);
        mysqli_stmt_execute($stmt);
        $lastID = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);

        $_SESSION['tableid'] = $lastID;
        return true;
    }

    function updateApplicant($id, $gpa, $appstatus, $fileName){
        $sql = "UPDATE deanslist_applicants SET gpa=:gpa, app_status=:appstatus, app_file=:appfilename WHERE  (app_status= 'Incomplete' AND id = :appid);";
        $query=$this->db->connect()->prepare($sql);
        $finalGPA = round($gpa, 4);
        $query->bindParam(':appid', $id);
        $query->bindParam(':gpa', $finalGPA);
        $query->bindParam(':appstatus', $appstatus);
        $query->bindParam(':appfilename', $fileName);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    
    function updateGradesPerSubject($app_id, $subject_id, $grade){
        $sql = "UPDATE applicants_grades SET grade= :subgrade WHERE (applicant_id = :appid AND subject_id = :subjectid);";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':appid', $app_id);
        $query->bindParam(':subjectid', $subject_id);
        $query->bindParam(':subgrade', $grade);
        if($query->execute())
            return true;
        else
            return false;
    }

    function updateApplicantGPA($id, $gpa){
        $sql = "UPDATE `deanslist_applicants` SET gpa = :gpa WHERE id = :appid";
        $query=$this->db->connect()->prepare($sql);
        $finalGPA = round($gpa, 4);
        $query->bindParam(':appid', $id);
        $query->bindParam(':gpa', $finalGPA);
        if($query->execute())
            return true;
        else
            return false;
    }

    function recordGradesPerSubject($app_id, $subject_id, $grade){
        $sql = "INSERT INTO applicants_grades (applicant_id, subject_id, grade) VALUES (:appid, :subjectid, :subgrade)";
        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':appid', $app_id);
        $query->bindParam(':subjectid', $subject_id);
        $query->bindParam(':subgrade', $grade);

        return $query->execute();
    }

    function get_submitted_grades($app_id){
        $conn = mysqli_connect('localhost', 'root', '', 'deanslist');
        $sql = "SELECT * FROM grades_list WHERE applicant_id = ?";
        
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../apply/admin-application.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $app_id);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);                                                                
    }
}

?>