<?php  $GLOBALS['Base_URL'] ="http://localhost/mvc/";

?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>MVC</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="resources/css/style.css">
    </head>
    <body>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid align-items-center">
    <a class="navbar-brand" href="#">MVC DEMO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo $GLOBALS['Base_URL']?>index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $GLOBALS['Base_URL']?>index.php">Signup</a>
        </li>
        <li class="nav-item text-right">
        <?php  
        if(isset($_SESSION['loginstatus']) ){
          echo '<a class="nav-link" href="'. $GLOBALS['Base_URL'].'view/logout.php">Logout</a>';
        }
        else{
          echo '<a class="nav-link" href="'. $GLOBALS['Base_URL'].'view/loginView.php">Login</a>';        
        }
        ?>
        </li>
       
      </ul>
    </div>  
    </div>
</nav>  