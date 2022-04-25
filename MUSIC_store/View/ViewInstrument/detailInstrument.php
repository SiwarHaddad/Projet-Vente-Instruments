<?php 
    include 'View/header1.php';
?>


<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                       
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            <div class="wrap-pic-w pos-relative">
                                <img src="public/images/instruments/<?=$instrument["imageInstrument"]?>" alt="IMG-PRODUCT">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        <?=str_replace('-',' ',$instrument["libelleInstrument"])?>
                    </h4>

                    <span class="mtext-106 cl2">
                        <?=$instrument["prixInstrument"].' TND'?>
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        <b>Marque: </b><?=$instrument["marqueInstrument"]?>
                    </p>

                    <p class="stext-102 cl3 p-t-23">
                        <?=$instrument["descriptionInstrument"]?>
                    </p>
                    
                    <!--  -->
                    <div class="p-t-20">
                        <form action="index.php?controller=ligneCommande&action=save&idInstrument=<?=$instrument["idInstrument"]?>" method="post">
                            
                            <div class="size-204 flex-w flex-m respon6-next">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-1">
                                    <input  type="number" name="num-product" value="1" min="1" max="<?=$instrument["quantiteDispoInstrument"]?>">
                                </div>
                            </div><br>
                   
                            <?php 
                                if(isset($_SESSION["Client"])){ ?>
                                    <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Ajouter au panier
                                    </button>
						    <?php } 
                                else{ ?>
                                    <button type="button" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                        Ajouter au panier
                                    </button>
                            <?php } ?>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
    
        <span class="stext-107 cl6 p-lr-25">
            Categorie: <?=$instrument["libelleCategorie"]?>
        </span>
    </div>

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

    <?php
        include 'View/footer.php';
        //include 'scripts.php' 
    ?>
</section>