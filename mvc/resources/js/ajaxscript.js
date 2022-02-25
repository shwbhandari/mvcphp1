$(document).ready(function(){

    $("#myform").click(function(){
        const firstname = $("#firstname").val();
        const lastname = $("#lastname").val();
        const username = $("#username").val();
        const email = $("#email").val();
        const password = $("#password").val();
        if(firstname!="" && lastname !="" && username !=""&& email != "" && password!=""){
            $.ajax({
                type:"POST",
                url:"myform.php",
                data: form.serialize(),
                dataType:'json',
                success:function(data){
                    if(feedback.status === "error"){
                        $(".email").addClass("");
                        $(".emailError").html(feedback.message);
                    } else if(feedback.status === "success"){
                         window.location = "../login/";
                    }
                }
            })
        }
    
    })
    function deleteData(id) {
        var dataString = "employeeId=" + id;
        console.log(dataString);
        var result = confirm("Want to delete?");
        console.log("delete");
        if (result) {
            $.ajax({
                type: "POST",
                url: "index.php?controller=employees&action=delete",
                data: dataString,
                dataType: "json",
                success: function (data) {
                    console.log("deleted");
                    notify("User Account Deleted");
                    location.href = "http://localhost/mvc/index.php?msg=delete";    
                }
            });
        }
    
    }
})