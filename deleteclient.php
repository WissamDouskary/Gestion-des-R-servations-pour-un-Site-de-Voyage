<?php 
include 'conn.php';

if (isset($_GET['thisclientID'])) {
    $id = $_GET['thisclientID'];


    $delete_reservation = "DELETE FROM reservation WHERE id_client = $id";
    $query_delete_reservation = mysqli_query($conn, $delete_reservation);

    if ($query_delete_reservation) {
        
        $delete_client = "DELETE FROM client WHERE id_client = $id";
        $query_delete_client = mysqli_query($conn, $delete_client);

        if ($query_delete_client) {
            echo 'Client and associated reservations deleted successfully';
            header('location: reservation.php');
            exit();
        }
}
}
?>
