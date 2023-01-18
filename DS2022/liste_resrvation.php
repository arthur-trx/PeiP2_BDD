<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<table border="5" width="100%">
        <tr>
            <td width="410px"><image src="poly.png"/></td>
            <td><h2 class="titre">Polytech Orléans - Université d'Orléans</h2></td>
        </tr>
    </table>
    <?php 
    if (isset($_POST['date'])){
        $date = $_POST['date'];
        $fdate = date("Y-m-d", $date);
        echo "Voici la liste des reservations déja réaliser pour le". $fdate;
        try {$bdd = new PDO("mysql:host=localhost;dbname=reservation", "root", "");}
        catch (PDOException $e) { die('Erreur : ' . $e->getMessage());}
                
        $get_data = $bdd->query("SELECT * FROM reserve WHERE date_de_reservation = $fdate;");
        $forme_data = $get_data->setFetchMode(PDO::FETCH_NUM);
        $i = 0;
        while ($data = $get_data->fetch()){
            $nom = $bdd->query("SELECT *  FROM usager WHERE num_usager='$data[0]';");
            $type = $nom->setFetchMode(PDO::FETCH_NUM);
            $d = $nom->fetch();
            echo "<table><tr> <td>usager demandant la reservation: </td><td>$d[1] $d[2] </td></tr>
            <tr><td>Date souhaitée : </td><td>$data[2]</td></tr>
            <tr><td>Salle souhaitée: </td><td>$data[1]</td></tr>";
            $i += 1;
        }


    }
    ?>
    
    
</body>
</html>