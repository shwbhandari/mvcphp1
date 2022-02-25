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
    </head>
    <body>
   <?php include('includes/nav.php'); ?>
    <br>
        <div class="col-lg-5 mx-auto">
        <?php
        if(isset($_SESSION['msg'])){
        echo '<div class="alert alert-success" role="alert">
            '. $_SESSION['msg'].'
        </div>';
        }
        if(isset($_SESSION['error'])){
        echo '<div class="alert alert-danger" role="alert">
             '.$_SESSION['error'].'
        </div>';
        }
        ?>
            <form action="index.php?controller=employees&action=update" method="post">
                <h3>User detail</h3>
                <hr/>
                <input type="hidden" name="id" value="<?php echo $datas["employee"]->id ?>"/>
                Name: <input type="text" name="Name" value="<?php echo $datas["employee"]->Name ?>" class="form-control"/>
                Surname: <input type="text" name="Surname" value="<?php echo $datas['employee']->Surname ?>" class="form-control"/>
                Username: <input type="text" name="Username" value="<?php echo $datas['employee']->Username ?>" class="form-control"/>
                Email: <input type="text" name="email" value="<?php echo $datas['employee']->email ?>" class="form-control"/>
                phone: <input type="text" name="phone" value="<?php echo$datas['employee']->phone ?>" class="form-control"/>
                <br>
                <div class="row">
                <input type="Submit" value="Save" class="btn btn-success"/>&nbsp;&nbsp;
                <input type="button" class="btn btn-secondary" value="Go back!" onclick="history.back()">
               
            </form>
            <!-- <a href="index.php?controller=employees&action=delete" class="btn btn-danger">Delete</a> -->
            </div>
        </div>
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
                    if(data.code=="200"){
                        alert("Success: "+data.msg);
                        window.location.href = "http://localhost/mvc/index.php";
                    }
                    
                   
                    // unset($_SESSION['loginstatus']);      
                    
                }
            });
        }
    
    } 
       </script>
   <?php include 'includes/footer.php'; ?>