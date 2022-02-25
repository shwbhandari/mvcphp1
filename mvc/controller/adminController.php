<?php
session_start();

if(isset($_SESSION['id'])){
    $id= $_SESSION['id'];
}
class AdminController{

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
            case "editadmin" :
                $this->detail();
                break;
            case "getallemployees" :
                $this->detailall();
                break;
            case "getalladmins" :
                $this->getAllAdmins();
                break;
            case "editemployee" :
                $this->detail();
                break;
            case "delete" :
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
        $employees=$employee->getAll();
        $this->viewdata("display",
        $employees);
    }
    public function datailall(){
        
        //We create the employee object
        $model=new Employee($this->Connection);
        //We load the index view and pass values to it
        $this->view("display",$data);
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
    public function getAllAdmins(){
      
        //We load the model
           //We create the employee object
           $employee=new Employee($this->Connection);
           $admins=$employee->getAllAdmins();
           $this->viewdata("admin",
           $admins);
    }
    /**
    * Loads the employees home page with the list of
     * employees getting from the model.
    *
    */ 
    public function delete(){     
  
        if (isset($_GET['id'])==true) {
             $id = $this->Connection->real_escape_string($_GET["id"]);
             //We load the model
             $employee=new Employee($this->Connection);     
             $result = $employee->deleteById($id);
             if($result){
                header('Location: '.$_SERVER['REQUEST_URI']);
                header("location:javascript://history.go(-1)");
               
                // header('Location: ../view/loginView.php');   
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
                $_SESSION['msg'] = "Your Details has been updated successfully";               
            }
            else{
                $_SESSION['error'] = "Sorry, your details are not updated";
            }
            header('Location: http://localhost/mvc/index.php?controller=employees&action=detail&id='.$_POST['id'].'');
        }
        
    }
    
  
   /**
    * Create the view that we pass to it with the indicated data.
    *
    */
    public function view($view){
        require_once  __DIR__ . "/../view/" . $view . "View.php";

    }
    public function viewdata($view,$datas){
        $data= $datas;
       
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
