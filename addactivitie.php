<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap');
         @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap');
    *{
        font-family: "Nunito Sans", sans-serif;
        font-optical-sizing: auto;
         font-weight: 400;
        font-style: normal;
    }
    #title{
        font-family: "Dancing Script", cursive;
        font-optical-sizing: auto;
         font-weight: 600;
         font-style: normal;
    }
    section h2{
        font-family: "Dancing Script", cursive;
        font-optical-sizing: auto;
         font-weight: 600;
         font-style: normal;
    }
    </style>    
    <title>Travel Tales</title>
</head>
<body class=" text-black">
    <header class="bg-[#082a82] bg-cover bg-no-repeat flex justify-between px-24 py-8 items-center">
    <a href="/Gestion-des-R-servations-pour-un-Site-de-Voyage/index.php"><h2 id="title" class="text-4xl font-bold text-white">Travel Tales</h2></a>
    <nav>
        <ul class="text-white flex gap-8">
                <li><a href="/Gestion-des-R-servations-pour-un-Site-de-Voyage/index.php">Home</a></li>
                <li><a href="/Gestion-des-R-servations-pour-un-Site-de-Voyage/reservation.php">Activities</a></li>
                <li><a href="/Gestion-des-R-servations-pour-un-Site-de-Voyage/addactivitie.php">Reserve Activities</a></li>
            </ul>
        </nav>
    </header>




<?php

include 'conn.php';
if (isset($_GET['thisclientID']) && isset($_GET['thisactivitieid'])) {
    
    $clientid = $_GET['thisclientID'];
    $activiteid = $_GET['thisactivitieid'];

    $checkClientSql = "SELECT id_client FROM client WHERE id_client = '$clientid'";
    $checkClientResult = mysqli_query($conn, $checkClientSql);

    $sql = "INSERT INTO reservation (id_client, id_activite, date_reservation, status) 
                VALUES ('$clientid', '$activiteid', CURDATE(), 'en attent')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('location: addactivitie.php');
            exit();
        } else {
            echo 'Error inserting reservation: ' . mysqli_error($conn);
        }
        
    }

    $selectallfromreserv = "SELECT * FROM reservation";
    $queryforreserve = mysqli_query($conn, $selectallfromreserv);
    if($queryforreserve){
        echo '<table class="min-w-full table-auto border-collapse bg-white shadow-md rounded-lg overflow-hidden mt-5">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="px-4 py-2 text-left border-b">Client ID</th>
                <th class="px-4 py-2 text-left border-b">Activity ID</th>
                <th class="px-4 py-2 text-left border-b">Date</th>
                <th class="px-4 py-2 text-left border-b">Status</th>
                <th class="px-4 py-2 text-left border-b"></th>
            </tr>
        </thead>
        <tbody class="text-gray-800">';
     while ($row = mysqli_fetch_assoc($queryforreserve)) {
        echo '<tr class="hover:bg-gray-100">';
        echo '<td class="px-4 py-2 border-b">' . htmlspecialchars($row['id_client']) . '</td>';
        echo '<td class="px-4 py-2 border-b">' . htmlspecialchars($row['id_activite']) . '</td>';
        echo '<td class="px-4 py-2 border-b">' . htmlspecialchars($row['date_reservation']) . '</td>';
        echo '<td class="px-4 py-2 border-b">' . htmlspecialchars($row['status']) . '</td>' ;
        echo "<td class='px-4 py-2 border-b'><a href='delete.php?delID=". $row['id_reservation'] ."&clientid=". $row['id_client'] ."'><input style='width: 50px;' class='cursor-pointer text-sm rounded-lg dark:bg-red-500 py-1.2 px-1.6 text-white' type='button' value='delete'></td></a>";
        echo '</tr>';
        
        
}
echo '</tbody>
    </table>';
}

?>


</body>
</html>