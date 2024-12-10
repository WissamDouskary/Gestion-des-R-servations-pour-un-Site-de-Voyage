<?php 
include 'conn.php';

if(isset($_GET['delID'])){
    $id = $_GET['delID'];
    $sql = "DELETE FROM `activite` WHERE id_activite=$id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location: reservation.php');
        exit();
    }
}

?>