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

<?php
include 'conn.php';



if (isset($_GET['editid'])) {
    $id = $_GET['editid'];
    
    $selectAfterId = "SELECT * FROM `client` WHERE id_client = $id";
    $fresult = mysqli_query($conn, $selectAfterId);
    $row = mysqli_fetch_assoc($fresult);

    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $email = $row['email'];
    $telephone = $row['telephone'];
    $adress = $row['adresse'];
    $date = $row['date_naissance'];
} 


if (isset($_POST['submit'])) {  
   
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adress = $_POST['adress'];
    $date = $_POST['date'];


        $sqlclient = "UPDATE `client` 
                    SET nom = '$nom', prenom = '$prenom', email = '$email', telephone = '$telephone', adresse = '$adress', date_naissance = '$date' 
                        WHERE id_client = $id";
        $sqlclientquery = mysqli_query($conn, $sqlclient);
        $sqlreserve = "UPDATE `reservation` 
                    SET nom = '$nom', prenom = '$prenom', email = '$email', telephone = '$telephone', adresse = '$adress', date_naissance = '$date' 
                    WHERE id_client = $id";
        $sqlreservequery = mysqli_query($conn, $sqlclient);

    if ($sqlclientquery && $sqlreservequery) {
        echo '<script>alert("data edited succes")</script>';
        header('location: reservation.php');
        exit();
    } else {
        echo "Error updating client: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


<!-- edit client form -->
<div id='editclientform' class="flex justify-center items-center fixed inset-0 bg-black bg-opacity-30">
<form method="POST" action="" class="flex flex-col justify-center items-center pt-5 w-[500px] bg-white rounded-md py-8">
    <div>
    <label>nom :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required>
    </div>
    <div>
    <label>prenom :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>" required>
    </div>
    <div>
    <label>email :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
    </div>
    <div>
    <label>telephone :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="number" name="telephone" value="<?php echo htmlspecialchars($telephone); ?>" required>
    </div>
    <div>
    <label>adress :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="adress" value="<?php echo htmlspecialchars($adress); ?>" required>
    </div>
    <div>
    <label>date :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="date" name="date" value="<?php echo htmlspecialchars($date); ?>"  required>
    </div>
    <div>
    <input style="width: 200px;" class="cursor-pointer my-4 text-sm rounded-lg dark:bg-[#082a82] p-2.5 text-white" type="submit" value="Save Changes" name="submit">
    <a href="add.php"><input style="width: 200px;" class="cursor-pointer my-4 text-sm rounded-lg dark:bg-gray-300 hover:dark:bg-gray-400 duration-200 p-2.5 text-white" type="button" value="Cancel"></a>
    </div>
</form>
</div>







</body>
</html>