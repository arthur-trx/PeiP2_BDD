<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend</title>
</head>
<body>
<?php
if (isset($_POST['action'])) {
    if ($_POST['action'] == 0)
    {
        if(isset($_POST['nom']) && isset($_POST['prenom']))
        {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            try {$bdd = new PDO("mysql:host=localhost;dbname=reservation", "root", "");}
            catch (PDOException $e) { die('Erreur : ' . $e->getMessage());}

            $bdd->exec("INSERT INTO `usager` (`nom`, `prenom`) VALUES ('$nom', '$prenom');");
            echo "données sauvegarder (personne)";
            echo "<a href='accueil.html'>Retour à l'accueil</a>";
        }
    }
}
else {
    if(isset($_POST['usager']) && isset($_POST['date']) && $_POST['salle'] && $_POST['duree'] && $_POST['motif'])
    {
        $usager = $_POST['usager'];
        $salle = $_POST['salle'];
        $date = $_POST['date'];
        $fdate = date("Y-m-d", $date);
        $duree = $_POST['duree'];
        $motif = $_POST['motif'];
        try {$bdd = new PDO("mysql:host=localhost;dbname=reservation", "root", "");}
        catch (PDOException $e) { die('Erreur : ' . $e->getMessage());}

        $bdd->exec("INSERT INTO `reserve` (`nom_usager`, `nom_salle`, `date_de_reservation`, `duree`, `motif`) VALUES ('$usager', '$salle','$fdate', '$duree','$motif');");
        echo "données sauvegarder (reservation)";
        echo "<a href='accueil.html'>Retour à l'accueil</a>";
    }
}

?>
    
</body>
</html>