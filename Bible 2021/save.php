<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_POST['note'])){
        $note = $_POST['note'];
        $id = $_POST['eleve'];
        $UE = $_POST['UE'];
        $coeff = $_POST['coefficient'];
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=prog_avance", "root", "");
        }
        catch (Exception $e) { die('Erreur : ' . $e->getMessage()); }

        $bdd->exec("INSERT INTO `evaluation` (`nom`,`coefficient`,`note`) VALUES ('$UE','$coeff','$note');");
        $lastID = $bdd->lastInsertId();
        $bdd->exec("INSERT INTO `passe` (`num_eleve`,`num_evaluation`) VALUES ('$id','$lastID');");
        
        echo "vos données ont été enregistrer (note)";


    }
    else {
    if (isset($_POST["nom"]) && isset($_POST["prenom"]))
    {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];

        try {
            $bdd = new PDO("mysql:host=localhost;dbname=prog_avance", "root", "");
        }
        catch (Exception $e) { die('Erreur : ' . $e->getMessage()); }

        $bdd->exec("INSERT INTO `eleve` (`nom`, `prenom`) VALUES ('$nom', '$prenom');");

        echo "vos données ont été enregistrer (eleve)";

        
    }
    }
        ?>

        <a href="programmation_avancee.php">ajouter des notes</a>
   
</body>)
</body>
</html>