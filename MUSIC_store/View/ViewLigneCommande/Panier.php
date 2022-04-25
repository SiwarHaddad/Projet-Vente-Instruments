<?php
    include 'View/header1.php';
    $total=0;
?>
<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
                                
								<tr class="table_head">
									<th class="column-1">Produit</th>
									<th class="column-2"></th>
									<th class="column-2"></th>
									<th class="column-3" colspan="2">Prix</th>
									<th class="column-4">Quantite</th>
									<th class="column-5" >Total</th>
									<th class="column-2"></th>
								</tr>
                                <?php foreach($com as $c){ ?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="public/images/instruments/<?=$c["imageInstrument"]?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?=str_replace('-',' ',$c["libelleInstrument"])?></td>
									<td>&emsp;</td>
									<td class="column-3" colspan="2"><?=$c["prixInstrument"]." TND"?></td>
									<td class="column-4">
                                    	<div class="flex-w flex-r-m p-b-10">
											<div class="size-204 flex-w flex-m respon6-next">
												<div class="wrap-num-product flex-w m-r-20 m-tb-10">
													
												<input  type="text" value="<?=$c["quantite"]?>">

												</div>
											</div>
										</div>
									</td>
									<td class="column-5">   
                                        <?php 
                                            $total+=$c["prixInstrument"]*$c["quantite"]; 
                                            echo $c["prixInstrument"]*$c["quantite"].' TND';
                                        ?>
                                    </td>
                                    <td>
									<!-- <a href="index.php?controller=Lignecommande&action=Edit&idInstrument=<?=$c["idInstrument"]?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart">
										<span class="iconify" data-icon="eva:edit-2-fill"></span>
									</a> -->
									</td>
									<td>
										<a href="index.php?controller=lignecommande&action=Delete&idInstrument=<?=$c["idInstrument"]?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart">
											<span class="iconify" data-icon="fluent:delete-dismiss-20-filled"></span>
										</a>
									</td>
								</tr>
                                <?php } ?>
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">     
							<a href="index.php">
								<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Poursuivre l'achat
								</button>
                        	</a>  
							<!-- <a href="index.php?controller=Lignecommande&action=videPanier">
								<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									vider Panier
								</button>
                        	</a>   -->
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Totals Achat
						</h4>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?=$total.' TND'?>
								</span>
							</div>
						</div>
						<a href="index.php">
							<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								Passer la commande
							</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</form>
		

<?php 
	include 'View/footer.php';
	include 'Public/scripts.php';
	/*include "scripts.php" */
?>
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>