<?php

    if (isset($_GET["id"])) {
        $id = (int) $_GET["id"];
        $getfile = file_get_contents('src/data/users.json');
        $jsonfile = json_decode($getfile, true);
        $jsonfile = $jsonfile["user"];
        $jsonfile = $jsonfile[$id];
    }

    if (isset($_POST["id"])) {
        $id = (int) $_POST["id"];
        $getfile = file_get_contents('src/data/users.json');
        $all = json_decode($getfile, true);
        $jsonfile = $all["user"];
        $jsonfile = $jsonfile[$id];

        $post["name"] = isset($_POST["name"]) ? $_POST["name"] : "";
        $post["tag"] = isset($_POST["tag"]) ? $_POST["tag"] : "";


        if ($jsonfile) {
            unset($all["user"][$id]);
            $all["user"][$id] = $post;
            $all["user"] = array_values($all["user"]);
            file_put_contents("src/data/users.json", json_encode($all));
        }

        header('location:index.php');
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

    <title>Create new account</title>

</head>

<body>
    
    <header>

        <a id = "back" href = "index.php"> <span>back</span> </a>

    </header>

    <div class = "island" id = "create_island">

        <form action="update.php" method="POST">

            <div> <input type = "text" name = "name" required value="<?php echo $jsonfile["name"] ?>"/> </div>
            <div> <input type = "text" name = "tag" required value="<?php echo $jsonfile["tag"]?>"/> </div>
            <div> <input type="hidden" name="id" value="<?php echo $id ?>" /> </div>
            <div> <input id = "create_button" type = "submit" name="submit" value = "change" /> </div>
            
        </form>

    </div>

</body>

</html>