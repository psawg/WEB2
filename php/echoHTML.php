<?php
    session_start();

    function headerHTML() {
        echo'    
        <div class="NavBar" id="idNavBar">

        <!-- LOGO -->
        <div class="logo-container">
            <img src="./assets/images/icon_logoHome.png" alt="logo" id="logo" >
        </div>

        <!-- Hamburger Menu -->
        <div class="item-container">
            <span class="openBtn">
                <div href="#" class="line" onclick="openNav()"></div>
                <div href="#" class="line" onclick="openNav()"></div>
                <div href="#" class="line" onclick="openNav()"></div>
            </span>
    
            <!-- LIST ITEM -->
            <ul class="sideNav" id="idSideNav"> 
                <!-- Close Button -->
                <li class="closeBtn">
                    <div href="http://localhost/Doan/" class="line" onclick="closeNav()"></div>
                    <div href="#" class="line" onclick="closeNav()"></div>
                    <div href="#" class="line" onclick="closeNav()"></div>
                </li>
                <!-- Main Menu -->
                <li><a href="index.php"><svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5.5l.325-.38a.5.5 0 00-.65 0L7.5.5zm-7 6l-.325-.38L0 6.27v.23h.5zm5 8v.5a.5.5 0 00.5-.5h-.5zm4 0H9a.5.5 0 00.5.5v-.5zm5-8h.5v-.23l-.175-.15-.325.38zM1.5 15h4v-1h-4v1zm13.325-8.88l-7-6-.65.76 7 6 .65-.76zm-7.65-6l-7 6 .65.76 7-6-.65-.76zM6 14.5v-3H5v3h1zm3-3v3h1v-3H9zm.5 3.5h4v-1h-4v1zm5.5-1.5v-7h-1v7h1zm-15-7v7h1v-7H0zM7.5 10A1.5 1.5 0 019 11.5h1A2.5 2.5 0 007.5 9v1zm0-1A2.5 2.5 0 005 11.5h1A1.5 1.5 0 017.5 10V9zm6 6a1.5 1.5 0 001.5-1.5h-1a.5.5 0 01-.5.5v1zm-12-1a.5.5 0 01-.5-.5H0A1.5 1.5 0 001.5 15v-1z" fill="currentColor"></path></svg>Main Menu</a></li>
                <!-- News -->
                <li><a href="#" onclick="test1()"><svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path clip-rule="evenodd" d="M5.5 11.493l2 2.998 2-2.998h4a1 1 0 001-1V1.5a.999.999 0 00-1-.999h-12a1 1 0 00-1 1v8.993a1 1 0 001 1h4z" stroke="currentColor" stroke-linecap="square" stroke-linejoin="round"></path></svg>News</a></li>
                <!-- Games -->
                <li><a href="games.php" onclick="test2()"><svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M9.817 11.133l-.447.224.447-.224zM9.5 10.5l.447-.224A.5.5 0 009.5 10v.5zm-4 0V10a.5.5 0 00-.447.276l.447.224zm8.5-5v4.528h1V5.5h-1zm-3.736 5.41l-.317-.634-.894.448.316.633.895-.447zM9.5 10h-4v1h4v-1zm-4.447.276l-.317.634.894.447.317-.633-.894-.448zM1 10.028V5.5H0v4.528h1zM3.5 3h8V2h-8v1zm-.528 9A1.972 1.972 0 011 10.028H0A2.972 2.972 0 002.972 13v-1zm9.056 0c-.747 0-1.43-.422-1.764-1.09l-.894.447A2.972 2.972 0 0012.027 13v-1zM14 10.028A1.972 1.972 0 0112.028 12v1A2.972 2.972 0 0015 10.028h-1zm-9.264.882A1.972 1.972 0 012.972 12v1a2.972 2.972 0 002.658-1.643l-.894-.447zM15 5.5A3.5 3.5 0 0011.5 2v1A2.5 2.5 0 0114 5.5h1zm-14 0A2.5 2.5 0 013.5 3V2A3.5 3.5 0 000 5.5h1zM3 7h3V6H3v1zm1-2v3h1V5H4zm7 1h1V5h-1v1zM9 8h1V7H9v1z" fill="currentColor"></path></svg>Games</a></li>
                <!-- Account -->
                <li><a href="./page/login.php"><svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M3 13v.5h1V13H3zm8 0v.5h1V13h-1zm-7 0v-.5H3v.5h1zm2.5-3h2V9h-2v1zm4.5 2.5v.5h1v-.5h-1zM8.5 10a2.5 2.5 0 012.5 2.5h1A3.5 3.5 0 008.5 9v1zM4 12.5A2.5 2.5 0 016.5 10V9A3.5 3.5 0 003 12.5h1zM7.5 3A2.5 2.5 0 005 5.5h1A1.5 1.5 0 017.5 4V3zM10 5.5A2.5 2.5 0 007.5 3v1A1.5 1.5 0 019 5.5h1zM7.5 8A2.5 2.5 0 0010 5.5H9A1.5 1.5 0 017.5 7v1zm0-1A1.5 1.5 0 016 5.5H5A2.5 2.5 0 007.5 8V7zm0 7A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0z" fill="currentColor"></path></svg>Account</a></li>
            </ul>
        </div>

        </div>';
    }

    function sectionHTML() {
        echo'
  <div class="content">
    <div class="topContent">
      <video id="backgroundVideo" autoplay loop muted>
        <source src="" type="video/mp4">
      </video>

    <div class="overlay">
      <div class="mainLogo">
        <img src="./assets/images/icon_mainSectionlogo.png" alt="">
          <div class="paragraph">
            <p>Discover the ultimate gaming hub for the latest news and updates on newly released games.
            <br>Stay informed and entertained with our comprehensive coverage of the gaming world.</p>
          </div>
      </div>
    </div>
  </div>

  <div class="midContent" id="midContent">
    <div class="Hero">
      <!-- Marquee -->
      <div class="marquee">
        <p>
          <span>NEWS -</span>
          <span>NEWS -</span>
          <span>NEWS -</span>
          <span>NEWS -</span>
          <span>NEWS -</span>
          <span>NEWS -</span>
          <span>NEWS -</span>
          <span>NEWS -</span>
        </p>
      </div>
      
      <!-- Content -->
      <div class="main1_content">
        <div class="newsContent">
          <div class="newsList">
            <div class="newsItem">
              <a href="./page/Minecraft_Page.html"><img src="./assets/images/img_page_Minecraft/minecraft_banner.png" alt="News 1">
              <h3>Minecraft</h3></a>
            </div>
            
            <div class="newsItem">
              <img src="./assets/images/img_news/resident_evil.jpg" alt="News 2">
              <h3>Resident Evil 8</h3>
            </div>
            
            <div class="newsItem">
              <a href="/page/GTA_V_Page.html"><img src="./assets/images/img_news/GTA5.jpg" alt="News 3"></a>
              <h3>Grand Theft Auto V</h3>
            </div>
                                    
            <div class="newsItem">
              <a href="/page/ARK.html"><img src="./assets/images/img_news/ARK.jpg" alt="News 4"></a>
              <h3>ARK : Survival Evolved</h3>
            </div>
                                    
            <div class="newsItem">
              <a href="/page/RedDead_Page.html"><img src="./assets/images/img_news/RDR2.jpg" alt="News 5"></a>
              <h3>Red Dead Dedemption 2</h3>
            </div>
                                    
            <div class="newsItem">
              <a href="/page/Cyberpunk_2077.html"><img src="./assets/images/img_news/Cyberpunk.jpg" alt="News 6"></a>
              <h3>Cyberpunk 2077</h3>
            </div>
            <!-- Thêm các tin tức khác vào đây -->
          </div>
        </div>
      </div>
    </div>    
  </div>
                  
  <div class="botContent" id="botContent">
    <table>
      <tr>
        <td>
          <a href="https://www.playstation.com/en-gb/games/bloodborne/">
            <img src="./assets/images/logo_of_game/logo_bloodborne.png" alt="Image 1">
          </a>
        </td>
        
        <td>
          <a href="https://deltarune.com/">
            <img src="./assets/images/logo_of_game/logo_deltarune.png" alt="Image 2">
          </a>
        </td>
                  
        <td>
          <a href="https://www.supergiantgames.com/games/hades/">
            <img src="./assets/images/logo_of_game/logo_hades.png" alt="Image 3">
          </a>
        </td>
                  
        <td>
          <a href="https://www.hollowknight.com/">
            <img src="./assets/images/logo_of_game/logo_hollow_knight.png" alt="Image 4">
          </a>
        </td>
      </tr>
                
      <tr>
        <td>
          <a href="https://www.monsterhunter.com/">
            <img src="./assets/images/logo_of_game/logo_monster_hunter.png" alt="Image 5">
          </a>
        </td>
                  
        <td>
          <a href="https://www.stardewvalley.net/">
            <img src="./assets/images/logo_of_game/logo_stardew_valley.png" alt="Image 6">
          </a>
        </td>
                  
        <td>
          <a href="https://stray.game/">
            <img src="./assets/images/logo_of_game/logo_stray.png" alt="Image 7">
          </a>
        </td>
                  
        <td>
          <a href="https://undertale.com/">
            <img src="./assets/images/logo_of_game/logo_undertale.png" alt="Image 8">
          </a>
        </td>
      </tr>
    </table>
  </div>
        
        ';
    }

    function footerHTML() {
        echo'
    <div id="Footer">
      <div id="leftFooter">
        <div id="logoFooter">
          <img
            src="./assets/images/icon_LogoHome.png"
            alt="LogoHome"
            onclick="redirectToNewPage()"/>
        </div>

        <div id="footerContent">
          <div id="content1">
            <p class="about"><a href="/page/AboutUs_Page.html">ABOUT</a></p>
            <p id="privacy"><a href="#">PRIVACY</a></p>
          </div>
          <div id="content2">
            <p id="contact"><a href="/page/ContactUs_page.html">CONTACT</a></p>
            <p id="faq"><a href="#">FAQ</a></p>
          </div>
        </div>
      </div>

      <div id="rightFooter">
        <div id="tag"><h2>FOLLOW US</h2></div>
        <div id="iconContact">
          <ul id="content4">
            <li><img src="./assets/images/icon_facebook.png" alt="" /></li>
            <li><img src="./assets/images/icon_instagram.png" alt="" /></li>
            <li><img src="./assets/images/icon_youtube.png" alt="" /></li>
          </ul>
          <ul id="content5">
            <li><img src="./assets/images/icon_discord.png" alt="" /></li>
            <li><img src="./assets/images/icon_tiktok.png" alt="" /></li>
            <li><img src="./assets/images/icon_twitter.png" alt="" /></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="copyrightFooter">
      <div id="content3"><h6>© 2023, All Of Games</h6></div>
    </div>
        
        ';
    }