  <?php include('includes/nav.php'); ?>
  
    
    <div class="d-flex justify-content-center">
        <form action="index.php?controller=employees&action=insert" id="myform"  method="post" class="col-lg-5">
        <br>
            <h3><center>Registration Form<center></h3>
            <hr/>
            <div class="text-danger">
            <center>  <p><?php  if(isset($_SESSION['registererror'])){ echo $_SESSION['registererror']; } ?></center></p>
            </div>           
            <div class="alert alert-warning alert-dismissible fade show"  role="alert">
            Firstname: <input type="text" id="fname" name="Name" class="form-control" required/>
            <h6 id="firstnamecheck" style="color:red;">
            **firstname is missing
            </h6>
            Lastname: <input type="text" id="lname" name="Surname" class="form-control" required/>
            <h6 id="lastnamecheck" style="color:red;">
            **lastname is missing
            </h6>
            Username:<input type="text" id="uname" name="Username" class="form-control" required/>
            <h6 id="usernamecheck" style="color:red;">
            **username is missing    
            </h6>
            Email: <input type="email" id="email" name="email" class="form-control" required/>
            <h6 id="emailcheck" style="color:red;">
            **email is invalid        
            </h6>
            Password:<input type="password" id="password" name="password" class="form-control" required/>
            <h6 id="passcheck" style="color:red;">
            **password should contain 1 Capital Case, 1 small case , 1 special character 
            </h6>
            Contact No: <input type="number" id="mobile" name="phone" class="form-control" required/>
           
            <h6 id="mobilecheck" style="color:red;">
            **mobileno is missing    
            </h6>
            <label for="cars">Choose User Type:</label><br>
            <select name="usertype" id="usertype" class="form-control form-select form-select-md">
              <option value="1">Admin</option>
              <option value="0">User</option>
            </select>
            <br>
            <div class="text-center">
            <input type="submit" value="Submit" id="#submitbutton" class="btn btn-success"/>
            </div>
        </form>
    </div>
    <?php include 'includes/footer.php' ?>
    <script src="resources/js/validate.js"></script>
    </body>
</html>
  
   
    