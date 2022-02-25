<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>MVC</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
         p{
           color:red;      
          }
        </style>
         <link rel="stylesheet" href="resources/css/style.css">
    </head>
    <body>
     <?php include 'includes/nav.php'; ?> 
    <br><br>
    <div class="d-flex justify-content-center"> 
    
        <form id="loginform" method="post" action="../index.php?controller=employees&action=login" id="frmLogin" onSubmit="return validate();" class="col-lg-5">
            <h3><center>Login<center></h3>
            <hr/>
            <div class="text-success">
            <center>  <p><?php  if(isset($_GET['msg'])){ echo $_GET['msg'];} ?></center></p>
            </div>
           
            <div class="text-danger">
            <center>  <p><?php  if(isset($_GET['error'])){ echo $_GET['error'];} ?></center></p>
            </div>
            <div class="alert alert-warning alert-dismissible fade show"  role="alert">
           
            Username:<span id="user_info" class="error-info"></span><input type="text" name="Username" id="Username" class="form-control"/>
            Password:<span id="password_info" class="error-info"></span><input type="password" name="password" id="Password" class="form-control"/><br>
            Login as:<span id="password_info" class="error-info"></span>
            <div class=" form-check form-check-inline">
              <input class="form-check-input" type="radio" name="usertype" id="usertype" value="1">
              <label class="form-check-label" for="inlineRadio1">Admin</label>
            </div>
            <div class=" form-check form-check-inline">
              <input class="form-check-input" type="radio" name="usertype" id="usertype" value="0">
              <label class="form-check-label" for="inlineRadio2">User</label>
            </div>
            <br><br>
            <div class="text-center">
            <input type="submit" id="loginbutton"value="Submit" class="btn btn-success"/>
            </div>
          <form>
    </div>
    
  <?php include('includes/footer.php');  ?>