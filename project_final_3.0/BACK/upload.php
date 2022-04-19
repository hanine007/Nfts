<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if(!isset($_SESSION["username"])){
    header("location:../index.php");
}

require('./header_logged.php');

require('./class/Functions.php');

require('./class/Nft_management.php');

require("./class/db_connect.php");

$message=NULL;
$_nft=new Nft_management($pdo);
$id=$_nft->get_id_user();
if($id == NULL){
    header('location:../index.php');
    exit();
}

if (isset($_POST["submit"])){
    
    $directory=Functions::dir_nft();
    $requete='INSERT INTO nft (name,description,price,likes,quantity,id_user,id_category,id_chain,dir_nft) VALUES(:title,:description,:price,0,:quantity,:id_user,:id_category,:id_chain,:dir_nft)';
    $query=$pdo->prepare($requete);
    $success=$query->execute([
            "title"=>$_POST["title"],
            "description"=>$_POST["description"],
            "price"=>$_POST["price"],
            "quantity"=>$_POST["qnt"],
            "id_user"=>$id,
            "id_category"=>$_POST["category"],
            "id_chain"=>$_POST["chain"],
            "dir_nft"=>$directory


            
        ]);
    if($success){
        $message="success";
        

    }
    else{
        $message="error";

    }
    
    
}
 
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/upload.css">
        <link rel="stylesheet" href="../CSS/upload2.css">
        <link rel="stylesheet" href="../CSS/upload3.css">
        <script src="" defer></script>
        <title>Vendre NFT</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="header">
                <h1>Vendre NFT</h1>
            </div>
            <div class="section">
                <form action="" method="post"  enctype="multipart/form-data" class="active">
                <input type="text" name="title"  id="title" placeholder="Titre" required>
                <textarea id="description" name="description" style="resize: none;" placeholder="Description" required></textarea>
                <input type="number" step="0.01"  min="0.05"  name="price"  id="price" placeholder="Prix" required>
                <input type="number" name="qnt" min="0" max="10" placeholder="Quantité" required>
                <div class="container_upload">
                    <div class="radio_container">
                        <input type="radio" name="category" value="1" id="one" checked>
                        <label for="one">Art</label>
                        <input type="radio" name="category" value="2" id="two">
                        <label for="two">Photo</label>
                        <input type="radio" name="category" value="3" id="three">
                        <label for="three">Music</label>
                        <input type="radio" name="category" value="4" id="four">
                        <label for="four">Sport</label>
                    </div>
                </div>
                <div class="box" >
                    <select name="chain">
                        <option value="1">Ethereum</option>
                        <option value="2">Bitcoin</option>
                    </select>
                </div>
                
                <div class="image">
                    <input type="file" name="image" id="pic" accept="image/*" required>
                </div>
                <input type="submit" name="submit" value="submit" placeholder="Submit">
                <?=Functions::get_html_add($message);?>
                </form>
            </div>
        </div>
        <?php  require('./footer.php'); ?>  
    </body>
</html>