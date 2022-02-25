<?php
class User {
    private $table = "users";
    private $Connection;

    private $id;
    private $firstname;
    private $lastname;
    private $username;
    private $email;
    private $phone;
    private $password;

    public function __construct($Connection) {
		$this->Connection = $Connection;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($Firstname) {
        $this->Firstname = $firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($Lastname) {
        $this->Lastname = $lastname;
    }
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($Username) {
        $this->Lastname = $username;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getphone() {
        return $this->phone;
    }

    public function setphone($phone) {
        $this->phone = $phone;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        
    }
    public function save(){

        $sqlquery = $this->Connection->prepare("INSERT INTO " . $this->table . " (Firstname,Lastname,Username,Email,phone,password)
                                        VALUES (:Firstname,:Lastname,:email,:phone,:password)");
        $result = $sqlquery->execute(array(
            "Firstname" => $this->Firstname,
            "Lastname" => $this->Lastname,
            "Username" => $this->Username,
            "email" => $this->email,
            "phone" => $this->phone,
            "password" =>$this->password
        ));
        $this->Connection = null;

        return $result;
    }

    public function update(){

        $sqlquery = $this->Connection->prepare("
            UPDATE " . $this->table . " 
            SET 
                Firstname = :Firstname,
                Lastname = :Lastname, 
                Username = :Username,
                email = :email,
                phone = :phone
            WHERE id = :id 
        ");

        $result = $sqlquery->execute(array(
            "id" => $this->id,
            "Firstname" => $this->Firstname,
            "Lastname" => $this->Lastname,
            "Username" => $this->Username,
            "email" => $this->email,
            "phone" => $this->phone
        ));
        $this->Connection = null;

        return $result;
    }
        
    
    public function getAll(){

        $sqlquery = $this->Connection->prepare("SELECT id,Firstname,Lastname,Username,email,phone FROM " . $this->table);
        $sqlquery->execute();
        /* Fetch all of the remaining rows in the result set */
        $result = $sqlquery->fetchAll();
        $this->Connection = null; //cierre de conexión
        return $result;

    }
    
    
    public function getById($id){
        $sqlquery = $this->Connection->prepare("SELECT id,Firstname,Lastname,Username,email,phone 
                                                FROM " . $this->table . "  WHERE id = :id");
        $sqlquery->execute(array(
            "id" => $id
        ));
        /*Fetch all of the remaining rows in the result set*/
        $result = $sqlquery->fetchObject();
        $this->Connection = null; //connection closure
        return $result;
    }
    
    public function getByColumn($column,$value){
        $sqlquery = $this->Connection->prepare("SELECT id,Firstname,Lastname,email,phone 
                                                FROM " . $this->table . " WHERE :column = :value");
        $sqlquery->execute(array(
            "column" => $column,
            "value" => $value
        ));
        $result = $sqlquery->fetchAll(PDO::FETCH_COLUMN);
        $this->Connection = null; //connection closure
        return $result;
    }
    
    public function deleteById($id){
        
        try {
            $sqlquery = $this->Connection->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
            $sqlquery->execute(array(
                "id" => $id
            ));
            return True;
            $Connection = null;
        } 
        catch (Exception $e) {
            echo 'Failed DELETE (deleteById): ' . $e->getMessage();
            return False;
        }
    }
    
    public function deleteBy($column,$value){
        try {
            $sqlquery = $this->Connection->prepare("DELETE FROM " . $this->table . " WHERE :column = :value");
            $sqlquery->execute(array(
                "column" => $value,
                "value" => $value,
            ));
            $Connection = null;
        } catch (Exception $e) {
            echo 'Failed DELETE (deleteBy): ' . $e->getMessage();
            return -1;
        }
    }
    
}
?>
