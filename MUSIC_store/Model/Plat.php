<?php
    require_once __DIR__ . "/Database.php";

    class Plat{
        private $idPlat;
        private $nom;
        private $prix;
        private $type;

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
                        FROM plat,typeP
                        where plat.type=typeP.idType;";
                        
            return Database::query($requete); 
        }
        
        public function find(){
            $requete = "SELECT * FROM plat WHERE idPlat=:idPlat";
            $tabParam = array(":idPlat" => $this->idPlat);

            return Database::find($requete, $tabParam);
        }

        public function save(){
            $requete = "INSERT INTO `plat`(nom,prix,type) 
                        VALUES (:nom, :prix, :type);";

            $tabParam = array(":nom" => $this->nom,
                              ":prix" => $this->prix,
                              ":type" => $this->type
                            );

            return Database::execute($requete, $tabParam);
        }               

                     

        public function delete(){
            $requete = "DELETE FROM plat WHERE idPlat=:idPlat;";
            $tabParam = array(":idPlat" => $this->idPlat);

            return Database::execute($requete, $tabParam);
        }
    }
?>

