<?php

require __DIR__ . "/../classes/Database.php";
include "tools.php";

session_start();
$pdo = new Database();

$content = trim(file_get_contents("php://input"));
$data = json_decode($content, true);

$response["success"] = false;

if (!empty($data["name"])) {
    $response["pokemons"] = searchPokemon($pdo->bdd, $data["name"]);
    $response["success"] = true;
}

echo json_encode($response);
?>
