<?php 
include 'conn.php';

if(isset($_GET['delID']) && isset($_GET['clientid'])){
    $id = $_GET['delID'];
    $clientid = $_GET['clientid'];
    

    $sql_delete_reservations = "DELETE FROM `reservation` WHERE id_reservation = $id";
    $result_delete_reservations = mysqli_query($conn, $sql_delete_reservations);


    if($result_delete_reservations){
        header('location: addactivitie.php');
        exit();
    }
    
}

?>