<?php
    
    require_once __DIR__ . '/../Model/Commande.php';
    require_once __DIR__ . '/../Model/Instrument.php';

    class CommandeController{
        public static function All(){
            $Commandes = Commande::all();
            require_once __DIR__ . '/../View/ViewCommande/listeCommande.php';
        }
        
        public static function Save(){ 
            //if(isset($_POST['nom'],$_POST['nbEtoile'],$_POST['image'],$_POST['ville'],$_POST['description'])){
                session_start(); die();
                $C = new Commande(array("acteurCommande"=>$_SESSION["client"]["id"],
                                        "dateCommande"=>now(),
                                        "totalPrix"=>0,
                                        "statusCommande"=>"En preparation"));
               
                $r = $C->save();
                $C = $C->find();
                $_SESSION["panier"]["numc"] = $C->get("numCommande");
                //} 
            
        }
        
        public static function Delete(){ 
            if(isset($_GET['numCommande'])){
                $C = new Commande(array('numCommande'=>$_GET['numCommande']));
                $r = $C->delete();
            } 
            self::All();
        }
        
        public static function Edit(){ 
            if(isset($_GET['numCommande'])){
                $C = new Commande(array('numCommande'=>$_GET['numCommande']));
                $Commande = $C->find(); 
                require_once __DIR__ . '/../View/ViewCommande/formModifCommande.php';
            } 
            else
                self::All();
        }
        
        public static function Update(){ 
            //if(isset($_POST['num'],$_POST['nom'],$_POST['nbEtoile'],$_POST['image'],$_POST['ville'],$_POST['description'])){
                $C = new Commande(array_merge($_POST,array('numCommande'=>$_GET['numCommande'])));
                $r = $C->update(); 
            //} 
            self::All();
        }
    }
?>