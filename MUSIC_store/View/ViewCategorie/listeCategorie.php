<?php
	include 'View/header1.php';
	// session_start();
?>

<div class="sec-banner bg0 p-t-80 p-b-50">
	<div class="container">
		<div class="row">
			<?php foreach($Categories as $categorie){ ?>	
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<div class="block1 wrap-pic-w">
						<img src="public/images/categories/<?=$categorie["imgCategorie"]?>" alt="<?=$categorie["imgCategorie"]?>">
						<a href="index.php?controller=Instrument&action=FindByCategorie&categorieInstrument=<?=$categorie["idCategorie"]?>&libelleCategorie=<?=$categorie["libelleCategorie"]?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?=$categorie["libelleCategorie"]?>
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Consulter
								</div>
							</div>
						</a>
						<div class="flex-r p-t-3">
						<?php
							if(isset($_SESSION["Client"]) && $_SESSION["Client"]["rang"]){ ?>
                            <a href="index.php?action=Edit&idCategorie=<?=$categorie["idCategorie"]?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart">
                                <span class="iconify" data-icon="eva:edit-2-fill"></span>
                            </a>
                        
                            <a href="index.php?action=Delete&idCategorie=<?=$categorie["idCategorie"]?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart">
                                <span class="iconify" data-icon="fluent:delete-dismiss-20-filled"></span>
                            </a>
							<?php } ?>
                        </div>
					</div>
				</div>
			<?php }
				if(isset($_SESSION["Client"]) && $_SESSION["Client"]["rang"]){ ?>
				<a href="index.php?action=New">
					<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
						Ajouter une categorie
					</button>   
				</a><br/><br/>
            <?php  } ?>
		</div>
	</div>
</div>

<?php 
	include 'View/footer.php';
	/*include "scripts.php" */
?>

<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>