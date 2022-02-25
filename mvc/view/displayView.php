<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    a:link{
        text-decoration:none;
    }
    </style>
</head>
<body>
    
    <?php include 'includes/nav.php'; ?>
    
   <br><br>
   <div class="container">
    <div class="col-sm-9 mx-auto justify-content-center align-bottom">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <nav class="nav">
      <a class="nav-link active" href="index.php?controller=admin&action=index">List all employees</a>
      <a class="nav-link" href="index.php?controller=admin&action=getalladmins">List all admins</a>
    </nav>
  </ol>
  </nav>
    
      <table class="table table-striped table-bordered">
      <thead>
      <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile No</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($data as $employee) {?>
      <tr>

          <th scope="row"><?php echo $employee["Name"]; ?></th>
          <td>  <?php echo $employee["Surname"]; ?></td>
          <td> <?php echo $employee["Username"]; ?></td>
          <td><?php echo $employee["email"]; ?></td>
          <td><?php echo $employee["phone"]; ?></td>
          
        <td><a href="index.php?controller=admin&action=editemployee&id=<?php echo $employee['id']; ?>" class="btn-sm btn-info">Edit</button></td>   
        <td><a href="index.php?controller=admin&action=delete&id=<?php echo $employee['id']; ?>" class="btn-sm btn-danger">delete</a></td>          
     </tr>
     <?php } ?>
     </tbody>
     </table>
    </div>  
    </div>  

   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
   $("#showit").click(function(){
       $("#edituser").css("display","block");
   });
});

</script>
</body>
</html>