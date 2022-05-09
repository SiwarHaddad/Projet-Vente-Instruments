<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="icon" type="image/png" href="Public/images/icon.png"/>
    <link rel="stylesheet" href="Public/css/test.css"/>
    <link rel="stylesheet" type="text/css" href="Public/css/util.css">
	<link rel="stylesheet" type="text/css" href="Public/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        if(isset($_GET["message"])){ ?>
            <div class="alert alert-danger alert-dismissible fade show container_f"  role="alert">
                <strong><?=$_GET["message"]?></strong>
            </div>
    <?php } ?>
    <div class="container_f"> 
        <form action="index.php?controller=client&action=LogInn" method="post">
            <h3>Connexion</h3><hr><br>

            <div class="form-group">
                <label for="exampleInputEmail1"><b>Email</b></label>
                <input type="email"  name="emailClient" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="donner votre e-mail" required>
            </div><br/>
            
            <div class="form-group">
                <label for="exampleInputEmail1"><b>Mot de passe</b></label>
                <input type="password"  name="mdpClient" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="votre mot de passe" required>
            </div><br/>

            <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                Se  connecter
            </button> 
        </form>
        <br><a href="index.php?controller=client&action=new"></b>Creer un compte</b></a>
    </div>  <br><br><br><br><br><br>
    
    <?php 
        include 'View/footer.php';
        /*include "scripts.php" */
    ?>

    <!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Panier</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Mot de passe ou/et email invalide(s)	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
				<a href="index.php?controller=Client&action=login">
					<button type="button" class="btn btn-primary" >Se connecter</button>
				</a>
			</div>
		</div>
		</div>
	</div>
</body>
</html>
