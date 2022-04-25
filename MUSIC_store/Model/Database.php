<?php
    class Database{
        private static $host;
        private static $dbname;
        private static $user;
        private static $password;
        private static $connex;


        public static function init($tab = array()){
            self::$host = "localhost";        
            self::$dbname = "projet_s2";
            self::$user = "root"; 
            self::$password = "";        
            
            try{
                self::$connex = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname,self::$user,self::$password);        
            }
            catch(PDOException $exception){
                echo $exception->getMessage();
                die;
            }
        }
        
        public static function query($requete, $tabParam = array()){
            $stm = self::$connex->prepare($requete);
            $e = $stm->execute($tabParam);

            if($e)
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            else
                var_dump($stm->errorInfo());
        }
        
        public static function find($requete, $tabParam = array()){
            $stm = self::$connex->prepare($requete);
            $e = $stm->execute($tabParam);

            if($e)
                return $stm->fetch(PDO::FETCH_ASSOC);
            else
                var_dump($stm->errorInfo());
        }
        
        public static function execute($requete, $tabParam = array()){
            // $stm = self::$connex->prepare($requete);
            // $e = $stm->execute($tabParam);

            // return $e;
            $stm = self::$connex->prepare($requete);
            $r=$stm->execute($tabParam);
    
            if($r)
                return $r;	
            else{
                echo '<pre>';
                print_r($stm->errorInfo());
                echo '</pre>';
                return $r;
            }
        }
    }

    Database::init();
?>
