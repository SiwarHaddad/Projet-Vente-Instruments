<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Clients </title>
</head>
<body>
    <table border>
        <tr>
            <td> email </td>
            <td> Nom </td>
            <td> Prénom </td>
            <td> Adresse </td>
            <td> Ville </td>
            <td> Rang </td>
            <td colspan="2"> </td>
        </tr>
        
        <?php foreach ($clients as $client){?>
        <tr>
            <td> <?=$client["emailClient"]?> </td>
            <td> <?=$client["nomClient"]?> </td>
            <td> <?=$client["prenomClient"]?> </td>
            <td> <?=$client["adresseClient"]?> </td>
            <td> <?=$client["villeClient"]?> </td>
            <td> <?=$client["rangClient"]?> </td>
            <td> <a href="index.php?Action=Edit&idClient=<?=$client["idClient"]?>"> Modifier </a></td>
            <td> <a href="index.php?Action=Delete&idClient=<?=$client["idClient"]?>"> Supprimer </a></td>
        </tr>
        <?php } ?>
    </table>
    
    <a href="index.php?Action=New">Ajouter client</a>
</body>
</html>