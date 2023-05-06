<?php

require_once 'database.php';

Class Program{
    //attributes

    public $id;
    public $code;
    public $old_code;
    public $description;
    public $years;
    public $level;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO programs (code, description, years, level) VALUES 
        (:code, :description, :years, :level);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':code', $this->code);
        $query->bindParam(':years', $this->years);
        $query->bindParam(':level', $this->level);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function addCourse(){
        $sql = "INSERT INTO `course`(`course_name`,`course_fullname`) VALUES (:cname,:cfname);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':cname', $this->code);
        $query->bindParam(':cfname', $this->description);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE programs SET code=:code, description=:description, years=:years, level=:level WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':code', $this->code);
        $query->bindParam(':years', $this->years);
        $query->bindParam(':level', $this->level);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM programs WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function GetAllCourse(){
        $sql = "SELECT * FROM `course`;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM programs WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show(){
        $sql = "SELECT * FROM programs ORDER BY id ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function showAdvisers(){
        $sql = "SELECT * FROM faculty";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function showSchoolYears($course){
        $sql = "SELECT course_schoolyear.id, course_name, course_schoolyear.school_year FROM course INNER JOIN course_schoolyear ON course.id = course_schoolyear.course_id WHERE course_name = :course ORDER BY course_schoolyear.school_year DESC;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':course', $course);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function showSubjects($coursename, $coursesy, $sem, $yearlevel){
        $sql = "SELECT sy_subjects.*, course.course_name, course_schoolyear.school_year FROM sy_subjects INNER JOIN course ON course.id=sy_subjects.course_id INNER JOIN course_schoolyear ON course_schoolyear.id=sy_subjects.sy_id WHERE course.course_name=:coursename AND course_schoolyear.school_year = :coursesy AND sem=:sem AND year_level=:yearlevel;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':coursename', $coursename);
        $query->bindParam(':coursesy', $coursesy);
        $query->bindParam(':sem', $sem);
        $query->bindParam(':yearlevel', $yearlevel);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function getCourseID($courseName){
        $sql = "SELECT * FROM course WHERE course_name=:coursename";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':coursename', $courseName);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function addCurriculum($schoolyear, $courseid){
        $conn = mysqli_connect('localhost', 'root', '', 'deanslist');
        $sql = "INSERT INTO course_schoolyear (school_year, course_id)
                VALUES (?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SOMETHING WENT WRONG!";
            return false;
        }

        mysqli_stmt_bind_param($stmt, "ss", $schoolyear, $courseid);
        mysqli_stmt_execute($stmt);
        $lastID = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);

        return $lastID;
    }

    function addYearApplicationTime($syid){
        $sql = "INSERT INTO sy_application_time (sy_id) VALUES (:syid);";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':syid', $syid);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function addSubjects($subjCode, $subjName, $lecunits, $labunits, $sem, $courseid, $yearlevel, $syid){
        $sql = "INSERT INTO sy_subjects (subject_code, subject_name, lec_units, lab_units, sem, course_id, year_level, sy_id) 
        VALUES (:subcode, :subname, :lecunits, :labunits, :semester, :courseid, :yearlevel, :syid)";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':subcode', $subjCode);
        $query->bindParam(':subname', $subjName);
        $query->bindParam(':lecunits', $lecunits);
        $query->bindParam(':labunits', $labunits);
        $query->bindParam(':semester', $sem);
        $query->bindParam(':courseid', $courseid);
        $query->bindParam(':yearlevel', $yearlevel);
        $query->bindParam(':syid', $syid);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function year_application($yearid){
        $sql = "SELECT * FROM sy_application_time WHERE sy_id = :yearid";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':yearid', $yearid);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function deleteCurriculum($syid){
        $sql = "DELETE FROM course_schoolyear WHERE id = :sy_id";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':sy_id', $syid);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function editCurriculum($syid, $schoolyear){
        $sql = "UPDATE course_schoolyear SET school_year = :schoolyear WHERE id = :syid";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':syid', $syid);
        $query->bindParam(':schoolyear', $schoolyear);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function deleteUpdate($sem, $year, $syid){
        $sql = "DELETE FROM sy_subjects WHERE sem = :sem AND year_level = :yearlevel AND sy_id = :syid";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':sem', $sem);
        $query->bindParam(':yearlevel', $year);
        $query->bindParam(':syid', $syid);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function getAppTime($syid){
        $sql = "SELECT * FROM sy_application_time WHERE sy_id = :syid";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':syid', $syid);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function updateAppStatus($syid, $firstSem, $secondSem, $firstStartDate, $firstEndDate, $secondStartDate, $secondEndDate){
        $sql = "UPDATE sy_application_time SET 1st_sem = :firstsem, 2nd_sem = :secondsem, 1st_sem_start = :f_start, 1st_sem_end = :f_end, 2nd_sem_start = :s_start, 2nd_sem_end = :s_end WHERE sy_id = :syid;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstsem', $firstSem);
        $query->bindParam(':secondsem', $secondSem);
        $query->bindParam(':f_start', $firstStartDate);
        $query->bindParam(':f_end', $firstEndDate);
        $query->bindParam(':s_start', $secondStartDate);
        $query->bindParam(':s_end', $secondEndDate);
        $query->bindParam(':syid', $syid);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}

?>