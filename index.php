<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
    <?php include 'inc/head.php'; ?>
</head>
<body>
    <?php
     session_start();
     require_once "db.php";
     

    ?>
        <?php include 'inc/menu.php'; ?>

    <script>

        function logout(){
            document.cookie = "UID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            window.location.href = 'http://localhost/project/index.php';
        }
    </script>
</body>
</html>