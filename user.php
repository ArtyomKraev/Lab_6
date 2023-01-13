<?php 

    $getfile = file_get_contents('src/data/users.json');
    $jsonfile = json_decode($getfile);

    if (isset ($_GET["id"])) 
    {
        $id = (int) $_GET["id"];
        $getfile = file_get_contents('src/data/users.json');
        $jsonfile = json_decode($getfile, true);
        $jsonfile = $jsonfile["user"];
        $jsonfile = $jsonfile[$id];

     }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel = "stylesheet" href = "src/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <title>LOGO</title>

</head>

<body>

    <header>

        <h1 id = "logo">LOGO</h1>

        <div class = "menu">

            <img id = "hamburger" src = "src/icons/menu.svg">
            
            <div class="menu-content">
                <a href = "index.php">manage accounts</a>
                <a href = "create.php">create account</a>
            </div>
            
        </div>

    </header>

    <div class = "island" id = "profile">

        <div id = "bg"></div>

        <div id = "pfp"></div>

        <div class = "user_name"> <?php echo $jsonfile['name']?> </div>

        <div class = "id" > <?php echo $jsonfile['tag'] ?> </div>

        <div id = "line"></div>

        <div class = "description">
            lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        </div>


</body>

</html>