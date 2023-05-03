<?php

require_once 'database.php';

Class subject{
    //attributes
    public $subject_id;
    public $subject_name;

    public $sem;
    public $curriculum;
    public $year_level;
    public $schoolyear;
    public $section;

    public $user_id;

    public $applicant_id;
    public $grade;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function GetCertainStudentGrade($record_id){
        $sql = "SELECT *,a.id as 'tmpID'  FROM `applicants_grades` as a 
                    JOIN `sy_subjects` as b on b.id = a.subject_id
                    JOIN `deanslist_applicants` as c on c.id = a.applicant_id
                WHERE a.applicant_id = :ID";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':ID', $record_id);
        if($query->execute()){
            $data = $query->fetchAll();
        }    
        return $data;
    }

    function fetch($record_id){
        $sql = "SELECT * FROM tbl_subject WHERE sem = :sem AND curriculum =
        :curriculum AND year_level = :year_level";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':subject_id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT * FROM tbl_subject ORDER BY subject_id ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }


    function getSubjects() {
        $sql = "SELECT * FROM sy_subjects WHERE sem = :sem AND course_id =
         :courseid AND year_level = :year_level AND sy_id = :syid";
        $query=$this->db->connect()->prepare($sql);


        //  bind parameters
        $query->bindParam(':sem', $this-> sem);
        $query->bindParam(':courseid', $this->curriculum);
        $query->bindParam(':year_level', $this->year_level);
        $query->bindParam(':syid', $this->schoolyear);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function addApplicant() {
        $sql = "INSERT INTO `tlb_applicant` (`applicant_id`, `user_id`, `grade_file`)
         VALUES (NULL, :user_id, NULL)";
        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':user_id', $this->user_id);

        if($query->execute()){
            return true;
        }
    }

    function addGrades() {
        $markUp = "INSERT INTO `tbl_list_grades` (`grades_id`, `subject_id`, `applicant_id`, `grade`) VALUES ";

        $arrayMarkUp = [];

        $index = 0;
        foreach($this -> grade as $grade) {
            $initial = "(NULL, ".$this -> subject_id[$index].", ".$this->applicant_id.", ".$this->grade[$index].")";
            array_push($arrayMarkUp, $initial);
            $index++;
        }

        $finalValues = join(",", $arrayMarkUp);
        $finalSql = $markUp.$finalValues;

        $query=$this->db->connect()->prepare($finalSql);
        if($query->execute()){
            return true;

        }
    }

    function getApplicatInfo() {
        $sql = "SELECT * FROM tlb_applicant WHERE user_id = :user_id;";
        $query=$this->db->connect()->prepare($sql);


        $query->bindParam(':user_id', $this->user_id);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;

    }

    function getGrades() {
        $sql = "SELECT * FROM tbl_list_grades INNER JOIN tbl_subject ON
        tbl_list_grades.subject_id = tbl_subject.subject_id WHERE tbl_list_grades.applicant_id = :applicant_id;        ";
        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':applicant_id', $this->applicant_id);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
       


}
