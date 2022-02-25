
$(document).ready(function(){                             
    $('#usernamecheck').hide();
    $('#firstnamecheck').hide();
    $('#lastnamecheck').hide();
    $('#mobilecheck').hide();
    $('#passcheck').hide();
    $('#emailcheck').hide();

    $('#fname').keyup(function(){
        validateFirstname();
    });
    $('#lname').keyup(function(){
        validateLastname();
    }); 
    $('#uname').keyup(function(){
        validateUsername();
    });
    $('#mobile').keyup(function(){
        validateMobile();
    });
    $('#password').keyup(function(){
        validatePassword();
    });
    $('#email').keyup(function(){
        validateEmail();
    }); 
});
//validate username
    function validateUsername(){
        let usernameValue = $('#uname').val();
       
        if((usernameValue.length<3)||(usernameValue.length>10)){
            $('#usernamecheck').show();
            $('#usernamecheck').html("**length of username must be between 3 and 10")
          
            return false;
            
        }
        else{
            $("#usernamecheck").hide();
            return true;
        }
        
    }
     //validate firstname   
     function validateFirstname(){
         let firstnameValue = $('#fname').val();
        
         if((firstnameValue.length<3)||(firstnameValue.length>10)){
             $('#firstnamecheck').show();
             $('#firstnamecheck').html("**length of firstname must be between 3 and 10")
             return false;      
         }
         else{
             $("#firstnamecheck").hide();
             return true; 
         }
     }
     function validateLastname(){
        let lastnameValue = $('#lname').val();
        
        if((lastnameValue.length<3)||(lastnameValue.length>10)){
            $('#lastnamecheck').show();
            $('#lastnamecheck').html("**length of lastname must be between 3 and 10")
            usernameError = false;
            return false;
        }
        else{
            $("#lastnamecheck").hide();
            return true; 
        }
    }
        //validate mobileno
   
        function validateMobile(){
            var phoneno=/^\d{10}$/;
            let mobileValue = $('#mobile').val();
          
             if(phoneno.test(mobileValue)){
                
                $('#mobilecheck').show();
                $('#mobilecheck').html("**your mobile no is valid");
                return true;
            }
            else{
               
                mobileError = false;
                return false;
            }
        }
        function validateEmail() 
        {
            let emailValue = $('#email').val();
         if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailValue))
          {
            $('#emailcheck').hide();
           return true;
          }
          else{
            $('#emailcheck').show();
            $('#emailcheck').html("**please enter valid email");
            return false;
          }
           
        }

        function validatePassword() 
        {
            let passwordValue = $('#password').val();
         if (passwordValue.match(/[a-z]/g) && str.match( 

            /[A-Z]/g) && str.match( 

            /[0-9]/g) && str.match( 

            /[^a-zA-Z\d]/g) && str.length >= 8)
          {
            $('#passcheck').hide();
            return true;
             
          }
          else{
            $('#passcheck').show();
            return false;
          }
           
        }
    

function validatemyform() {
    var fname = document.forms["myform"]["fname"].value;
    var lname = document.forms["myform"]["lname"].value;
    var username = document.forms["myform"]["username"].value;
    var email = document.forms["myform"]["email"].value;
    var phone = document.forms["myform"]["phone"].value;
    var password = document.forms["myform"]["password"].value;


    if (fname.length < 3) {
        // notify("First Name too short");
       var temp =  document.getElementById("firstnamecheck");
       var text = document.createTextNode("too short firstname");
       temp.appendChild(text);
        return false;
    } else if (lname.length < 3) {       
        document.getElementById("usernamecheck")
        return false;
    } else if (username.length < 3) {
        notify("User name Name too short");
        document.getElementById("username").focus()
        return false;
    } else if (!validateEmail(email)) {
        notify("Please Enter Valid email");
        document.getElementById("email").focus()
        return false;
    } else if (!validatePhone(phone)) {
        notify("Please Enter Valid 10 digit contact number");
        document.getElementById("phone").focus()
        return false;
    } else if (password.length < 8) {
        notify("Password too short must be length length greater then 8");
        document.getElementById("password").focus()
        return false;
    }

    return true;

}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validatePhone(phoneNumber) {
    var re = /^\+(?:[0-9] ?){6,14}[0-9]$/;
    return re.test(phoneNumber);
}

//function for login form validation
function validate() {
        var $valid = true;
        document.getElementById("Username").innerHTML = "";
        document.getElementById("password").innerHTML = "";
        
        var userName = document.getElementById("Username").value;
        var password = document.getElementById("password").value;
        if(userName == "") 
        {
            document.getElementById("user_info").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }