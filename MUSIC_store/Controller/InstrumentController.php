<?php
    require_once __DIR__ . '/../Model/Instrument.php';

    class InstrumentController{
        public static function All(){
            $Categories = Categorie::All();
            $instruments = Instrument::all();
            require_once __DIR__ . '/../View/ViewInstrument/listeInstrument.php';
        }
        
        public static function FindById(){
            $I = new Instrument($_GET);
            $instrument = $I->findById();
        
            require_once __DIR__ . '/../View/ViewInstrument/detailInstrument.php';
        }

        public static function FindByCategorie(){
            $Categories = Categorie::All();
            $I = new Instrument($_GET);
            $instruments = $I->findByCategorie();

            require_once __DIR__ . '/../View/ViewInstrument/listeInstrument.php';
        }
        
        // public static function search(){
        //     if(isset($_POST["search"])){
        //         $I = new Instrument();
        //         // $res = $I->search($_POST["search"]);
        //         // $instruments = $I->findNyIds($res);

        //         require_once __DIR__ . '/../View/ViewInstrument/listeInstrument.php';
        //     }
        // }

        public static function New(){   
            $Categories = Categorie::All();
            require_once __DIR__ . '/../View/ViewInstrument/formAjoutInstrument.php';
        }
        
        public static function Save(){ 
            if(isset($_POST)){
                $filename = $_FILES["choosefile"]["name"];
                $tempname = $_FILES["choosefile"]["tmp_name"];  
                $folder = __DIR__ ."/../public/images/instruments/".$filename;  
                
                $I = new Instrument(array_merge($_POST,array('imageInstrument'=>$filename)));
                
                $r = $I->save();

                if (move_uploaded_file($tempname, $folder)) {
                    echo "Image uploaded successfully";
                }else{
                    echo "Failed to upload image";
                }
            } 
            self::All();
        }
        
        public static function Delete(){ 
            if(isset($_GET['idInstrument'])){
                $I = new Instrument(array('idInstrument'=>$_GET['idInstrument']));
                $r = $I->delete();
            } 
            self::All();
        }
        
        public static function Edit(){ 
            if(isset($_GET['idInstrument'])){
                $Categories = Categorie::All();
                $I = new Instrument(array('idInstrument'=>$_GET['idInstrument']));
                $instrument = $I->findById(); 
                require_once __DIR__ . '/../View/ViewInstrument/formModifInstrument.php';
            } 
            else
                self::All();
        }
        
        public static function Update(){ 
            if(isset($_POST)){
                if(!empty($_FILES["choosefile"]['name'])){
                    
                    $filename = $_FILES["choosefile"]["name"];  
                    $tempname = $_FILES["choosefile"]["tmp_name"];  
                    $folder = __DIR__ .'/../public/images/instruments/'.$filename;  
                    $C = new Instrument(array_merge($_POST,array('imageInstrument'=>$filename)));
                
                    unlink(__DIR__ .'/../public/images/instruments/'.$_POST['imageInstrument']);
                    if (move_uploaded_file($tempname, $folder)) {
                        echo "Image uploaded successfully";
                    }else{
                        echo "Failed to upload image";
                    }
                    $C = new Instrument(array("libelleInstrument"=>$_POST["libelleInstrument"],"descriptionInstrument"=>$_POST["descriptionInstrument"],
                                            "categorieInstrument"=>$_POST["categorieInstrument"],"marqueInstrument"=>$_POST["marqueInstrument"],
                                            "quantiteDispoInstrument"=>$_POST["quantiteDispoInstrument"],"prixInstrument"=>$_POST["prixInstrument"],
                                            'idInstrument'=>$_GET['idInstrument'],'imageInstrument'=>$filename
                                        ));
                }
                else{
                    $C = new Instrument(array_merge($_POST,array('idInstrument'=>$_GET['idInstrument'])));
                } 
                $r = $C->update();
            } 
            header("location:index.php?controller=Instrument");
        }
    }
?>