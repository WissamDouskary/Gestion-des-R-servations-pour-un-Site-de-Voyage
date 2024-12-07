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
   
        
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="flex flex-col justify-center items-center w-44">
    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="nom">
    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="prenom">
    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="email">
    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" name="telephone">
    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="adress">
    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="date">
    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="submit">
</form>
    
<?php 
include 'C:\xampp\htdocs\Gestion-des-R-servations-pour-un-Site-de-Voyage\conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adress = $_POST['adress'];
    $date = $_POST['date'];

    $sql = "INSERT INTO client (nom, prenom, email, telephone, adresse, date_naissance) 
            VALUES ('$nom', '$prenom', '$email', '$telephone', '$adress', '$date')";

$stmt = mysqli_prepare($conn, $sql);

    if(mysqli_stmt_execute($stmt)){
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }else{
        echo 'error' . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
   
}
mysqli_close($conn);




?>

    



</body>
</html>