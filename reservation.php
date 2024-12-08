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
   

<form method="POST" action="/Gestion-des-R-servations-pour-un-Site-de-Voyage/add.php" class="flex flex-col justify-center items-center border">
    <div>
    <label>nom :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="nom" require>
    </div>
    <div>
    <label>prenom :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="prenom" require>
    </div>
    <div>
    <label>email :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="email" require>
    </div>
    <div>
    <label>telephone :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="number" name="telephone" require>
    </div>
    <div>
    <label>adress :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text" name="adress" require>
    </div>
    <div>
    <label>date :</label>
    <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="date" name="date" require>
    </div>
    <div>
        <div>
    <a href="/Gestion-des-R-servations-pour-un-Site-de-Voyage/add.php"><input style="width: 200px;" class="cursor-pointer my-4 text-sm rounded-lg dark:bg-[#082a82] p-2.5 text-white" type="button" value="See all Clients"></a>
    <input style="width: 200px;" class="cursor-pointer my-4 text-sm rounded-lg dark:bg-[#082a82] p-2.5 text-white" type="submit">
    </div>
</form>

    



</body>
</html>