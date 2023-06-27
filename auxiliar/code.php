<?php
session_start();
//use once the database.php file
include_once 'database.php';


if(isset($_POST['insert_data'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $event_date_time = $_POST['event_date_time'];

    $sql = "INSERT INTO users (username, email, password, created_at) VALUES (?,?,?,?)";
    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->bind_param("ssss", $name, $email, $password, $event_date_time);
    $stmtinsert->execute();
    if($result){
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: insert-data.php");
    }
    else{
        $_SESSION['status'] = "Not Inserted Successfully";
        header("Location: insert-data.php");
    }
    $stmtinsert->close();
    $conn->close();
}


?>