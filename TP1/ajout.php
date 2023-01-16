<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout</title>
</head>
<body>
<body background="./gris_002.jpg">
<?php
$int = 10;
try {
    $bdd = new PDO("mysql:host=localhost;dbname=repertoire", "root", "");
}
    //On traite le cas où une erreur se produirait
    catch (Exception $e) { die('Erreur : ' . $e->getMessage()); }
    //on ajoute un contact
    if (isset($_POST["nom"]) && isset($_POST["prenom"]) ) {// on a les elements minimaux pour creer le contact
        echo 'nom + prenom ok';
        $nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
    }
    if (isset($_POST["naissance"]))
    {
        echo 'date de naissance ok';
        $naissance=$_POST["naissance"];
        $formatted_date=date("Y-m-d", strtotime($naissance));
        $bdd->exec("INSERT INTO `personne` (`nom`, `prenom`, `date_de_naissance`) VALUES ('$nom', '$prenom', '$formatted_date');");
    }
    else {
        $bdd->exec("INSERT INTO `personne`( `nom`, `prenom`, `date_de_naissance`) VALUES ('$nom', '$prenom', 'NULL');");
    }
    echo " <H2>Ces donnéees ont été ajoutées à la base de données personne ";
    $ID_personne=$bdd->lastInsertId();
if (isset($_POST["premier_tel"])) {
    $premier_tel = $_POST["premier_tel"];
    $type = $_POST["type"];
    $bdd->exec("INSERT INTO `telephone`(`numero`, `type`) values('$premier_tel','$type');");
    $ID_telephone = $bdd->lastInsertId();
    $bdd->exec("INSERT INTO `personne_a_telephone`(`num_personne`, `num_telephone`) values('$ID_personne', '$ID_telephone');");

    echo " <H2>Ces donnéees ont été ajoutées à la base de données (telephone + lien) ";
    // on crée un form contenant l'identifiant du contact nouvellement crée, ainsi que le champ caché action =0 pour le preremplissage des champs sur la page personne.php
     echo "<form id='myForm' action='personne.php' method='post'>";
    echo '<input type="hidden" name="num_pers" value="'.$ID_personne.'">';
    echo '<input type="hidden" name="action" value="0">';
    echo "</form>";
    // on valide automatiquement ce formulaire sans intervention de l'utilisateur via la commande submit du langage Javascript qui est exécuter sur l'ordinateur client
    echo"<script type='text/javascript'> document.getElementById('myForm').submit();</script>";
}

else{
        echo " Ajout impossible, vous devez au moins renseigner le nom et le prenom du contact.";
    }
        ?>
    </body>
</html>
