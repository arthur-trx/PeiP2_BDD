<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <table width="100%" border="10">
        <thead>
        <tr>
            <th colspan="1">
            <image src="poly.png" class="image" />
            </th>
            <th colspan="3">
                <h2 class="bleu">Polytech Orléans - Université d'Orléans</h2>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> <image src="cpp.jpg" class="image" /></td>
            <td> <image src="c.png" class="image" /></td>
            <td> <image src="php.png" class="image" /></td>
            <td> <image src="mysql.png" class="image" /></td>
        </tr>
        <tr>
            <td colspan="4" class="aligne"> <b>Programmation avancée  </b></td>
        </tr>
        </tbody>

    </table>

    <form method="post" action="save.php">
    <?php
    echo "<table> <tr> <td>Nom de l'éléve : </td>";
    echo "<td><select name ='eleve'>";

    try {$bdd = new PDO("mysql:host=localhost;dbname=prog_avance", "root", "");}
    catch (PDOException $e) { die('Erreur : ' . $e->getMessage());}

    $get_data = $bdd->query("SELECT * FROM eleve;");
    $forme_data = $get_data->setFetchMode(PDO::FETCH_NUM);

    $i = 0;
    while ($data = $get_data->fetch()){
        echo "<option  value='$data[0]'>".$data[1]."  ".  $data[2]." </option>";
        $i += 1;
    
    }
    echo "</select>";
    echo "</td></tr><tr><td>";
    echo "Partie de l'UE évaluée :</td>";
    echo "<td> <select name='UE'>";
    echo " <option value='Cpp'>C++</option>";
    echo " <option value='Cs'>C #</option>";
    echo " <option value='php'>php</option>";
    echo " <option value='sql'>sql</option>";
    echo "</select></td></tr>"
    ?>
    <tr>
        <td>Notes :</td>
        <td><input type="text" name="note"></td>
    </tr>
    <tr>
        <td>Coefficient:</td>
        <td><input type="text" name="coefficient"></td>
    </tr>
    <br>
    <input type="submit" value="Attribuer cette note">
</form>
    
</body>
</html>