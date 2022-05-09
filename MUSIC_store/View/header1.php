<?php
	if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Public/images/icon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Public/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Public/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Public/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Public/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Public/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="Public/vendor/animsition/css/animsition.min.css"> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Public/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Public/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Public/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Public/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Public/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Public/css/util.css">
	<link rel="stylesheet" type="text/css" href="Public/css/main.css">
<!--===============================================================================================-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--===============================================================================================-->

</head>

<body class="animsition">	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container" >
					
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1" style="top: 0;">
				<nav class="limiter-menu-desktop container">	
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="public/images/musicStore.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="index.php?controller=Instrument">Produits</a>
							</li>

							<li>
								<a>Compte</a>
								<ul class="sub-menu">
									<?php if(!isset($_SESSION["Client"])){ ?>
										<li><a href="index.php?controller=Client&action=New">S'inscrire</a></li>
										<li><a href="index.php?controller=Client&action=LogIn">Se connecter</a></li>
									<?php } else{ ?>
										<!-- <li><a href="index.php?controller=Client&action=Edit&idClient=<?=$_SESSION["Client"]["id"]?>">Modifier le compte</a></li> -->
										<li><a href="index.php?controller=Client&action=Delete&idClient=<?=$_SESSION["Client"]["id"]?>">Supprimer le compte</a></li>
										<li><a href="index.php?controller=Client&action=Disconnect">Se déconnecter</a></li>
									<?php } ?>
								</ul>
							</li>

							<li>
								<a href="#">A propos</a>
							</li>

							<li>
								<a href="#">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<?php  if(isset($_SESSION["Client"])){ ?>
							<a href="index.php?controller=Lignecommande&action=Find" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php if(isset($_SESSION["panier"])) echo count($_SESSION["panier"][array_keys($_SESSION["panier"])[0]]); else echo 0;?>">
								<i class="zmdi zmdi-shopping-cart"></i>
							</a>
						<?php } else{ ?>
							<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
								<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php if(isset($_SESSION["panier"])) echo count($_SESSION["panier"][array_keys($_SESSION["panier"])[0]]); else echo 0;?>">
									<i class="zmdi zmdi-shopping-cart"></i>
							</div>
							</button>
						<?php } ?>

						<!-- <a href="index.php?controlller=&action=favori" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a> -->
					</div>
				</nav>
			</div>	
		</div>
	</header>

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
				Connectez-vous pour avoir acces au panier et y ajouter des produits	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<a href="index.php?controller=Client&action=login">
					<button type="button" class="btn btn-primary" >Se connecter</button>
				</a>
			</div>
		</div>
		</div>
	</div>