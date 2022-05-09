<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Catégorie</title>
    <link rel="icon" type="image/png" href="Public/images/icon.png"/>
    <link rel="stylesheet" href="Public/css/test.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="Public/css/util.css">
	<link rel="stylesheet" type="text/css" href="Public/css/main.css">
</head>

<body>
    <div class="container_f"> 
        <form action="index.php?action=Update&idCategorie=<?=$_GET["idCategorie"]?>" method="post" enctype="multipart/form-data" >
            <h3>Modification d'une categorie</h3><hr><br>

            <div class="form-group">
                <label for="exampleInputEmail1"><b>Libelle</b></label>
                <input type="text"  name="libelleCategorie" class="form-control" id="exampleInputEmail1" value="<?=$Categorie["libelleCategorie"]?>" "aria-describedby="emailHelp" placeholder="donner un libelle pour votre categorie" required>
            </div><br/>

            
            
            <div class="form-group">
                <label for="exampleFormControlFile1"><b>Image de categorie</b></label>
                
                <div class="block1 wrap-pic-w" style="width:50%;margin:auto 0">
                    <img src="public/images/categories/<?=$Categorie["imgCategorie"]?>"  alt="<?=$Categorie["imgCategorie"]?>">
                </div><br>
                
                <input type="hidden" name="imgCategorie" value="<?=$Categorie["imgCategorie"]?>">
                <input type="file" name="choosefile" class="form-control-file" id="exampleFormControlFile1" >
            </div><br/><br/>

            <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                Modifier
            </button> 
        </form>
    </div> <br><br><br><br>  

    <?php 
        include 'View/footer.php';
        /*include "scripts.php" */
    ?>
</body>
</html>