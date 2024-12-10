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
                <li><a href="/Gestion-des-R-servations-pour-un-Site-de-Voyage/reservation.php">Reservation</a></li>
            </ul>
        </nav>
</header>

<div class="flex justify-end mr-6 mt-4">
        <button class="py-4 px-8 bg-blue-600 rounded-xl" onclick="document.getElementById('addclientform').classList.remove('hidden');document.getElementById('addclientform').classList.add('flex')">Add Clients</button>
</div>

<!-- add client form -->
<div id='addclientform' class="hidden justify-center items-center fixed inset-0 bg-black bg-opacity-30">
<form method="POST" action="" class="flex flex-col justify-center items-center pt-5 w-[500px] bg-white rounded-md py-8">
    <div>
    <label>nom :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="nom" required>
    </div>
    <div>
    <label>prenom :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="prenom" required>
    </div>
    <div>
    <label>email :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="email" required>
    </div>
    <div>
    <label>telephone :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="number" name="telephone" required>
    </div>
    <div>
    <label>adress :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="adress" required>
    </div>
    <div>
    <label>date :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="date" name="date" required>
    </div>
    <div>
    <input style="width: 200px;" class="cursor-pointer my-4 text-sm rounded-lg dark:bg-[#082a82] p-2.5 text-white" type="submit" name="submit">
    <input style="width: 200px;" class="cursor-pointer my-4 text-sm rounded-lg dark:bg-gray-300 hover:dark:bg-gray-400 duration-200 p-2.5 text-white" type="button" value="Cancel" onclick="document.getElementById('addclientform').classList.remove('flex');document.getElementById('addclientform').classList.add('hidden')">
    </div>
</form>
</div>

<?php
include 'C:\xampp\htdocs\Gestion-des-R-servations-pour-un-Site-de-Voyage\conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    //client table : 
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adress = $_POST['adress'];
    $date = $_POST['date'];


    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email!";
    } else {
        $clientsql = "INSERT INTO client (nom, prenom, email, telephone, adresse, date_naissance) 
                VALUES (?, ?, ?, ?, ?, ?)";

        // prepare client table : 
        $clientstmt = mysqli_prepare($conn, $clientsql);
        
        mysqli_stmt_bind_param($clientstmt, "ssssss", $nom, $prenom, $email, $telephone, $adress, $date);

        if (mysqli_stmt_execute($clientstmt)) {
            echo "<script>the client added success!<!script>";
            header("Location: /Gestion-des-R-servations-pour-un-Site-de-Voyage/add.php");
            exit();
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
        
        mysqli_stmt_close($clientstmt);
    }
}
$selectallfromclients = "SELECT * FROM client";
$applicate = mysqli_query($conn, $selectallfromclients);

if ($applicate) {
    echo "<h3 class='m-4 text-blue-500 text-3xl font-bold'>All Clients:</h3>";
    echo "<div class='overflow-x-auto'>";
    echo "<table class='min-w-full bg-white border border-gray-200'>";
    
    echo "<thead>";
    echo "<tr class='bg-gray-100'>";
    echo "<th class=' py-3 px-6 text-left text-sm font-medium text-gray-600'>Name</th>";
    echo "<th class=' py-3 px-6 text-left text-sm font-medium text-gray-600'>Email</th>";
    echo "<th class=' py-3 px-6 text-left text-sm font-medium text-gray-600'>Telephone</th>";
    echo "<th class=' py-3 px-6 text-left text-sm font-medium text-gray-600'>Address</th>";
    echo "<th class=' py-3 px-6 text-left text-sm font-medium text-gray-600'>Date of Birth</th>";
    echo "<th class=' py-3 px-6 text-left text-sm font-medium text-gray-600'></th>";
    echo "<th class=' py-3 px-6 text-left text-sm font-medium text-gray-600'></th>";
    echo "</tr>";
    echo "</thead>";
    
    echo "<tbody>";
    while ($space = mysqli_fetch_assoc($applicate)) {
        echo "<tr class='border-b border-gray-200 hover:bg-gray-50'>";
        echo "<td class='py-4 px-6 text-sm text-gray-800'>" . $space['nom'] . " " . $space['prenom'] . "</td>";
        echo "<td class='py-4 px-6 text-sm text-gray-600'>" . $space['email'] . "</td>";
        echo "<td class='py-4 px-6 text-sm text-gray-600'>" . $space['telephone'] . "</td>";
        echo "<td class='py-4 px-6 text-sm text-gray-600'>" . $space['adresse'] . "</td>";
        echo "<td class='py-4 px-6 text-sm text-gray-600'>" . $space['date_naissance'] . "</td>";
        echo "<td class='py-4 px-6 text-sm text-gray-600'>    <a href='edit.php?editid=". $space['id_client'] ."'><input style='width: 40px;' class='cursor-pointer text-sm rounded-lg dark:bg-green-500 py-1.3 px-2 text-white' type='button' value='edit'></td></a>";
        echo "<td class='py-4 px-6 text-sm text-gray-600'>    <a href='delete.php?deleteid=". $space['id_client'] ."'><input style='width: 50px;' class='cursor-pointer text-sm rounded-lg dark:bg-red-500 py-1.2 px-1.6 text-white' type='button' value='delete'></td></a>";

        
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo 'Error fetching data: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>
</html>