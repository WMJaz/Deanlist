<?php

require_once 'database.php';

class Faculty{
    //attributes

    public $id;
    public $img;
    public $firstname;
    public $lastname;
    public $rank;
    public $email;
    public $status;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO faculty (img, firstname, lastname, rank, email, status) VALUES 
        (:img, :firstname, :lastname, :rank, :email, :status);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':img', $this->img);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':rank', $this->rank);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':status', $this->status);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show(){
        $sql = "SELECT * FROM faculty ORDER BY CONCAT('firstname',', ','lastname') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM faculty WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function edit(){
        $sql = "UPDATE faculty SET img=:img, firstname=:firstname, lastname=:lastname, rank=:rank, email=:email, status=:status WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':img', $this->img);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':rank', $this->rank);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM faculty WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function get_loggedin_adviser_id($email){
        $sql = "SELECT id FROM faculty INNER JOIN users ON faculty.email=users.user_email WHERE users.user_email=:email";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':email', $email);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

}

?>