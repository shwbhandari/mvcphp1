<?php
session_start();

if(isset($_SESSION['id'])){
    $id= $_SESSION['id'];
}
class EmployeesController{

    private $Connect;
    private $Connection;

    public function __construct() {
		require_once  __DIR__ . "/../core/connect.php";
        require_once  __DIR__ . "/../model/employee.php";
        
        $this->connect=new Connect();
        $this->Connection=$this->connect->Connection();
    }

   
    public function run($action){
        switch($action)
        { 
            case "index" :
                $this->index();
                break;
            case "insert" :
                $this->create();
                break;
            case "login" :
                $this->login();
                break;
            case "detail" :
                $this->detail();
                break;
            case "update" :
                $this->update();
                break;
            case "delete":
                $this->delete();
                break;
            default:
                $this->index();
                break;
        }
    }
    
   /**
    * Loads the employees home page with the list of
    * employees getting from the model.
    *
    */ 
    public function index(){
        
        //We create the employee object
        $employee=new Employee($this->Connection);
        
       
        //We load the index view and pass values to it
        $this->view("index");
    }

    /**
    * Loads the employees home page with the list of
     * employees getting from the model.
    *
    */ 
    public function detail(){
      
        //We load the model
        $model = new Employee($this->Connection);
       
        $employee = $model->getById($_GET["id"]);
        $this->viewdata("detail",array(
            "employee"=>$employee,
            "title" => "detail Employee"
        ));
        
    }
    /**
    * Loads the employees home page with the list of
     * employees getting from the model.
    *
    */ 
    public function delete(){     
  
        if (isset($_POST['employeeId'])==true) {
             $id = $this->Connection->real_escape_string($_POST["employeeId"]);
             //We load the model
             $employee=new Employee($this->Connection);     
             $result = $employee->deleteById($id);
             unset($_SESSION['loginstatus']);
             echo json_encode(array("result" => "deleted"));           
             
         }
}
   /**
    * Create a new employee from the POST parameters
     * and reload the index.php.
    *
    */
    public function create(){
        if(isset($_POST["Name"])){            
            //We create a user
            $Name = $this->Connection->real_escape_string($_POST["Name"]);
            $Surname = $this->Connection->real_escape_string($_POST["Surname"]);
            $Username = $this->Connection->real_escape_string($_POST["Username"]);
            $phone = $this->Connection->real_escape_string($_POST["phone"]);
            $email = $this->Connection->real_escape_string($_POST["email"]);
            $password = $this->Connection->real_escape_string($_POST["password"]);
            $usertype = $this->Connection->real_escape_string($_POST["usertype"]);

            $employee=new Employee($this->Connection);
            $employee->setName($Name);
            $employee->setSurname($Surname);
            $employee->setUsername($Username);
            $employee->setEmail($email);
            $employee->setphone($phone);
            $employee->setpassword($password);
            $employee->setusertype($usertype);
            $reslt=$employee->save();  
            if($reslt){
            header('Location: view/loginView.php');   
            }
            else{
                header('Location: index.php');    
            }
        }        
        
    }

    /**
    * login employee from POST parameters
     * and reload the index.php.
    *
    */
    public function login(){
        if(isset($_POST["Username"])){
            $Username = $this->Connection->real_escape_string($_POST["Username"]);
            $password = $this->Connection->real_escape_string($_POST["password"]);
            $usertype = $this->Connection->real_escape_string($_POST["usertype"]);
            //We create a user
            $model = new Employee($this->Connection);
            $resultarray = $model->getlogin($Username,$password,$usertype);    
            if( $resultarray[1]=='employee')
            {
               header('location:view/employee/?username='.$Username.'&ff='.$resultarray[0].'');
                // header('location:index.php?controller=employees&action=detail&id='.$resultarray[0].'');
            }
            elseif( $resultarray[1]=='admin'){
                header('location:index.php?controller=admin&action=index');
            }
            else{              
                header('location:view/loginView.php?msg=Invalid Login Username or Password');
            }
        }
    }   
    
   /**
    * Update employee from POST parameters
     * and reload the index.php.
    *
    */
    public function update(){
        if(isset($_POST["id"])){
            
            //We create a user
            $employee=new Employee($this->Connection);
            $employee->setId($_POST["id"]);
            $employee->setName($_POST["Name"]);
            $employee->setSurname($_POST["Surname"]);
            $employee->setUsername($_POST["Username"]);
            $employee->setEmail($_POST["email"]);
            $employee->setphone($_POST["phone"]);
            $result=$employee->update($_POST['id']);
            if($result){
                $_SESSION['updatemsg'] = "Your Details has been updated successfully";               
            }
            else{
                $_SESSION['error'] = "Sorry, your details are not updated";
            }
            header('Location: http://localhost/mvc/index.php?controller=employees&action=detail&id='.$_POST['id'].'');
        }
        
    }
    
    public function admin(){
        //We get all the employees
        $employees=$employee->getAll();
    }
   /**
    * Create the view that we pass to it with the indicated data.
    *
    */
    public function view($view){
        require_once  __DIR__ . "/../view/" . $view . "View.php";

    }
    public function viewdata($view,$datas){
        $datas= $datas;
        require_once  __DIR__ . "/../view/" . $view . "View.php";

    }
    public function logout()
    {
        session_start();
        if(session_destroy()) {
        header("Location: ../index.php");
    }
    }
}
?>
