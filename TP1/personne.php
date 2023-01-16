<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter</title>
</head>
<body>
    <?php 
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=repertoire", "root", "");
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $id = $_POST['num_pers'];
        $reponse = $bdd->query("SELECT * FROM personne WHERE id=$id ");
        $result = $reponse->setFetchMode(PDO::FETCH_NUM);
        $ligne = $reponse->fetch();

    echo "
    <form action='ajout.php' method='post'>
    <h3>Etat civil : </h3>
<table>
    <tr>
        <td>
            <p>Nom :</p>
        </td>
        <td>
            <input type='text' name='nom' value=$ligne[1] minlength='4' require>
        </td>
        <td> 
            <p>Prénom :</p>
        </td>
        <td>
            <input type='text' name='prenom'value=$ligne[2] minlength='4' require>
        </td> 
    </tr>
</table>
<table>
    <tr>
        <td>
            <p>date de naissance :</p>
        </td>
        <td>
            <input type='text' name='naissance' value= $ligne[2] minlength='4' require>
        </td>
        <td> 
            <p>         (jj-mm-aaaa) :</p>
        </td>

    </tr>
</table>
<h3>Téléphonne : </h3>
<br><br>
<table>
    <tr>
        <td>
            <p>téléphonne:</p>
        </td>
        <td>
            <input type='text' name='premier_tel' minlength='4' require>
        </td>
        <td>
            <p> type </p>
        </td>
        <td> 
           <select name='type' id='type' require>
            <option value='PrF'>Pro Fixe</option>
            <option value='PrM'>Pro Mobile</option>
            <option value='PeF'>Perso Fixe</option>
            <option value='PeM'>Perso Mobile</option>
           </select>
        </td>

    </tr>
</table>
<input type='submit' value='Valider Contact'>
</form>
    
    ";
    
    ?>


<br><br>
<a href="index.html">Nouvelle recherche</a>

</form>
</html>
