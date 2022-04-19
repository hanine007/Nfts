<!DOCTYPE html>
<html style="font-size: 62.5%;font-family: 'Nunito', sans-serif;">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
<link rel='stylesheet prefetch' href='http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Sora:wght@700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@700;800&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
<script src="https://kit.fontawesome.com/1db09dea83.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@700&display=swap" rel="stylesheet">
<title>JinxArt MarketPlace</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="select_chain_product.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<!-- css linking --> 
<link rel="stylesheet" href="../CSS/output_contact.css" >
<link rel="stylesheet" href="../CSS/style_contact.css" >
<link rel="stylesheet" href="../CSS/contact.css">
</head>
<body style="background: black;">
  <?php
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    if(isset($_SESSION["username"])){
      require('./header_logged.php');
    }
    else{
      require('./header.php');
    }
  ?>
  <div class="container">
    <div class="content">
      <div class="image-box">
       <img src="../images/contact.jpg" alt="">
      </div>
    <form action="" method="GET">
      <div class="topic">Send us a message</div>
      <div class="input-box">
        <input type="text" required>
        <label>Enter your name</label>
      </div>
      <div class="input-box">
        <input type="text" required>
        <label>Enter your email</label>
      </div>
      <div class="message-box">
        <textarea required ></textarea>
        <label>Enter your message</label>
      </div>
      <div class="input-box">
        <input type="submit" name="message" value="Send Message">
      </div>
      <?php
        if(isset($_GET['message'])){
          ?>
            <div class="audun_success">
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              Votre message a été bien envoyé 
            </div>
          <?php

        }
      ?>
      
    </form>
  </div>
  </div>
<?php  require('./footer.php'); ?>
</body>
</html>

