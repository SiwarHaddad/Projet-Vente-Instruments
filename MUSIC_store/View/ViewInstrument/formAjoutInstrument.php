<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Instrument</title>
    <link rel="icon" type="image/png" href="Public/images/icon.png"/>
    <link rel="stylesheet" href="Public/css/test.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="Public/css/util.css">
	<link rel="stylesheet" type="text/css" href="Public/css/main.css">
</head>

<body>
    <div class="container_f"> 
        <form action="index.php?controller=Instrument&action=Save" method="post" enctype="multipart/form-data" >
            <h3>Ajout d'un instrument</h3><hr><br>

            <div class="form-group">
                <label for="libelleInstrument"><b>Libelle</b></label>
                <input type="text"  name="libelleInstrument" class="form-control" id="libelleInstrument" aria-describedby="emailHelp" placeholder="Libelle de l'instrument" required>
            </div><br/>
            
            <div class="form-group">
                <label for="descriptionInstrument"><b>Description</b></label>
                <textarea class="form-control" name="descriptionInstrument" id="descriptionInstrument" rows="3" placeholder="Description"></textarea>
            </div><br>
            
            <div class="form-group">
                <label for="categorieInstrument"><b> Catégorie</b></label>
                <select class="form-control" name="categorieInstrument" id="categorieInstrument">
                    <?php foreach($Categories as $categorie){ ?>
                        <option value="<?=$categorie["idCategorie"]?>"><?=$categorie["libelleCategorie"]?></option>
                    <?php } ?> 
                </select>
            </div><br>

            <div class="form-group">
                <label for="marqueInstrument"><b>Marque</b></label>
                <input type="text"  name="marqueInstrument" class="form-control" id="marqueInstrument" aria-describedby="emailHelp" placeholder="Marque de l'instrument" required>
            </div><br/>
            
            <div class="form-group">
                <label for="exampleFormControlFile1"><b>Image d'instrument</b></label><br/>
                <input type="file" name="choosefile" class="form-control-file" id="exampleFormControlFile1" required>
            </div><br/><br/>
            
            <div class="form-group">
                <label for="quantiteDispoInstrument"><b>Quantité disponible</b></label>
                <input type="number"  name="quantiteDispoInstrument" class="form-control" id="quantiteDispoInstrument" aria-describedby="emailHelp" placeholder="Quantité disponible" required>
            </div><br/>

            <div class="form-group">
                <label for="prixInstrument"><b>Prix</b></label>
                <input type="text"  name="prixInstrument" class="form-control" id="prixInstrument" aria-describedby="emailHelp" placeholder="Prix" required>
            </div><br/>

            <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                Ajouter 
            </button> 
        </form>
    </div> <br><br><br><br>
    <?php 
        include 'View/footer.php';
        /*include "scripts.php" */
    ?> 
</body>
</html>