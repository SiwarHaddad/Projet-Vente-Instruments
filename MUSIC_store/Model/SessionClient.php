<?php
    class SessionClient {
        //userSession
        public static function CreateSessionForUser ($user,$pwd,$rang) {
            if (!isset($_SESSION)) 
                session_start(); 

            $_SESSION["Client"]["id"] = $user;
            $_SESSION["Client"]["mdp"] = self::HashPassword($pwd);
            $_SESSION["Client"]["rang"] = $rang;
        }

        public static function UserIsLoggedIn () {
            if (!isset($_SESSION))
                session_start(); 

            return isset($_SESSION["Client"]);
        }

        public static function GetLoggedUser () {
            if (Session::UserIsLoggedIn()) {
                if (!isset($_SESSION)) 
                    session_start(); 

                return $_SESSION["Client"];
            } else {
                return null;
            }
        }

        public static function DeleteSession () {
            if (!isset($_SESSION)) 
                session_start(); 
                session_destroy(); 
        }

        public static function HashPassword ($password) {
            return password_hash($password, PASSWORD_DEFAULT);
        }


        //panierSession
    }
?>