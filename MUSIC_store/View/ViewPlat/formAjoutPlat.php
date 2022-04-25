<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php?controller=plat&action=save" method="post">
         nom<input type="text" name="nom" id="nom"><br>
        prix<input type="text" name="prix" id="prix"> <br>
        type
        <select name="type" id="type">
        <?php foreach($type as $t){?>
            <option value="<?=$t["idType"]?>"><?=$t["libelle"]?></option>
        <?php } ?>
        </select>
        <input type="submit" value="ajouter">
    </form>
</body>
</html>