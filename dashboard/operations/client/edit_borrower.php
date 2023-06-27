<?php
session_start();
// 
include_once '../../../db/database.php';

if (isset($_POST['update_data'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id = $_POST['id']; 
    
    $sql = "UPDATE borrowers SET name=?, email=?, phone=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $phone, $id);
    $result = $stmt->execute();
    
    if ($result) {
        $_SESSION['status'] = "Cliente atualizado com sucesso";
        header("Location: manage_borrower.php");
        exit();
    } else {
        $_SESSION['status'] = "Cliente não atualizado";
        header("Location: form_edit_borr.php?id=" . $id);
        exit();
    }
    
    $stmt->close();
    $conn->close();
}
?>
