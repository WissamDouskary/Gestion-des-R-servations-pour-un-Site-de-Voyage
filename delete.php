<?php 
include 'conn.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `client` WHERE id_client =$id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location: add.php');
        exit();
    }
    
}

?>