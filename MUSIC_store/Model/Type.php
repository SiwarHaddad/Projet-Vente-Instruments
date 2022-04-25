<?php
    require_once __DIR__ . "/Database.php";

    class TypeP{
        private $idType;
        private $libelle;

        public function __construct($tab = array()){
            foreach($tab as $k=>$v)
                $this->$k = $v;
        }

        public function get($attribut){
            return $this->$attribut;
        }

        public function set($attribut, $nvValeur){
            $this->$attribut = $nvValeur;
        }

        public static function all(){
            $requete = "SELECT * 
                        FROM typeP";
                        
            return Database::query($requete); 
        }
    

    }
?>

