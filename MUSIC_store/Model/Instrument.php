<?php
    require_once __DIR__ . "/Database.php";
    require_once __DIR__ . "/Categorie.php";

    class instrument{
        private $idInstrument;
        private $libelleInstrument;
        private $descriptionInstrument;
        private $categorieInstrument;
        private $marqueInstrument;
        private $imageInstrument;
        private $quantiteDispoInstrument;
        private $prixInstrument;

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
            $requete = "SELECT * FROM instrument;";
            return Database::query($requete); 
        }

        public function findById(){
            $requete = "SELECT idInstrument, `libelleInstrument`, `descriptionInstrument`,libelleCategorie,
                                `categorieInstrument`, `marqueInstrument`, imageInstrument,
                                `quantiteDispoInstrument`, prixInstrument
                        FROM instrument, categorie
                        WHERE idInstrument=:idInstrument
                            AND categorieInstrument=idCategorie;";
            $tabParam = array(":idInstrument" => $this->idInstrument);

            return Database::find($requete, $tabParam);
        }

        public function findByCategorie(){
            $requete = "SELECT idInstrument, `libelleInstrument`, `descriptionInstrument`,
                                `categorieInstrument`, `marqueInstrument`, imageInstrument,
                                `quantiteDispoInstrument`, `prixInstrument`,
                                libelleCategorie
                        FROM instrument,categorie
                        WHERE categorieInstrument=:categorieInstrument
                            AND categorieInstrument=idCategorie;";
            $tabParam = array(":categorieInstrument" => $this->categorieInstrument);

            return Database::query($requete, $tabParam);
        }

        public function search($recherche){
           $requete = "SELECT DISTINCT idInstrument
                       FROM instrument
                       WHERE libelleInstrument LIKE '%$recherche%' 
                        OR descriptionInstrument LIKE '%$recherche%'
                        OR marqueInstrument LIKE '%$recherche%'";

            return Database::query($requete);
        }

        public function findByIds($tab){
            $requete = "SELECT idInstrument, `libelleInstrument`, `descriptionInstrument`,libelleCategorie,
                                `categorieInstrument`, `marqueInstrument`, imageInstrument,
                                `quantiteDispoInstrument`, `prixInstrument`
                        FROM instrument, categorie
                        WHERE idInstrument IN $tab
                            AND categorieInstrument=idCategorie;";

            return Database::query($requete);
        }

        public function save(){
            $requete = "INSERT INTO `instrument`(`libelleInstrument`, `descriptionInstrument`,
            `categorieInstrument`, `marqueInstrument`, imageInstrument,
            `quantiteDispoInstrument`, `prixInstrument`) 
                        VALUES (:libelleInstrument, :descriptionInstrument, :categorieInstrument, 
                                :marqueInstrument, :imageInstrument, :quantiteDispoInstrument,
                                :prixInstrument);";

            $tabParam = array(":libelleInstrument" => $this->libelleInstrument,
                              ":descriptionInstrument" => $this->descriptionInstrument,
                              ":categorieInstrument" => $this->categorieInstrument, 
                              ":marqueInstrument" => $this->marqueInstrument, 
                              ":imageInstrument" => $this->imageInstrument, 
                              ":quantiteDispoInstrument" => $this->quantiteDispoInstrument,
                              ":prixInstrument" => $this->prixInstrument
                        );

            return Database::execute($requete, $tabParam);
        }                 
        
        public function update(){
            $requete = "UPDATE `instrument` 
                        SET `libelleInstrument`=:libelleInstrument, `descriptionInstrument`=:descriptionInstrument,
                            `categorieInstrument`=:categorieInstrument, `marqueInstrument`=:marqueInstrument,
                            `quantiteDispoInstrument`=:quantiteDispoInstrument, `prixInstrument`=:prixInstrument,
                            imageInstrument=:imageInstrument
                        WHERE idInstrument=:idInstrument;";

            $tabParam = array(":idInstrument" => $this->idInstrument,
                              ":libelleInstrument" => $this->libelleInstrument,
                              ":descriptionInstrument" => $this->descriptionInstrument,
                              ":categorieInstrument" => $this->categorieInstrument, 
                              ":marqueInstrument" => $this->marqueInstrument, 
                              ":quantiteDispoInstrument" => $this->quantiteDispoInstrument,
                              ":prixInstrument" => $this->prixInstrument,
                              ":imageInstrument" => $this->imageInstrument
                        );
            return Database::execute($requete, $tabParam);
        }                 

        public function delete(){
            $requete = "DELETE FROM `instrument` WHERE idInstrument=:idInstrument;";
            $tabParam = array(":idInstrument" => $this->idInstrument);

            return Database::execute($requete, $tabParam);
        }
    }
?>

