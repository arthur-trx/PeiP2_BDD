<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8_unicode_ci">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resultat</title>
</head>
<body>
    

    <?php
    $nom=$_POST["name"];
    $prenom=$_POST["firstname"];
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test', "root", "");
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $bdd -> exec("INSERT INTO `personne` (`nom`, `prenom`) VALUES ('$nom', '$prenom');");
    $id=$bdd -> lastInsertId();
    echo $id;
    ?>

</body>
</html>