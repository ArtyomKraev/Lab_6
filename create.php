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

        <?php
            if (isset($_POST["create"])) 
            {
                $file = file_get_contents('src/data/users.json');
                $data = json_decode($file, true);
                unset($_POST["create"]);
                $data["user"] = array_values($data["user"]);
                array_push($data["user"], $_POST);
                file_put_contents("src/data/users.json", json_encode($data));

                header('location:index.php');
            }
        ?>

        <form method="POST" action="create.php">
            <div> <input type = "text" name = "name" required placeholder = "your username"/> </div>
            <div> <input type = "text" name = "tag" required placeholder = "your id"/> </div>
            <div> <input id = "create_button" type = "submit" name="create"  value = "create" /> </div>
        </form>

    </div>

</body>

</html>