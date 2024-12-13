<?php 
include 'conn.php';

if(isset($_GET['thisclientID'])){
    $id = $_GET['thisclientID'];
    $reserveid = "SELECT * FROM `reservation` WHERE id_client = $id";
    $queryone = mysqli_query($conn, $reserveid);
    if(mysqli_num_rows($queryone) > 0){
        
        $delete_reservation = "DELETE FROM reservation WHERE id_client = $id";
        $query_delete_reservation = mysqli_query($conn, $delete_reservation);
        
        if($query_delete_reservation) {
            
            $sql = "DELETE FROM client WHERE id_client= $id";
            $result = mysqli_query($conn, $sql);
            if($result) {
                echo 'Client and associated reservations deleted successfully';
                header('location: add.php');
                exit();
            }
        }
    }
}

?>