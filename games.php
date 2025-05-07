<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Of Games - Home</title>
<!-- Thay thế bằng dòng này -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />


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
    <link rel="stylesheet" href="./assets/css/games.css" />
<!-- Thêm jQuery từ CDN Google -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    <section id="gameSection" class="game-section">
        <h2 class="game-title">Danh sách game</h2>
              <!-- Tìm kiếm theo tên -->
        <input type="text" id="searchGame" placeholder="Tìm kiếm game...">

        <!-- Lọc theo giá -->
        <select id="sortPrice">
        <option value="">Sắp xếp theo giá</option>
        <option value="asc">Giá tăng dần</option>
        <option value="desc">Giá giảm dần</option>
        </select>

        <div id="gameList" class="game-list"></div>
        <div id="pagination" class="pagination"></div>
    </section>      
    <!-- <script defer src="./assets/js/HomeJS.js"></script> -->
    <script defer src="./assets/js/HeaderJS.js"></script>
    <script defer src="./scripts/ScrollbarJS.js"></script>
    <script src="./assets/js/IntroJS.js"></script>
    <script defer src="./js/games.js"></script>

  </body>
</html>
