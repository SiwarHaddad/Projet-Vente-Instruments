<?php
    require_once __DIR__ . '/../Model/LigneCommande.php';
    require_once __DIR__ . '/../Model/Commande.php';
    require_once __DIR__ . '/../Model/Instrument.php';
    require_once __DIR__ . '/../Controller/InstrumentController.php';
    require_once __DIR__ . '/../Model/SessionClient.php';

    class LigneCommandeController{
        public static function Save(){ 
            session_start();

            if(!isset($_SESSION["panier"])){
                $C = new Commande(array("acteurCommande"=>$_SESSION["Client"]["id"],
                "dateCommande"=>date("y-m-d h:i:s"),
                "totalPrixCommande"=>0,
                "statusCommande"=>"En preparation"));
                
                $r = $C->save();
                
                $Co = $C->find();
                // var_dump($Co);
                $C = new Commande($Co);
                $numC = $C->get("numCommande");
                $_SESSION["panier"]=array($numC => array());
            }
            var_dump($_SESSION);
            $key = array_keys($_SESSION["panier"])[0];

            $L = new LigneCommande(array("numCommande"=>$key,
                                        "idInstrument"=>$_GET["idInstrument"],
                                        "quantite"=>$_POST["num-product"]));
            
            $r = $L->save();
            if($r)
                //if(!(in_array($_GET["idInstrument"],$_SESSION["panier"][$key])))
                    $_SESSION["panier"][$key][]=$_GET["idInstrument"];
                // else{
                    
                //     self::update();
                    
                // }
                    
            //} 
       header("location:index.php?controller=Instrument");
        }
        
        public static function Find(){ 
                
            session_start();

            if(isset($_SESSION["panier"])){
                $L = new LigneCommande(array("numCommande" => array_keys($_SESSION["panier"])[0]));
                $com = $L->find();
                // var_dump($com);
            
                require_once __DIR__ . '/../View/ViewLigneCommande/Panier.php';
            }
        }

        public static function Delete(){ 
            session_start();
               
            if(isset($_GET['idInstrument'])){
                if(isset($_SESSION["panier"])){
                    $L = new LigneCommande(array('idInstrument'=>$_GET['idInstrument'],
                                                 "numCommande"=>array_keys($_SESSION["panier"])[0]));

                    // var_dump($L);
                     $r = $L->delete(); 
                    // echo $r;              
                    $key = array_keys($_SESSION["panier"])[0];
                    $indexKey = array_search($_GET["idInstrument"],$_SESSION["panier"][$key]);
                    echo $indexKey;
                    unset($_SESSION["panier"][$key][$indexKey]); 
                } 
            }
            InstrumentController::All();
        }
        
        public static function viderPanier(){ 
            session_start();
            
                if(isset($_SESSION["panier"])){
                    $L = new LigneCommande(array('idInstrument'=>$_GET['idInstrument'],
                                                 "numCommande"=>array_keys($_SESSION["panier"])[0]));

                    var_dump($L);
                     $r = $L->delete(); 
                    // echo $r;              
                    $key = array_keys($_SESSION["panier"])[0];
                    $indexKey = array_search($_GET["idInstrument"],$_SESSION["panier"][$key]);
                    echo $indexKey;
                    unset($_SESSION["panier"][$key][$indexKey])  ; 
                } 
            
            InstrumentController::All();
        }
        
       
        public static function Update(){ 
         //if(isset($_POST['id'],$_POST['nom'],$_POST['nbEtoile'],$_POST['image'],$_POST['ville'],$_POST['description'])){
                
                    $L = new LigneCommande(array_merge($_POST,array('idInstrument'=>$_GET["idInstrument"],"numCommande"=>array_keys($_SESSION["panier"])[0])));
                    $r = $L->update(); 
                
            //} 
            require_once __DIR__ . '/../View/ViewLigneCommande/Panier.php';
        }
    }
?>