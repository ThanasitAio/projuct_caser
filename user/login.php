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
    <title>Login</title>
    <?php include '../inc/head.php'; ?>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>
    <div class="container">
        <div class="title">Login</div>
        <div class="form-register" >
            <div class="user-details" style="padding: 0 80px 0 80px;">
                <div class="col-12">
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="username" id="username" placeholder="Enter your name" require>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" id="password" placeholder="Enter your Password" require>
                    </div>
                </div>
                <div class="col-12">
                    <span>Not yet a member? <a href="register.php">Sign Up</a></span>
                    <span>Not yet a member? <a href="../index.php">Home</a></span>
                </div>
                <div class="col-12">
                    <div class="buttons">
                        <input type="submit" class="btn-hover color-7" style="margin-top: 20px;" 
                        onclick="login()" name="login_user" value="Login">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function login(){
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
                //alert(username);
            if(username ==''){
                Swal.fire({
                    title: 'Please enter username !',
                    icon: 'error',
                    text: 'please try again'})
                return false;
            }else if(password ==''){
                 Swal.fire({
                     title: 'Please enter password !',
                     icon: 'error',
                     text: 'please try again'})
                     return false;
             }
            var dataSet = {"username": username, "password": password};
           //
            $.ajax({           
                type:"post",
                url: 'form_login.php',
                data: dataSet,
                success: function(data2) {
                    //console.log(data2)
                    if(data2 == 'LOGIN USER'){
                    Swal.fire({
                        title: 'Login user successfully... ',
                        icon: 'success',
                        showConfirmButton: false,
                        })
                        //location.replace("login.php",5000)
                        window.setTimeout(function() {
                            window.location.href = '../index.php';
                        }, 1000);
                        return false;  

                   }
                   if(data2 == 'LOGIN ADMIN'){
                    Swal.fire({
                        title: 'Login admin successfully... ',
                        icon: 'success',
                        showConfirmButton: false,
                       })
                        //location.replace("login.php",5000)
                        window.setTimeout(function() {
                            window.location.href = '../index.php';
                        }, 1000);
                        
                        return false;  

                   } 
                   if(data2 =='ERROR USERNAME OR PASSWORD'){
                    Swal.fire({
                        title: 'Error Username or Password !',
                        icon: 'error',
                        text: 'please try again'})
                        return false;
                    }
                    
                 }

            });

        };
    </script>


</body>
</html>