<?php
    session_start();
    require_once "db.php";
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $create_date = date("Y-m-d H:i:s");
    $new_password = password_hash($password, PASSWORD_DEFAULT);
    $G_user = 'user';
    
    $select_stmt = $db->prepare("SELECT * FROM user WHERE username = :username");
    $select_stmt->bindParam(":username",$username);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    $username_check = @$row['username'];

    if($username_check == ''){
      $stmt = $db->prepare("INSERT INTO user (username, email, password, first_name, last_name, create_date, group_user)
      VALUES (:username, :email, :password, :first_name, :last_name, :create_date, :group_user)");
      $stmt->bindParam(":username",$username);
      $stmt->bindParam(":email",$email);
      $stmt->bindParam(":password",$new_password);
      $stmt->bindParam(":first_name",$first_name);
      $stmt->bindParam(":last_name",$last_name);
      $stmt->bindParam(":create_date",$create_date);
      $stmt->bindParam(":group_user",$G_user);
      $result = $stmt->execute();
      if($result){
        $select_stmt1 = $db->prepare("SELECT * FROM user WHERE username = :username");
        $select_stmt1->bindParam(":username",$username);
        $select_stmt1->execute();
        $row1 = $select_stmt1->fetch(PDO::FETCH_ASSOC);
        $username_new = @$row1['username'];
          if($username_new != ''){
              echo 'Register';
              exit();
          }else{
            echo 'ERROR FALSE';
            exit();
          }

      }else{
        echo 'ERROR FALSE';
        exit();
      }

    }else {
      echo 'USERNAME FALSE';
      exit();
    } 
	
?>
