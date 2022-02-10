<?php
    require_once "../db.php"; 
    if (isset($_POST['save'])) {
        
        $ITEM_CODE = $_POST['ITEM_CODE'];
        $ITEM_NAME = $_POST['ITEM_NAME'];
        $DESCRIPTION = $_POST['DESCRIPTION'];
        $COLOR = $_POST['COLOR'];
        $COST = $_POST['COST'];
        $CURRENCY = $_POST['CURRENCY'];
        $PRICE = $_POST['PRICE'];
        $CATEGORY = $_POST['CATEGORY'];
        $BRAND = $_POST['BRAND'];
        $VERSION = $_POST['VERSION'];
        $CREATE_BY = $_POST['CREATE_BY'];
        $SUPPLIER = $_POST['SUPPLIER'];
        $STOCK = $_POST['STOCK'];
       //echo $ITEM_CODE;
        $image_file = $_FILES['IMAGE']['name'];
        $type = $_FILES['IMAGE']['type'];
        $size = $_FILES['IMAGE']['size'];
        $temp = $_FILES['IMAGE']['tmp_name'];
      
        $path = "../img/" . time() . $image_file;
        $CHECK_IMAGE = '';
        if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
            if (!file_exists($path)) { 
                if ($size < 5000000) { 
                    if(move_uploaded_file($temp, '../img/' . $image_file) ){
                        $CHECK_IMAGE = 'SUCCESS';
                    }else {
                        echo "<script>window.top.window.Return_form('FALSE_UPLOAD_IMAGE');</script>";
                        exit();
                    }
                    
                }else{
                    echo "<script>window.top.window.Return_form('FALSE_SIZE');</script>";
                    exit();
                }
            }else{
                echo "<script>window.top.window.Return_form('FALSE_PART');</script>";
                exit();
            }
        }else{
            echo "<script>window.top.window.Return_form('FALSE_TYPE');</script>";
            exit();
        }
        if($CHECK_IMAGE == 'SUCCESS'){
    
        }else {
            echo "<script>window.top.window.Return_form('FALSE_UPLOAD_IMAGE');</script>";
            exit(); 
        }
       

    }else {

    }
  
   
/*
if($ITEM_CODE !== ''){
      
        echo "<script>window.top.window.ReturnProduct('FALSE@ENTENTION@$type');</script>";
       }
    $select_stmt = $db->prepare("SELECT * FROM product WHERE Item_code  = :Item_code ");
    $select_stmt->bindParam(":Item_code ",$ITEM_CODE);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    $Item_code_check = @$row['Item_code'];
*/
?>