<?php
    require_once __DIR__ . '/../Model/Categorie.php';

    class CategorieController{
        public static function All(){
            $Categories = Categorie::all();
            require_once __DIR__ . '/../View/ViewCategorie/listeCategorie.php';
        }
        
        public static function New(){    
            require_once __DIR__ . '/../View/ViewCategorie/formAjoutCategorie.php';
        }
        
        public static function Save(){ 
           if(isset($_POST['libelleCategorie'])){
                $filename = $_FILES["choosefile"]["name"];  
                $tempname = $_FILES["choosefile"]["tmp_name"];  
                $folder = __DIR__ .'/../public/images/categories/'.$filename;  
                $C = new Categorie(array_merge($_POST,array('imgCategorie'=>$filename)));
                
                $r = $C->save();

                if (move_uploaded_file($tempname, $folder)) {
                    echo "Image uploaded successfully";
                }else{
                    echo "Failed to upload image";
                }
                header("location:index.php");
            }
            else{
                require_once __DIR__ . '/../View/ViewCategorie/formAjoutCategorie.php';
            }
        }
        
        public static function Edit(){ 
            if(isset($_GET['idCategorie'])){
                $C = new Categorie(array('idCategorie'=>$_GET['idCategorie']));
                $Categorie = $C->find(); 
                require_once __DIR__ . '/../View/ViewCategorie/formModifCategorie.php';
            } 
            else
                header("location:index.php");
        }

        public static function Update(){ 
            if(isset($_POST['libelleCategorie'])){
                if(!empty($_FILES["choosefile"]['name'])){
                    
                    $filename = $_FILES["choosefile"]["name"];  
                    $tempname = $_FILES["choosefile"]["tmp_name"];  
                    $folder = __DIR__ .'/../public/images/categories/'.$filename;  
                    $C = new Categorie(array_merge($_POST,array('imgCategorie'=>$filename)));
                
                    unlink(__DIR__ .'/../public/images/categories/'.$_POST['imgCategorie']);
                    if (move_uploaded_file($tempname, $folder)) {
                        echo "Image uploaded successfully";
                    }else{
                        echo "Failed to upload image";
                    }
                    $C = new Categorie(array('libelleCategorie'=>$_POST['libelleCategorie'],'idCategorie'=>$_GET['idCategorie'],'imgCategorie'=>$filename));
                }
                else{
                    $C = new Categorie(array_merge($_POST,array('idCategorie'=>$_GET['idCategorie'])));
                } var_dump($C);var_dump($_POST);var_dump($_FILES);
                $r = $C->update();var_dump($r); 
            } 
            header("location:index.php");
        }

        public static function Delete(){ 
            if(isset($_GET['idCategorie'])){
                $C = new Categorie(array('idCategorie'=>$_GET['idCategorie']));
                $Categorie = $C->find(); 
                unlink(__DIR__ .'/../public/images/categories/'.$Categorie['imgCategorie']);

                $r = $C->delete();
            } 
            header("location:index.php");
        }
    }
?>