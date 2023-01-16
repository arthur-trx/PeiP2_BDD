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
    if (isset($_POST["action"]))
    {
        if ($_POST["action"] ==0)
        {
 
            try {
                $bdd = new PDO("mysql:host=localhost;dbname=repertoire", "root", "");
            }
            catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            $id = $_POST['num_pers'];
            $reponse_individu = $bdd->query("SELECT * FROM personne WHERE num_personne=$id ");
            $result_individu = $reponse_individu->setFetchMode(PDO::FETCH_NUM);
            $ligne = $reponse_individu->fetch();
            /*$reponse_lien = $bdd->query("SELECT * FROM personne_a_telephone WHERE num_personne=$id ");
            $result_lien = $reponse_lien->setFetchMode(PDO::FETCH_NUM);
            $ligne_lien = $reponse_lien->fetch();
            $reponse_telephone = $bdd->query("SELECT * FROM telephone WHERE num_personne=$ligne_lien[1] ");
            $result_lien = $reponse_lien->setFetchMode(PDO::FETCH_NUM);
            $ligne_lien = $reponse_lien->fetch();*/
        echo "<form action='ajout.php' method='post'>
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
                        <input type='text' name='naissance' value= " . date("d-m-Y", strtotime($ligne[3])) . " minlength='4' require>
                    </td>
                    <td> 
                        <p>         (jj-mm-aaaa) :</p>
                    </td>
                </tr>
            </table>
            <br>
            <h3>Téléphonne : </h3>
            <br>";

        $reponse_telephone = $bdd->query("SELECT telephone.numero, telephone.type FROM personne_a_telephone left outer join telephone on personne_a_telephone.num_telephone=telephone.num_telephone where num_personne=$id");
        
            while ($ligne_telephone = $reponse_telephone->fetch()) {
                echo "<table>";
                echo "<tr> <td >$ligne_telephone[0]</td> <td> <SELECT name='type' size='1'>";
                echo "<OPTION value='1' ";
                if ($ligne_telephone[1] == 1) {
                    echo "selected ";
                }
                echo ">fixe prof";
                echo "<OPTION value='2' ";
                if ($ligne_telephone[1] == 2) {
                    echo "selected ";
                }
                echo ">fixe perso";
                echo "<OPTION value='3' ";
                if ($ligne_telephone[1] == 3) {
                    echo "selected ";
                }
                echo ">mobile prof";
                echo "<OPTION value='4' ";
                if ($ligne_telephone[1] == 4) {
                    echo "selected ";
                }
                echo ">mobile perso";
                echo "</SELECT></td></tr>";
                
            }
            echo "<tr><td ><input type='hidden' name='num_pers' value=$id></td></tr>
                <tr> <td>nouveau téléphone : </td><td > <input type='text' value='' size='15' name='newtel'/> </td>
                    <td> <SELECT name='type_newtel' size='1'>
                        <OPTION>fixe prof
                        <OPTION>fixe perso
                        <OPTION>mobile prof
                        <OPTION>mobile perso
                    </SELECT>
                    </td>
                    <td><input type='submit' value='ajouter numero'/></td>
                </tr>";
 
        }
    }
    else {
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=repertoire", "root", "");
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $id = $_POST['num_pers'];
        $reponse_individu = $bdd->query("SELECT * FROM personne WHERE num_personne=$id ");
        $result_indi = $reponse_individu->setFetchMode(PDO::FETCH_NUM);
        $ligne = $reponse_individu->fetch();


    echo "
    <form action='ajout.php' method='post'>
    <h3>Etat civil : </h3>
<table>
    <tr>
        <td>
            <p>Nom :</p>
        </td>
        <td>
            <input type='text' name='nom' minlength='4' require>
        </td>
        <td> 
            <p>Prénom :</p>
        </td>
        <td>
            <input type='text' name='prenom'minlength='4' require>
        </td> 
    </tr>
</table>
<table>
    <tr>
        <td>
            <p>date de naissance :</p>
        </td>
        <td>
            <input type='text' name='naissance' minlength='4' require>
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
    

    }
?>


<!-- <a href="index.html"> Nouvelle recherche</a>  -->

</form>
</html>
