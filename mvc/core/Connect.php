<?php
class connect{
    private $host, $user, $pass, $database, $charset;
  
    public function __construct() {
        $db_cfg = require_once 'config/database.php';
        $this->host=DB_HOST;
        $this->user=DB_USER;
        $this->pass=DB_PASS;
        $this->database=DB_DATABASE;
        $this->charset=DB_CHARSET;
    }
    
    public function Connection(){

        $conn = new mysqli($this->host,$this->user,$this->pass,$this->database);

        // Check connection
        if ($conn ->connect_errno) {
        echo "alert(Failed to connect to MySQL: )" . $mysqli -> connect_error;
         exit();
        } 
        return $conn;      
     }
    }
?>
