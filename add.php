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
include 'C:\xampp\htdocs\Gestion-des-R-servations-pour-un-Site-de-Voyage\conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adress = $_POST['adress'];
    $date = $_POST['date'];

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email!";
    } else {
        $sql = "INSERT INTO client (nom, prenom, email, telephone, adresse, date_naissance) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        
        mysqli_stmt_bind_param($stmt, "ssssss", $nom, $prenom, $email, $telephone, $adress, $date);

        if (mysqli_stmt_execute($stmt)) {
            echo "Data inserted successfully!<br>";
            
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
}
$select_sql = "SELECT * FROM client";
$result = mysqli_query($conn, $select_sql);

if ($result) {
    echo "<h3>All Data:</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p><strong>Name:</strong> " . $row['nom'] . " " . $row['prenom'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
        echo "<p><strong>Telephone:</strong> " . $row['telephone'] . "</p>";
        echo "<p><strong>Address:</strong> " . $row['adresse'] . "</p>";
        echo "<p><strong>Date of Birth:</strong> " . $row['date_naissance'] . "</p>";
        echo "<hr>"; 
    }
} else {
    echo 'Error fetching data: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>
</html>