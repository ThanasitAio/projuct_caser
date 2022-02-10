<?php
 session_start();
 require_once "../db.php";

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php include '../inc/head.php'; ?>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
</head>
<body>
    <div class="container" >
        <div class="title">Register</div>
        <div class="form-register" >
            <div class="user-details">
                <div class="input-box" style="width: calc(100%/2 - 20px);">
                    <span class="details">Username</span>
                    <input type="text" name="username" id="username" placeholder="Enter your name" require>
                </div>
                <div class="input-box"style="width: calc(100%/2 - 20px);">
                    <span class="details">Email</span>
                    <input type="text" name="email" id="email" placeholder="Enter your email" require>
                </div>
                <div class="input-box"style="width: calc(100%/2 - 20px);">
                    <span class="details">password</span>
                    <input type="password" name="password" id="password" placeholder="Enter your password" require>
                </div>
                <div class="input-box "style="width: calc(100%/2 - 20px);">
                    <span class="details">confirm password </span>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter your confirm password" require>
                </div>
                <div class="input-box"style="width: calc(100%/2 - 20px);">
                    <span class="details">First name</span>
                    <input type="text" name="first_name" id="first_name" placeholder="Enter your first name" require>
                </div>
                <div class="input-box"style="width: calc(100%/2 - 20px);">
                    <span class="details">Last name</span>
                    <input type="text" name="last_name" id="last_name" placeholder="Enter your last name" require>
                </div>
            </div>
            <div class="col-12">
                <div class="buttons">
                    <input type="submit" class="btn-hover color-7"  name="reg_user" 
                    onclick="Register()" value="Register">
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function Register(){
            var username = document.getElementById('username').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            var first_name = document.getElementById('first_name').value;
            var last_name = document.getElementById('last_name').value;
            //alert(username);
            if(username ==''){
                 //alert("กรุณากรอก DateEnd");
                 Swal.fire({
                     title: 'Please enter username !',
                     icon: 'error',
                     text: 'please try again'})
                 return false;
             }else if(email ==''){
                 Swal.fire({
                     title: 'Please enter Email !',
                     icon: 'error',
                     text: 'please try again'})
                     return false;
             }else if(password ==''){
                 Swal.fire({
                     title: 'Please enter password !',
                     icon: 'error',
                     text: 'please try again'})
                     return false;
             }else if(confirm_password ==''){
                 Swal.fire({
                     title: 'Please enter Confirm password !',
                     icon: 'error',
                     text: 'please try again'})
                     return false;
             }else if(password.length  < 8){
                 Swal.fire({
                     title: 'Password must be atleast 8 characters !',
                     icon: 'error',
                     text: 'please try again',
                 })
                 return false;
             }else if(password !== confirm_password){
                 Swal.fire({
                     title: 'Passwords do not match !',
                     icon: 'error',
                     text: 'please try again'})
                     return false;
             }else if(first_name ==''){
                 Swal.fire({
                     title: 'Please enter First name !',
                     icon: 'error',
                     text: 'please try again'})
                     return false;
             }else if(last_name ==''){
                 Swal.fire({
                     title: 'Please enter Last name !',
                     icon: 'error',
                     text: 'please try again'})
                     return false;   
             }
             
            var dataSet = {"username": username, "email": email, "password": password, "first_name": first_name, "last_name": last_name};
            //alert(dataSet);
            //console.log(dataSet)
            $.ajax({           
                type:"post",
                url: 'form_register.php',
                data: dataSet,
                success: function(data) {
                   console.log(data)
                   if(data == 'USERNAME FALSE'){
                    Swal.fire({
                        title: 'Username duplicate !',
                        icon: 'error',
                        text: 'please name again'})
                        return false;  
                   } 
                   if(data == 'ERROR FALSE'){
                    Swal.fire({
                        title: 'Error false !',
                        icon: 'error',
                        text: 'please register again'})
                        return false;  
                   }
                    if(data == 'Register'){
                    Swal.fire({
                        title: 'Register successfully... ',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000})
                        //location.replace("login.php",5000)
                        window.setTimeout(function() {
                            window.location.href = 'login.php';
                        }, 3000);
                        return false;  

                   }
                  
                }
            });
   
        };
       
       
    </script>

    
</body>
</html>