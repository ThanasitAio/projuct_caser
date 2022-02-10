<?php 


    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "case_project";

    try{
        $db = new PDO("mysql:host={$db_host}; dbname={$db_name}", $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        $e->getMessage();
     
        }
    if(isset($_COOKIE['UID'])){
        $UID = base64_decode($_COOKIE['UID']);
        }else {
            $UID = '';
        }
    
    $stmt = $db->prepare("SELECT * FROM user WHERE user_id = :user_id");
    $stmt->bindParam(":user_id",$UID);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $user_type = @$row['group_user'];
    $user_name = @$row['username'];
    $user_image = @$row['image_user'];


?>