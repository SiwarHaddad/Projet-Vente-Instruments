<?php
    require_once __DIR__ . '/../Model/Client.php';
    require_once __DIR__ . '/../Model/SessionClient.php';

    class ClientController{
        public static function New(){    
            require_once __DIR__ . '/../View/ViewClient/formInscriptionClient.php';
        }
        
        public static function LogIn(){
            require_once __DIR__ . '/../View/ViewClient/formConnexionClient.php';
        }

        public static function Save(){ 
            if($_POST){
                $C = new Client($_POST);
                $CMail = $C->find();
               
                if($CMail == false){
                    $r = $C->save();
                    $CMail = $C->find();
    
                    SessionClient::CreateSessionForUser($CMail["idClient"],$CMail["mdpClient"],$CMail["rangClient"]);
                    header('location:index.php?controller=Instrument');
                } 
                else 
                    if(count($CMail)==1)
                        self::LogIn();
            }
        }

        public static function Disconnect(){    
            SessionClient::DeleteSession();
            header('location:index.php?controller=Instrument');
        }
        
        public static function LogInn(){ 
            if(isset($_POST)){
                $C = new Client($_POST);
                $CMail = $C->find();
                var_dump($CMail);
              
                if ($CMail != false){
                    $mdp = SessionClient::HashPassword($_POST["mdpClient"]);

                    if(password_verify($CMail["mdpClient"],$mdp)){
                        SessionClient::CreateSessionForUser($CMail["idClient"],$CMail["mdpClient"],$CMail["rangClient"]);
                        header("location:index.php?controller=Instrument");
                    } 
                    else {
                        $message = 'Mot de passe invalide';
                        header("location:index.php?controller=Client&action=LogIn&message=$message");
                    }
               } 
               else{
                $message = 'Aucun client avec ce mail';
                header("location:index.php?controller=Client&action=LogIn&message=$message");
            }
            }
        }
        

        public static function Delete(){ 
            if(isset($_GET['idClient'])){
                $C = new Client(array('idClient'=>$_GET['idClient']));
                self::Disconnect();
                $r = $C->delete();
            } 
            header("location:index.php?controller=Instrument");
        }
        
        public static function Edit(){ 
            if(isset($_GET['idClient'])){
                $C = new Client(array('idClient'=>$_GET['idClient']));
                $client = $C->find(); 
                require_once __DIR__ . '/../View/ViewClient/formModifClient.php';
            } 
            else
                header("location:index.php?controller=Instrument");
        }
        
        public static function Update(){ 
            //if(isset($_POST['id'],$_POST['nom'],$_POST['nbEtoile'],$_POST['image'],$_POST['ville'],$_POST['description'])){
                $C = new Client(array_merge($_POST,array('idClient'=>$_GET['idClient'])));
                $r = $C->update(); 
            //} 
            header("location:index.php?controller=Instrument");
        }
    }
?>