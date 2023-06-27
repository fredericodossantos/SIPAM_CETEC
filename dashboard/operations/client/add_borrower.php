<?php
session_start();
//use once the database.php file
include_once '../../../db/database.php';


if(isset($_POST['insert_data'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];       

    $sql = "INSERT INTO borrowers (name, email, phone) VALUES (?,?,?)";
    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->bind_param("sss", $name, $email, $phone);
    $stmtinsert->execute();
    if($result){
        $_SESSION['status'] = "Cliente inserido com sucesso";
        header("Location: manage_borrower.php");
    }
    else{
        $_SESSION['status'] = "Cliente não inserido";
        header("Location: form_add_borr.php");
    }
    $stmtinsert->close();
    $conn->close();
}


?>