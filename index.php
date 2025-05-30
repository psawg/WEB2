<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Of Games - Home</title>
    <link rel="icon" href="./assets/images/icon_miniLogoHome.png" />
    <link rel="stylesheet" href="./assets/css/HomeCSS.css" />
    <link rel="stylesheet" href="./styles/ScrollbarCSS.css" />
    <link rel="stylesheet" href="./assets/css/IntroCSS.css" />

    <link rel="stylesheet" href="./assets/css/HeaderCSS.css">
    <link rel="stylesheet" href="./assets/css/HeaderCSS_Responsive.css">

    <link rel="stylesheet" href="./assets/css/SectionCSS.css" />
    <link rel="stylesheet" href="./assets/css/SectionCSS_Responsive.css" />

    <link rel="stylesheet" href="./assets/css/FooterCSS.css" />
    <link rel="stylesheet" href="./assets/css/FooterCSS_Responsive.css" />
<!-- 
    <?php 
        require_once "./php/echoHTML.php";
    ?> -->
  </head>

  <body>
    <div id="intro" class="intro">
      <img src="./assets/images/SectionLogo.png" alt="Logo" class="logo" />
    </div>
      <?php
        headerHTML();
      ?>

      <?php
        sectionHTML();
      ?>

      <?php
        footerHTML();
      ?>

    <!-- <script defer src="./assets/js/HomeJS.js"></script> -->
    <script defer src="./assets/js/FooterJS.js"></script>
    <script defer src="./assets/js/HeaderJS.js"></script>
    <script defer src="./assets/js/SectionJS.js"></script>
    <script defer src="./scripts/ScrollbarJS.js"></script>
    <script src="./assets/js/IntroJS.js"></script>
    <script src="./js/log.js"></script>   
  </body>
</html>
