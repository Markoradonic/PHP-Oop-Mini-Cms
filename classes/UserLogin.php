<?php

session_start();

include_once '/../config/config.php';
class UserLogin {
    
    public $status;
    
    private $db;
    
    public function __construct() 
    {
        global $config;
        $this->db = new PDO('mysql:host='.$config["db_host"].';dbname='.$config["db_name"].';charset=utf8mb4', ''.$config["db_username"].'', ''.$config["db_password"].'');
    }
    
    
    public function Login($username, $password) 
    {
        try 
        {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
            $stmt->execute(array(":username"=>$username, ":password"=>md5($password) ));
            
            if($stmt->rowCount() == 1)
            {
                $row = $stmt->fetch();
               $_SESSION["users_name"] = $row["firstname"]; // u vrednosti ove sesije ce biti korisnikovo ime
               return TRUE;
            }
            else
            { 
                $this->status = "Podaci nisu tacni";
                return FALSE;
            }     
        } 
        catch (Exception $exc) {
        echo $exc->getTraceAsString();
        }
        }
}
