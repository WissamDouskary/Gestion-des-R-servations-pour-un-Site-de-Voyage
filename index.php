<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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


<body class=" text-white">
<div class="bg-[url('./img/background.jpg')] bg-cover bg-no-repeat bg-center h-screen">

<header class=" flex justify-between px-24 pt-8 items-center">
        <a href="/Gestion-des-R-servations-pour-un-Site-de-Voyage/index.php"><h2 id="title" class="text-4xl font-bold text-white">Travel Tales</h2></a>
        <nav>
            <ul class="text-white flex gap-8">
                <li><a href="/Gestion-des-R-servations-pour-un-Site-de-Voyage/index.php">Home</a></li>
                <li><a href="/Gestion-des-R-servations-pour-un-Site-de-Voyage/reservation.php">Reservation</a></li>
            </ul>
        </nav>
    </header>
    <section class="ml-24 mt-32">
        <h2 class="text-8xl animate__animated animate__fadeIn">Travel <br>EveryWhere</h2>
        <a href="#"><button class="animate__animated animate__fadeIn bg-[#81BFDA] border py-2 px-6 mt-10 rounded-full text-black font-bold hover:bg-transparent hover:border hover:text-white duration-300">Reservation</button></a>
    </section>
    </div>

</body>
</html>