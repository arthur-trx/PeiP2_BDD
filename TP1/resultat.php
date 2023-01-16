<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8_unicode_ci">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resultat</title>
</head>
<body>
    <h2> Liste des personnes trouvé</h2>

    <?php
    $nom=$_POST["nom"];
    $action=$_POST["action"];
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=repertoire", "root", '');
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $reponse = $bdd->query("SELECT * FROM personne WHERE nom LIKE '%$nom%'");
    $result = $reponse->setFetchMode(PDO::FETCH_NUM);

    $i = 0;
    while ($ligne = $reponse->fetch()) {
        echo "
        <form name='pers" . $i . "' action ='personne.php' method='post'>
        <input type='hidden' name='action' value=$action >
        <table align='center' border = 1>   ";
        echo " <tr>
            <td ><input type='hidden' name='num_pers' value=$ligne[0]>
            $ligne[1] $ligne[2] </td>
            <td align='center'> <input type='submit' value='sélectionner'/> </td>
            </tr> ";
        echo " </table> </form>";
        echo "<br>";
        $i = $i + 1;
    }


    
    ?>

</body>
</html>