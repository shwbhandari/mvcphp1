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
          body{
              background color:white smoke;
          }
        </style>
    </head>
    <body>
   <?php include('../includes/nav.php'); ?>
   <div class="jumbotron">
  <h1 class="display-4">Welcome <?php echo $_GET['username'] ?></h1>
  <hr class="my-4">
 
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="http://localhost/mvc/index.php?controller=employees&action=detail&id=<?php echo $_GET['ff'] ;?>" role="button">edit user</a>
    <a class="btn btn-danger btn-lg" href="#" onclick="deleteData(<?php echo $_GET['ff'] ;?> )" role="button">delete Account</a>
  </p>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>    
        function deleteData(id) {
        var dataString = "employeeId=" + id;
        console.log(dataString);
        var result = confirm("Want to delete account?");
       
        if (result) {
            $.ajax({
                type: "POST",
                url: "http://localhost/mvc/index.php?controller=employees&action=delete",
                data: dataString,
                dataType: "json",
               
                success: function (data) {
                    console.log('hello');
                    window.location.href = "http://localhost/mvc/index.php";   
                    
                }
            });
        }
    
    } 
    </script>

