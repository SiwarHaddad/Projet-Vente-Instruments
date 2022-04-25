<?php 
    include 'View/header1.php';
	// var_dump($_SESSION);
?>

<div class="bg0 m-t-23 p-b-140">
		
<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				    <a href="index.php?controller=Instrument">
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if(!isset($_GET["categorieInstrument"])) echo "how-active1"; ?>" data-filter="*">
                            Tous les produits
                       </button>
                   	</a>

                    <?php foreach($Categories as $categorie){?>
						<a href="index.php?controller=Instrument&action=FindByCategorie&categorieInstrument=<?=$categorie["idCategorie"]?>">
							<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if(isset($_GET["categorieInstrument"]) && $_GET["categorieInstrument"]==$categorie["idCategorie"]) echo "how-active1"; ?>" data-filter=".<?=$categorie["libelleCategorie"]?>" >
						    	<?=$categorie["libelleCategorie"]?>
							</button>
						</a>
					<?php } ?>

				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<!-- <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div> -->

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						
                        <form action="index.php?controller=Instrument&action=search" method="post">
                            <input type="text" name="search" id="search" placeholder="Rechercher">
                        </form>
					</div>
				</div>
			</div>

            <?php
			 if(isset($_SESSION["Client"]) && $_SESSION["Client"]["rang"]){ ?>
				<a href="index.php?controller=Instrument&action=New">
					<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
						Ajouter un produit
					</button>   
				</a><br/><br/>
            <?php } ?>

            <div class="row isotope-grid">
                <?php foreach($instruments as $instrument){ ?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" >
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                           
                            <img src="public/images/instruments/<?=$instrument["imageInstrument"]?>" alt="IMG-PRODUCT">

                            <a href="index.php?controller=Instrument&action=FindById&idInstrument=<?=$instrument["idInstrument"]?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Details
                            </a>
                        </div>
                        
                        <?php 
						if(isset($_SESSION["Client"]) && $_SESSION["Client"]["rang"]){ ?>
							<div class="flex-r p-t-3">
								<a href="index.php?controller=Instrument&action=Edit&idInstrument=<?=$instrument["idInstrument"]?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart">
									<span class="iconify" data-icon="eva:edit-2-fill"></span>
								</a>
							
								<a href="index.php?controller=Instrument&action=Delete&idInstrument=<?=$instrument["idInstrument"]?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart">
									<span class="iconify" data-icon="fluent:delete-dismiss-20-filled"></span>
								</a>
							</div>
                        <?php } ?>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <div class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <?=str_replace('-',' ',$instrument["libelleInstrument"])?>
                                </div>
                                
                                <span class="stext-105 cl3">
                                    <?=$instrument["prixInstrument"]." TND"?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php 
	include 'View/footer.php';
	/*include "scripts.php" */
?>
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
