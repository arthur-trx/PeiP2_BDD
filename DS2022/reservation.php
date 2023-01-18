<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <table border="5" width="100%">
        <tr>
            <td width="410px"><image src="poly.png"/></td>
            <td><h2 class="titre">Polytech Orléans - Université d'Orléans</h2></td>
        </tr>
    </table>

    <br>
    <h2> Afin de procéder à la reservation, merci de remplir les informations suivantes :</h2>
    <?php
    echo "<form method='post' action='ajout.php'>
        <table margin='10px'>
            <tr>
                <td><b>usager demandant la reservation: </td>
                <td><select nom='usager'>";

    try {$bdd = new PDO("mysql:host=localhost;dbname=reservation", "root", "");}
    catch (PDOException $e) { die('Erreur : ' . $e->getMessage());}
            
    $get_data = $bdd->query("SELECT * FROM usager;");
    $forme_data = $get_data->setFetchMode(PDO::FETCH_NUM);
    $i = 0;
    while ($data = $get_data->fetch()){
        echo "<option  value='$data[0]'>".$data[1]."  ".  $data[2]." </option>";
        $i += 1;
    }
    echo "</td><td><a href='ajout_usager.php'>Crée un nouvelle usager</a></td></tr><tr><td><b>Date souhaitée : </b></td><td><input type='date' nom='date'></td></tr>";
    echo "<tr>
        <td><b>Salle souhaitée: </b> </td>
        <td><select nom='salle'>";
    $get_data_salle = $bdd->query("SELECT * FROM salle;");
    $forme_data_salle = $get_data_salle->setFetchMode(PDO::FETCH_NUM);
    $i = 0;
    while ($data_salle = $get_data_salle->fetch()){
        echo "<option  value='$data_salle[0]'>".$data_salle[1]." (".  $data_salle[2].") - ".$data_salle[3]. "p </option>";
        $i += 1;
    }
    echo "/td></tr>";
    echo "<tr><td><b>Durée souhaitée (en minutes) :</b></td><td> <input type='text' name='duree'</td></tr>";
    echo "<tr><td><b>Motif de la reservation :</b></td><td> <textarea type='text' name='motif' cols='20' rows='4'></textarea></td></tr>";
    echo "<tr><td></td><td> <input type='submit' value='Réserver'/></td></tr></table></form>";
    
    ?>


    
</body>
</html>