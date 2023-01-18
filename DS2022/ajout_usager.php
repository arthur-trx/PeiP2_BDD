<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle usager</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <table border="5" width="100%">
        <tr>
            <td width="410px"><image src="poly.png"/></td>
            <td><h2 class="titre">Polytech Orléans - Université d'Orléans</h2></td>
        </tr>
    </table>

    <h2>Afin de créer un nouvelle usager merci de remplir les informations suibvantes : </h2>
    <form method="post" action="ajouter.php">
        <input type="hidden" name="action" value="0">
        <table margin='10px'>
            <tr>
                <td><b>nom de l'usager: </td>
                <td><input type="text" nom='nom'></td>
            </tr> 
            <tr>
                <td><b>prenom de l'usager: </td>
                <td><input type="text" nom='prenom'></td>
            </tr> 
        </table>
        <input type="submit" value="créer">
    </form>
</body>
</html>