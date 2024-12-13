<?php 
include 'conn.php';

if(isset($_GET['delID'])){
    $id = $_GET['delID'];
    $reserveid = "SELECT * FROM `reservation` WHERE id_activite = $id";
    $queryone = mysqli_query($conn, $reserveid);
    if(mysqli_num_rows($queryone) > 0){

        $delete_reservation = "DELETE FROM reservation WHERE id_activite = $id";
        $query_delete_reservation = mysqli_query($conn, $delete_reservation);

        if($query_delete_reservation) {
            $sqlactivite = "DELETE FROM `activite` WHERE id_activite = $id";
            $resultactiv = mysqli_query($conn, $sqlactivite);
            if($resultactiv){
                header('location: reservation.php');
                exit();
            }
        }
    }
}

?>