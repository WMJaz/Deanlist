<?php
require_once 'database.php';

Class User{
    public $user_email;
    public $user_password;
    public $user_firstname;
    public $user_lastname;
    public $user_type;
    public $curriculum;
    public $user_status;
    public $verify_token;

    function __construct()
    {
        $this->db = new Database();
    }

    function validate(){
        $sql = "SELECT * FROM users WHERE binary user_email =:user_email and binary user_password = :user_password AND user_status = 'Active';";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':user_email', $this->user_email);
        $query->bindParam(':user_password', $this->user_password);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }
  
    function CheckIfExistsEmail($email){
        $sql = "SELECT * FROM `users` WHERE `user_email` = :email";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':email', $email);
        if($query->execute()){
            $data = $query->fetch();
            if (!empty($data)){
                if (count($data) > 0) {
                    return true;
                }
            }
        }
        return false;
    }
    
    function add(){
        $sql = "INSERT INTO users (user_id, user_email, user_password, user_firstname, user_lastname, user_type, curriculum, user_status, verify_token)
        VALUES ('null' ,:user_email, :user_password, :user_firstname, :user_lastname, 'student', :curriculum, 'Pending', :verify_token);";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':user_email', $this->user_email);
        $query->bindParam(':user_password', $this->user_password);
        $query->bindParam(':user_firstname', $this->user_firstname);
        $query->bindParam(':user_lastname', $this->user_lastname);
        $query->bindParam(':curriculum', $this->curriculum);
        $query->bindParam(':verify_token', $this->verify_token);

        if($query->execute()){
            return true;
        }
        else{
            return false; 
        }
    }


    function getLatestUserId() {
        $sql = "SELECT user_id FROM users WHERE user_email = :user_email";
        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':user_email', $this->user_email);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }
}

?>