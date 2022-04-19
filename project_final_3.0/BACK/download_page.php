<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if(!isset($_SESSION["username"]) || ( !isset($_GET["file"]) && !isset($_GET["download"])) ){
    header('location:../index.php');
}

require('./class/Nft_management.php');
require("./class/db_connect.php");

$_nft=new Nft_management($pdo);
$idd=$_nft->get_id_user();
$_nft->download_bought_nft();
?>

<html style="font-size: 62.5%;font-family: 'Nunito', sans-serif;">
<head>
  <meta name="viewport" content="width=device-width">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel='stylesheet prefetch' href='http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Sora:wght@700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@700;800&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@700&display=swap" rel="stylesheet">
  <!-- style linking -->
  <link href="../CSS/output.css" rel="stylesheet">
  <link href="../CSS/style_header.css"  rel="stylesheet">
  <link href="../CSS/style_download.css"  rel="stylesheet">
  <!-- script linking -->
  <script src="https://kit.fontawesome.com/1db09dea83.js" crossorigin="anonymous"></script>

  <title>webHeader</title>
</head>


<?php  require('./header_logged.php'); ?>
<body styel="background-image:url('../images/3564231.jpg');">
    
    <div class="congrat">
        <div class="icon_congrat">
            <img src="../images/fireworks.png" alt="" />
        </div>
        <h1 style="color:white;font-size:60px;margin-left:20px;margin-top:10px;">Félicitations</h1>
    </div>
    <div class="nft_container">
        <div class="audun_success">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
                Félicitations vous venez d'achter cet NFT
        </div>
        <div id="divnft" class="repeating-linear">
            <img src="../images/<?=$_GET["file"] ?? $_GET["download"];?>" alt="" />
        </div>
        <a href="download_page.php?download=<?=$_GET["file"]?>" class="buttonDownload"><i style="margin-right:5px;" class="fa-solid fa-download"></i>Download</a>

    </div>
    <?php  require('./footer.php'); ?>
    
</body>