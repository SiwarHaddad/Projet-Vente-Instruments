<?php
    require_once __DIR__ . "/Database.php";

    class Client{
        private $idClient;
        private $emailClient;
        private $mdpClient;
        private $jetonRecuperationMdpClient;
        private $dateDemandeReinitialisationMdpClient;
        private $nomClient;
        private $prenomClient;
        private $adresseClient;
        private $rangClient;

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
            $requete = "SELECT * FROM client;";
            return Database::query($requete); 
        }
        
        public function find(){
            $requete = "SELECT * FROM client WHERE emailClient=:emailClient";
            $tabParam = array(":emailClient" => $this->emailClient);

            return Database::find($requete, $tabParam);
        }

        public function save(){
            $requete = "INSERT INTO `client`(`emailClient`, `mdpClient`, `nomClient`, `prenomClient`,
                                    `adresseClient`) 
                        VALUES (:emailClient, :mdpClient, :nomClient, :prenomClient, :adresseClient);";

            $tabParam = array(":emailClient" => $this->emailClient,
                              ":mdpClient" => $this->mdpClient,
                              ":nomClient" => $this->nomClient, 
                              ":prenomClient" => $this->prenomClient,
                              ":adresseClient" => $this->adresseClient
                        );

            return Database::execute($requete, $tabParam);
        }               

        public function update(){
            $requete = "UPDATE `client` 
                        SET `emailClient`=:emailClient, `nomClient`=:nomClient,`prenomClient`=:prenomClient,
                            `adresseClient`=:adresseClient, `rangClient`=:rangClient 
                        WHERE idClient=:idClient;";

            $tabParam = array(":idClient" => $this->idClient,
                              ":emailClient" => $this->emailClient,
                              ":nomClient" => $this->nomClient, 
                              ":prenomClient" => $this->prenomClient,
                              ":adresseClient" => $this->adresseClient, 
                              ":rangClient" => $this->rangClient
                        );
            return Database::execute($requete, $tabParam);
        }                 

        public function delete(){
            $requete = "DELETE FROM `client` WHERE idClient=:idClient;";
            $tabParam = array(":idClient" => $this->idClient);

            return Database::execute($requete, $tabParam);
        }
    }
?>

