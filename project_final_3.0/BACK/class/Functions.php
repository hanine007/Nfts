<?php

class Functions{
    
    
    public static function set_to_null()
    {
        if(!isset($_GET["category"])){
            $_GET["category"]=NULL;
        }
        if(!isset($_GET["budget"])){
            $_GET["budget"]=NULL;
        }
        if(!isset($_GET["chain"])){
            $_GET["chain"]=NULL;
        }
        if(!isset($_GET["reset"])){
            $_GET["reset"]=NULL;
        }
        if(!isset($_GET["my_creation"])){
            $_GET["my_creation"]=NULL;
        }


    } 
    public static function get_html_add($message){
        if($message){
            if($message == "error"){
                return <<<HTML
                        <div class="audun_warn">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            Error veuillez reeseyez
                        </div>
                    HTML;
            }
            else{
                return <<<HTML
                        <div class="audun_success">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            Votre NFT a été ajouté avec succes
                        </div>
                    HTML;

            }
        }
        else{
            return NULL;
        }
       
    }

    public static function dir_nft():string{
        $filename   = uniqid() . "-" . time();
        $extension  = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION ); 
        $basename   = $filename . "." . $extension; 

        $source       = $_FILES["image"]["tmp_name"];
        $destination  = "../images/{$basename}";

        /* move the file */
        move_uploaded_file( $source, $destination );
        return $basename;
    }

    public static function is_connected(){
        if(isset($_SESSION["username"])){
            return "./BACK/upload.php";
        }
        else{
            return "./BACK/login.php";
        }
    }

    public static function connected(){
        if (isset($_SESSION["username"])){
            
            return true;
            
        }
        else{
            return false;
        }

       
    }
    public static function alert_html(string $value){
        
            if($value=="owned"){
                return <<<HTML
                    <div class="audun_warn">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        Vous avez deja acheté cet NFT
                    </div>
                HTML;


            }else{
                return <<<HTML
                    <div class="audun_warn">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        Vous ne pouvez pas acheter votre propre NFT
                    </div>
                HTML;

            }
          
       
    }

}


?>