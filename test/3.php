<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2> Liste des personnes trouvé</h2>

<?php
$nom=$_POST["name"];
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test', "root", "");
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query("SELECT * FROM personne WHERE nom LIKE '%$nom%'");
$result = $reponse->setFetchMode(PDO::FETCH_NUM);

$i = 0;
while ($ligne = $reponse->fetch()) {
    echo "
    <form name='pers" . $i . "' action ='persone.php' method='post'>
    <input type='hidden' name='action' value=$action >
    <input align='center' border = 1>   ";
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