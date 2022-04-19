<?php


if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
require('./class/Nft_management.php');
require('./class/Functions.php');
require("./class/db_connect.php");

$_nft=new Nft_management($pdo);


$value=NULL;
$idd=(int)$_nft->get_id_user();

if(isset($_GET["idnft"])){
    $value=$_nft->add_minus_quantity($idd);
    if($value=="success"){
        header("location:download_page.php?file={$_GET['file']}");
    }
}
if(isset($_GET["action"])){
    header('location:./login.php');
}
if(isset($_SESSION["username"])){
    require('./header_logged.php'); 
}
else{
    require('./header.php');
} 





$_nft->favorite_insert_delete($idd);

Functions::set_to_null();
$message=NULL;

$requete=$_nft->requete($_GET["category"],$_GET["budget"],$_GET["chain"],$_GET["reset"],$_GET["my_creation"],$idd);
$nfts=$_nft->filtered_nft($requete);

if(isset($_GET["nft_achat"])){
    $nfts=$_nft->join_bought_nft($idd);
}


if($nfts == NULL){
    $message="aucun resultat trouvé";
}




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Intitulé de ma page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../CSS/style_product.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/select_chain_product.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    

   
    

 
  </head>

  <body>
   
    <form action="" method="GET">
        <div class="mobile_filter">
            
            <div style="width: 100%;" class="mobile_cat">
                <div class="radio-toolbar">
                    <input type="radio" id="radioApple" name="category" value="1" checked>
                    <label for="radioApple">Art</label>
                
                    <input type="radio" id="radioBanana" name="category" value="2">
                    <label for="radioBanana">Photography</label>
                
                    <input type="radio" id="radioOrange" name="category" value="3">
                    <label for="radioOrange">Music</label> 
                    
                    <input type="radio" id="radioOrangee" name="category" value="4">
                    <label for="radioOrangee">Sport</label> 
                    
                    
                </div>
                
                

            </div>
            <div id="#mbprice" class="mobile_price">
                <h3 id="Budgettext">Budget</h3>
                <i  id="ethtag"class="fa-brands fa-ethereum" style="color: #0097e6;margin-right: 10px;"></i>
                <input class="range2" type="number" name="budget" step="0.1" value="0.1" min="0.1" max="100" >
            
            </div>
            <div class="mobile_chain">
                <div class="select second">
                    <select name="chain"style="width:200px;height:50px;border-radius:5px;padding:5px;">
                    <option value="1">ETH Chain</option>
                    <option value="2">BTC Chain</option>
                    
                    </select>
                    
                </div>
                

            </div>
            <button class="favorite styled hvr-shrink" name="filterr" id="mobile_btn" type="submit" style="cursor: pointer;">
                Apply
            </button>
            
                

        </div>
    </form>
    <div class="main_container">
    
    <?php if($value!="success" && $value != NULL){echo Functions::alert_html($value);} ?>   
    <form action="" method="GET"> 
        <div style="width:100%;text-align:center;font-size:25px;border-bottom-width: 0.5px;border_color:white;">
            <h1 style="margin-bottom:5px;">EXPLORE NFT</h1>
            
        </div>
        <div class="filter_bar">
            <div class="container_filter">
                  
                <div class="filter_header">
                    <div class="filter_elements">
                        <span style="font-size: 30px; color: rgb(255, 255, 255);" ><i class="bi bi-filter"></i></span>
                        <h1 id="filter_title">Filter</h1>
                    </div>
                </div>
                <div class="categorie">
                    <div class="label">
                        <h1 style="margin-top:20px;">Categorie</h1>

                        <label class="rad-label activate">
                          <input type="radio" class="rad-input" name="category" value="1" checked>
                          <div class="rad-design"></div>
                          <div class="rad-text">Art</div>
                        </label>
                      
                        <label class="rad-label">
                          <input type="radio" class="rad-input" name="category" value="2">
                          <div class="rad-design"></div>
                          <div class="rad-text">Photo</div>
                        </label>
                      
                        <label class="rad-label">
                          <input type="radio" class="rad-input" name="category" value="3">
                          <div class="rad-design"></div>
                          <div class="rad-text">Music</div>
                        </label>
                      
                        <label class="rad-label">
                          <input type="radio" class="rad-input" name="category" value="4">
                          <div class="rad-design"></div>
                          <div class="rad-text">Sport</div>
                        </label>
                      
                      </div>

                  </div>
                  
                  <div class="price_filter">
                    <div class="price_range">
                        <h1 style="text-align: center; margin-top: 5px;">Your Budget</h1>
                        <div class="price_eth">
                            <span id="rangeValue" style="color:#0097e6">0.1</span>
                            <span style="font-size: 40px; color: rgb(255, 255, 255); margin-left: 5px;">
                                <sup><i class="fab fa-ethereum" ></i></sup>

                            </span>

                        </div>
                        
                        <input class="range" type="number" name="budget" step="0.1" value="0.1" min="0.1" onChange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)" >
                        
                    </div>
                 

                  </div>
                  <div class="chain">
                    <h1 class="chain_title" style="text-align: center;">Chain</h1>
                    <div class="wrapper_chain">
                        
                        <input type="radio" name="chain" value="1" id="option-1">
                        <input type="radio" name="chain" value="2" id="option-2" >
                          <label for="option-1" class="option option-1">
                            <div class="dot"></div>
                            <span style="font-size: 30px; color: rgb(0, 0, 0);margin-top: 5px;margin-bottom: 5px;">
                                <i class="fab fa-ethereum" ></i>

                            </span>
                            
                             </label>
                          <label for="option-2" class="option option-2">
                            <div class="dot"></div>
                             <span style="font-size: 30px; color: rgb(133, 133, 133);margin-top: 5px;margin-bottom: 5px;">
                                <i class="fa-brands fa-btc"></i>
                            </span>
                          </label>
                          
                    </div>
                    <div class="comming_soon">
                        <div></div>
                        <p style="text-align: center;" ><em style="margin-top:0px;"></em> </p>
                        
    
                       </div>
                      
                       
                  </div>
                  
                  <button class="favorite styled hvr-shrink" type="submit" name="filterr" id="desktop_btn" style="cursor: pointer;">Apply Filter</button>

                
                  
                  
                  
                 
              </div>
              

          </div>
    </form>
          
          
          
          <div class="products_container">
                    
                <?php 
                        
                        ?><a href="product_page.php?reset=1"  class="buttonDownload" >All NFT</a><?php
                        
                        if(isset($_SESSION["username"])){
                            ?><a href="product_page.php?nft_achat=1"  class="buttonDownload" >Mes NFT</a><?php
                            ?><a href="product_page.php?my_creation=1"  class="buttonDownload" >Mes Creations</a><?php
                        }
                     
                        
                ?>
                <div class="container">
                        
                    
                    <!-- nft list -->
                    <?php
                        if($message){
                            ?><p><?=$message?></p><?php
                        }
                        else{
                            foreach($nfts as $nft){
                                ?>
                                        <div>   
                                            <div class="card_container hvr-float" >
                                            
                                                <div class="bloc1">
                                                    <img src="../images/<?=$nft->dir_nft?>" alt="">
                        
                                                </div>
                                                <div class="bloc2">
                                                    <div class="price">
                                                        <span ><strong>Price</strong> </span>
                                                        <div>
                                                            <span style="color: #0097e6;"><strong><?= $nft->price?></strong></span>
                                                            <i class="fa-brands fa-ethereum"></i>
                                                        </div>
                        
                                                    </div>
                                                    
                                                    <div class="user_nftid">
                                                        
                                                        <div  class="user">
                                                            <span style="margin-right: 3px;"><?=$_nft->getusername($nft) ?></span>
                                                            <span class="material-icons blue-color">verified</span>
                                                        </div>
                                                        <span style="font-size: small;"><em>#ID<?= $nft->id?></em> </span>

                                                    </div>
                                                    
                        
                                                </div>
                                                <div class="bloc3">
                                                    <i class="<?=$_nft->getchain($nft) ?>"></i>
                                                    <a href="#" class="popup-btn">
                                                        <div class="buy-now" style="margin-left: 30px;">
                                                            <i class="large material-icons" style="font-size: 21px;">add_shopping_cart</i>
                                                            <strong><span >Buy</span></strong>
                                                        </div>
                                                    </a>
                                                    
                                                    <div class="heart_react">
                                                        <div>
                                                            <a href="product_page.php?<?= $_nft->get_url($_GET,$nft,$idd)[0];?>">
                                                                <i id="iconh" class="fa-<?=$_nft->get_url($_GET,$nft,$idd)[1];?> fa-heart"></i>
                                                            </a>

                                                        </div>
                                                        
                                                        
                                                        <span class="nblikes" style="margin-left: 1px;"><?= $nft->likes?></span>
                            
                                                    </div>
                                                
                        
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="popup-view">
                                                <div class="popup-card">
                                                <a><i class="fas fa-times close-btn"></i></a>
                                                <div class="product-img">
                                                    <img src="../images/<?=$nft->dir_nft?>" alt="">
                                                </div>
                                                <div class="info">
                                                    <h2><?= $nft->name?> #ID<?= $nft->id?><br><span><?=$_nft->getcatname($nft) ?></span></h2>
                                                    <p><?= $nft->description?></p>
                                                    <span class="price" > <strong> <span style="color: #000000;"><?= $nft->price?></span></strong>  <span><i class="fa-brands fa-ethereum"></i></span> </span>
                                                    <?php $user=Functions::connected(); 
                                                        if($user){
                                                           ?> <a href="product_page.php?file=<?=$nft->dir_nft;?>&idnft=<?=$nft->id;?>" class="add-cart-btn hvr-shrink" >BUY</a> <?php

                                                        }
                                                        else{
                                                            ?><a href="./login.php" class="add-cart-btn hvr-shrink" >BUY</a><?php
                                                        }  
                                                    ?>
                                                    
                                                        
                                                </div>
                                                </div>
                                            </div>
                                        </div>                     
                                <?php

                            }
                        }
                    
                    ?>
                    
                    
                      
                </div>
            </div>
        </div>
        <?php  require('./footer.php'); ?>
            
        <script type="text/javascript" src="../JS/buy.js"></script>
        <script type="text/javascript" src="../JS/like_effect.js"></script>
        <script type="text/javascript" src="../JS/categorie_label.js"></script>
        <script type="text/javascript" src="../JS/range.js"></script>

            
    </body>

 
      
</html>
