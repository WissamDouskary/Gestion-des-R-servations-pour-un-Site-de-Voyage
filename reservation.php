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
<body class=" text-white">
    <header class="bg-[url('./img/background.jpg')] bg-cover bg-no-repeat flex justify-between px-24 py-6 items-center">
        <a href="/index.php"><h2 id="title" class="text-4xl font-bold text-white">Travel Tales</h2></a>
        <nav>
            <ul class="text-white flex gap-8">
                <li><a href="/index.php">Home</a></li>
                <li><a href="/reservation.php">Reservation</a></li>
            </ul>
        </nav>
    </header>
    
</body>
</html>