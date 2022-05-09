<?php
    require_once __DIR__ . "/Database.php";

    class Categorie{
        private $idCategorie;
        private $libelleCategorie;
        private $imgCategorie;

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
            $requete = "SELECT * FROM Categorie;";
            return Database::query($requete); 
        }

        public function find(){
            $requete = "SELECT * FROM Categorie WHERE idCategorie=:idCategorie;";
            $tabParam = array(":idCategorie" => $this->idCategorie);

            return Database::find($requete, $tabParam);
        }

        public function save(){
            $requete = "INSERT INTO `Categorie`(`libelleCategorie`, imgCategorie) 
                        VALUES (:libelleCategorie, :imgCategorie);";

            $tabParam = array(":libelleCategorie" => $this->libelleCategorie,
                              ":imgCategorie" => $this->imgCategorie
                        );

            return Database::execute($requete, $tabParam);
        }                 
        
        public function update(){
            $requete = "UPDATE `Categorie` 
                        SET `libelleCategorie`=:libelleCategorie, `imgCategorie`=:imgCategorie
                        WHERE idCategorie=:idCategorie;";

            $tabParam = array(":idCategorie" => $this->idCategorie,
                              ":libelleCategorie" => $this->libelleCategorie,
                              ":imgCategorie" => $this->imgCategorie
                        );
            return Database::execute($requete, $tabParam);
        }                 

        public function delete(){
            $requete = "DELETE FROM `Categorie` WHERE idCategorie=:idCategorie;";
            $tabParam = array(":idCategorie" => $this->idCategorie);

            return Database::execute($requete, $tabParam);
        }
    }
?>

