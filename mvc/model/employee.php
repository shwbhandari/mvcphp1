<?php
 
class Employee {
    private $table = "employees";
    private $Connection;
    private $id;
    private $Name;
    private $Surname;
    private $Username;
    private $usertype;
    private $email;
    private $phone;
    private $password;
    public function __construct() {
        $this->Connection = new mysqli('localhost', 'root', '', 'mvc');
    }

    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->Name;
    }
  
    public function setName($Name) {
        $this->Name = $Name;
    }

    public function getSurname() {
        return $this->Surname;
    }

    public function setSurname($Surname) {
        $this->Surname = $Surname;
    }
   
    public function getUsername() {
        return $this->Username;
    }
    public function setUsername($Username) {
        $this->Username = $Username;
    }
    public function getusertype() {
        return $this->usertype;
    }
    public function setusertype($usertype) {
        $this->usertype = $usertype;
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
       
        $sql_u = "SELECT * FROM `employees` WHERE Username='$this->Username'";
        $sql_e = "SELECT * FROM `employees` WHERE email='$this->email'";
        $res_u = $this->Connection->query($sql_u);
        $res_e = $this->Connection->query($sql_e);
        if(mysqli_num_rows($res_u)>0){
            $_SESSION['registererror'] = "Sorry... Username already exist";
            return False;
        }
        else if(mysqli_num_rows($res_e)>0){
            $_SESSION['registererror'] = "Sorry... Email already exist";
            return False;
        }
        else{       
        $sql = "INSERT INTO `employees`(Name,Surname,Username,email,phone,password,usertype)
                                        VALUES ('$this->Name','$this->Surname','$this->Username','$this->email','$this->phone','$this->password','$this->usertype')";

       if($this->Connection->query($sql)){
        unset($_SESSION['error']);
      
        return True;
        }
    }    
    }

    public function getAll(){
        $sql =  "SELECT * from `employees`  where  usertype='0'";                          
        $result = $this->Connection->query($sql);
        $result2 = $result -> fetch_all(MYSQLI_ASSOC);
        return $result2;
    }
    
    public function getAllAdmins(){
        $sql =  "SELECT * from `employees`  where  usertype=1";                          
        $result = $this->Connection->query($sql);
        $result2 = $result -> fetch_all(MYSQLI_ASSOC);
        return $result2;
    }
    public function getlogin($Username,$password,$Usertype)
    {       
            $sql =  "SELECT * from `employees`  where Username='$Username' and usertype='$Usertype'";                          
            $result = $this->Connection->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
               if(password_verify($password, $row['password']))
               {
              
                $_SESSION['loginstatus']='Yes';
                
                   if($row['usertype']==1){
                    $array = array($row['id'], "admin");
                       return $array;
                   }
                   else  if($row['usertype']==0){
                    $array = array($row['id'], "employee");
                      return $array;
                   }                                   
               }
               else
               {
                $_SESSION['loginstatus']='No';
               
                  return False;
               }
            }
        }
    
    }
    public function update($id){

       
       $sql =  "UPDATE " . $this->table . " SET  Name = '$this->Name',Surname = '$this->Surname ',  Username = '$this->Username',email = '$this->email',phone = '$this->phone' WHERE id = '$id'";
        if ($this->Connection->query($sql)===TRUE) {
        $_SESSION['loginstatus']='Yes';
        unset($_SESSION['error']);
        $_SESSION['msg'] = 'Details updated successfully';
        return True;
        }
        else{
            unset($_SESSION['msg']);
        $_SESSION['error'] = 'Details are not updated
        ';
        return False;
        }
    }   
    
    
    public function getById($id){
        $sqlquery = ("SELECT id,Name,Surname,Username,email,phone FROM " . $this->table . "  WHERE id = '$id'");
        $result = $this->Connection->query($sqlquery);

        /* fetch object array */
        $obj = $result->fetch_object();  
        return $obj;
       
        
    }
    
    
    
    public function deleteById($id){
        
            $sqlquery = "DELETE FROM " . $this->table . " WHERE id = '$id'";
            if($this->Connection->query($sqlquery)){
                
                return True;
                
            }
       
    }  
}
?>
