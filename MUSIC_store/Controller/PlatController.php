<?php
    require_once __DIR__ . '/../Model/Plat.php';
    require_once __DIR__ . '/../Model/Type.php';

    class PlatController{
        public static function All(){
            $plats = Plat::all();
            // var_dump($plats);
            // die();
            require_once __DIR__ . '/../View/ViewPlat/listePlat.php';
        }

        public static function New(){   
            $Plat = Plat::all();
            $type = TypeP::all();

            require_once __DIR__ . '/../View/ViewPlat/formAjoutPlat.php';
        }
        
        public static function Save(){ 
            if(isset($_POST)){
                
                $P = new Plat($_POST);
                
                $r = $P->save();
            } 
            self::All();
        }
        
        public static function Delete(){ 
            if(isset($_GET['idPlat'])){
                $P = new Plat(array('idPlat'=>$_GET['idPlat']));
                $r = $P->delete();
            } 
            self::All();
        }

    }
?>