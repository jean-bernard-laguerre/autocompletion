<?php 
    require __DIR__ . "/../classes/Database.php";
    include "../functions/tools.php";

    $pdo = new Database();

    if(isset($_POST["search"])){
        header("location: /../autocompletion/pages/search.php/?search=". $_POST["search"]);
    }

    if (!isset($_GET["search"])){
        header("location: /../autocompletion/index.php");
    }

    $pokemons = searchPokemon($pdo->bdd, $_GET["search"])
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../autocompletion/style/style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css"> <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/../autocompletion/scripts/search.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Search result</title>
</head>
<body class="flex">
    <?php include "../includes/header.php" ?>
    <main class="flex">
        <div class="result-container">
            <?php 
                foreach($pokemons as $pokemon){
                    echo "<a href='/../autocompletion/pages/element.php/?id=" . $pokemon["id"] . "'>" . $pokemon["name"] . "</a> </br>";
                }
            ?>
        </div>
    </main>
    <?php include "../includes/footer.php" ?>
</body>
</html>