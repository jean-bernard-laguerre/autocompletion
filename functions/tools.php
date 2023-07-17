<?php 

    function searchPokemon($bdd, $name) {
        $sql = "SELECT * FROM pokemon
                WHERE name LIKE '". $name ."%'";

        $req = $bdd->prepare($sql);
        $req->execute();

        $res = $req->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function getPokemon($bdd, $id){
        $sql = "SELECT * FROM pokemon
                WHERE id = ?";

        $req = $bdd->prepare($sql);
        $req->execute([$id]);

        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

?>