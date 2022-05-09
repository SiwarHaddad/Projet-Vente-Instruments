<?php
    require_once __DIR__ . "/Database.php";

    class ligneCommande{
        private $numCommande;
        private $idInstrument;
        private $quantite;		

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

        
        public function find(){
            $requete = "SELECT numCommande,Instrument.idInstrument,prixInstrument, libelleInstrument,quantite,
                                imageInstrument,quantiteDispoInstrument
                        FROM LigneCommande,instrument 
                        where numCommande=:numCommande
                            and LigneCommande.idInstrument=Instrument.idInstrument";
            $tabParam = array(":numCommande" => $this->numCommande);

            return Database::query($requete,$tabParam);
        }

        // public function findPanier(){
        //     $requete = "SELECT numCommande,idInstrument,quantite
        //                 FROM LigneCommande
        //                 where numCommande=:numCommande,
        //                     and    idInstrument=:idInstrument";
                             
        //     $tabParam = array(":numCommande" => $this->numCommande,
        //                        ":idInstrument" => $this->idInstrument);

        //     return Database::query($requete,$tabParam);
        // }
        public function save(){
            $requete = "INSERT INTO `LigneCommande`(`numCommande`, `idInstrument`,
                                    `quantite`) 
                        VALUES (:numCommande, :idInstrument, :quantite);";

            $tabParam = array(":numCommande" => $this->numCommande,
                              ":idInstrument" => $this->idInstrument, 
                              ":quantite" => $this->quantite
                        );

            return Database::execute($requete, $tabParam);
        }                 
        
        public function update(){
            $requete = "UPDATE `LigneCommande` 
                        SET `quantite`=:quantite
                        WHERE numCommande=:numCommande
                            And idInstrument=:idInstrument;";

            $tabParam = array(":numCommande" => $this->numCommande,
                              ":idInstrument" => $this->idInstrument,
                              ":quantite" => $this->quantite
                        );
            return Database::execute($requete, $tabParam);
        }                 

        public function delete(){
            $requete = "DELETE FROM `LigneCommande` WHERE numCommande=:numCommande and idInstrument=:idInstrument;";
            $tabParam = array(":numCommande" => $this->numCommande,
                                ":idInstrument" => $this->idInstrument);

            return Database::execute($requete, $tabParam);
        }
    }
?>

