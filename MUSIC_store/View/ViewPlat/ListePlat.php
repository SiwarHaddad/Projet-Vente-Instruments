<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border>
    <tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Type</th>
        <th></th>
    </tr>
    
    <?php foreach($plats as $p){?>
        <tr>
            <td><?=$p["nom"]?></td>
            <td><?=$p["prix"]?></td>
            <td><?=$p["libelle"]?></td>
            <td><a href="index.php?controller=plat&action=delete&idPlat=<?=$p["idPlat"]?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>

    <a href="index.php?controller=plat&action=new">Ajouter Plat</a>
</body>
</html>