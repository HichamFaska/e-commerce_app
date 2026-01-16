<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bts_db";

    $connexion = new mysqli($host, $username, $password, $dbname);

    if($_SERVER['REQUEST_METHOD'] === "POST"){

        $id = htmlspecialchars(trim($_POST['id']));

        $result = $connexion->query("SELECT * FROM etudiants WHERE id = '$id'");
        if($result){
             while($ligne = $result->fetch_assoc()){
                echo "$ligne[id] |$ligne[nom] | $ligne[prenom] | $ligne[filiere] $ligne[created_at].<br>";
            }
        }
        else{
            echo "Etudiant introuvable<br>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Rechereche etudiant</h1>
    <form action="" method = "POST">
        <div>
            <label for="recherche">id</label>
            <input type="text" name = "id" id="recherche">
        </div>
        <button type= "submit">cherche</button>
    </form>
</body>
</html>