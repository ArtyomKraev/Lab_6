<?php
    if (isset($_GET["id"])) {
        $id = (int) $_GET["id"];
        $all = file_get_contents('src/data/users.json');
        $all = json_decode($all, true);
        $jsonfile = $all["user"];
        $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["user"][$id]);
        $all["user"] = array_values($all["user"]);
        file_put_contents("src/data/users.json", json_encode($all));
    }

    header('location:index.php');
}