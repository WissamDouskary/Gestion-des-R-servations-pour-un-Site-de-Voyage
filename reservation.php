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

    <div class="flex justify-end mr-6 mt-4">
        <button class="py-4 px-8 bg-blue-600 rounded-xl" onclick="document.getElementById('addActivitiesform').classList.remove('hidden');document.getElementById('addActivitiesform').classList.add('flex')">Add activite</button>
    </div>
        
    
    <!-- add activities -->
  <div id="addActivitiesform" class="hidden justify-center items-center fixed inset-0 bg-black bg-opacity-30">
     <form method="POST" action="" class="flex flex-col justify-center items-center pt-5 w-[500px] bg-white rounded-md py-8">
    <div>
    <label>titre :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="titre" required>
    </div>
    <div>
    <label>description :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="description" required>
    </div>
    <div>
    <label>destination :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="destination" required>
    </div>
    <div>
    <label>prix :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="number" name="prix" required>
    </div>
    <div>
    <label>date debut :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="date" name="datedebut" required>
    </div>
    <div>
    <label>date fin :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="date" name="datefin" required>
    </div>
    <div>
    <label>place disponible :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="number" name="placedisponible" required>
    </div>
    <div>
    <div>
    <input style="width: 200px;" class="cursor-pointer my-4 text-sm rounded-lg dark:bg-[#082a82] p-2.5 text-white" name="submit" type="submit">
    <a><input style="width: 200px;" class="cursor-pointer my-4 text-sm rounded-lg dark:bg-gray-400 p-2.5 text-white" type="button" value="Cancel" onclick="document.getElementById('addActivitiesform').classList.remove('flex');document.getElementById('addActivitiesform').classList.add('hidden')"></a>
    </div>
    </div>
</form>
</div>

<?php 

include 'C:\xampp\htdocs\Gestion-des-R-servations-pour-un-Site-de-Voyage\conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//activite table :
$titre = $_POST['titre'];
$description = $_POST['description'];
$destination = $_POST['destination'];
$prix = $_POST['prix'];
$datedebut = $_POST['datedebut'];
$datefin = $_POST['datefin'];
$placedisponible = $_POST['placedisponible'];


$activitesql = "INSERT INTO activite (titre, description, destination, prix, date_debut, date_fin, place_disponible)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
// prepare activite table : 
        $activitestmt = mysqli_prepare($conn, $activitesql);

        mysqli_stmt_bind_param($activitestmt, "sssssss", $titre, $description, $destination, $prix, $datedebut, $datefin, $placedisponible);

        $excutedata = mysqli_stmt_execute($activitestmt);

        if($excutedata){
            echo "<script>alert('data insered success')</script>";
            echo '<script type="text/javascript">
            if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
        </script>';
        }else{
            echo 'error found :' . mysqli_error($conn);
        }
    

    mysqli_stmt_close($activitestmt);
    
    
}

$selectallfromactivite = "SELECT * FROM activite";
$applicate = mysqli_query($conn, $selectallfromactivite);

if ($applicate) {
        echo '<h2 class="ml-5 text-2xl text-blue-600 font-bold "> All avalliable Reservations :</h2>';
        echo '<div class="grid grid-cols-4 ">';
    while ($place = mysqli_fetch_assoc($applicate)) {
        
        echo '<div class="space-y-4 p-6 bg-gray-50 rounded-lg shadow-md mt-4 mx-6 w-[346px]">';
         echo '<h2 class="text-xl font-semibold text-gray-800"> Title : '. $place['titre'] .'</h2>';
         echo '<h2 class="text-lg text-gray-600">place : '. $place['description'] .'</h2>';
         echo '<h2 class="text-lg text-gray-600">destination : To '. $place['destination'] .'</h2>';
         echo '<h2 class="text-lg text-gray-600"> Start By : '. $place['prix'] .' $ </h2>';
         echo '<h2 class="text-lg text-gray-600"> date : de '. $place['date_debut'] .' a '. $place['date_fin'] . '</h2>';
         echo '<h2 class="text-lg text-gray-600"> places Numbers : '. $place['place_disponible'] .' place</h2>';
         echo '<a class="mt-6" href="add.php?activiteID=' . $place['id_activite'] . '"><button class="text-lg bg-[#082a82] text-white py-2 px-6 rounded-xl mt-6" id="reservBtn">Reserve</button></a>';
        //  echo '<a class="mt-6" href="deleteRes.php?delID=' . $place['id_activite'] . '"><button class="text-lg bg-red-500 text-white py-2 px-6 rounded-xl mt-6 ml-6" id="delResBtn">Delete</button></a>';
        echo '</div>';
        
    }
    echo '</div>';
} else {
    echo 'Error fetching data: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>


</body>
</html>