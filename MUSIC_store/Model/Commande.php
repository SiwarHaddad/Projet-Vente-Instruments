<?php
    require_once __DIR__ . "/Database.php";

    class Commande{
        private $numCommande;
        private $acteurCommande;
        private $dateCommande;
        private $totalPrixCommande;
        private $statusCommande;			
 
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
            $requete = "SELECT * FROM Commande;";
            return Database::query($requete); 
        }

        public function find(){
            $requete = "SELECT * FROM Commande ORDER BY dateCommande desc";
            return Database::find($requete);
        }

        public function save(){
            $requete = "INSERT INTO `Commande`(`acteurCommande`, `dateCommande`,
                                    `totalPrixCommande`, `statusCommande`) 
                        VALUES (:acteurCommande, :dateCommande, :totalPrixCommande,
                                :statusCommande);";

            $tabParam = array(":acteurCommande" => $this->acteurCommande,
                              ":dateCommande" => $this->dateCommande, 
                              ":totalPrixCommande" => $this->totalPrixCommande, 
                              ":statusCommande" => $this->statusCommande, 
                        );

            return Database::execute($requete, $tabParam);
        }                 
        
        public function update(){
            $requete = "UPDATE `Commande` 
                        SET `acteurCommande`=:acteurCommande, `dateCommande`=:dateCommande,
                            `totalPrixCommande`=:totalPrixCommande, `statusCommande`=:statusCommande
                        WHERE numCommande=:numCommande;";

            $tabParam = array(":numCommande" => $this->numCommande,
                              ":acteurCommande" => $this->acteurCommande,
                              ":dateCommande" => $this->dateCommande, 
                              ":totalPrixCommande" => $this->totalPrixCommande, 
                              ":statusCommande" => $this->statusCommande, 
                        );
            return Database::execute($requete, $tabParam);
        }                 

        public function delete(){
            $requete = "DELETE FROM `Commande` WHERE numCommande=:numCommande;";
            $tabParam = array(":numCommande" => $this->numCommande);

            return Database::execute($requete, $tabParam);
        }
    }
?>

