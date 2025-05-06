<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="icon" href="../assets/images/icon_miniLogoHome.png">
    <script language="JavaScript" src="../scripts/signup.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <title>Account Center</title>
    <style>
        body {
            background-color: orange !important;
        }
        .btn-orange {
            background-color: orange !important;
            border-color: orange !important;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="content">
            <div class="avatar">
                <img src="../assets/images/icon_logoHome.png" alt="avatar">
                <h1>Sign Up</h1>
            </div>
        
            <div class="login">
              <form name="registerForm" onsubmit="return validateRegistration()" style="display: flex;flex-direction: column;gap: 10px;">
                  <input type="text" size="20" name="userName" class="input-signup-username" placeholder="Email" style="width: 300px;height: 30px;border: 2px solid black;border-radius: 5px;">
                  <input type="password" size="20" name="password" class="input-signup-password" placeholder="Password" style="width: 300px;height: 30px;border: 2px solid black;border-radius: 5px;">
                  <input type="password" size="20" name="confirmPassword" placeholder="Confirm Password" style="width: 300px;height: 30px;border: 2px solid black;border-radius: 5px;">
                  <input type="submit" name="registerButton" value="Register" class="signup__signInButton" style="width: 150px;height: 30px;margin-left: auto;margin-right: auto;border: 2px solid black;border-radius: 10px;color: white;background-color: red;font-weight: bolder;font-size: 17px;">
              </form>
          </div>
            
            <div>
                <p>Or Sign Up With</p>
            </div>
            
            <div class="logo">
                <div class="logoimg"><img src="../assets/images/icon_facebook.png" alt="facebook"></div>
                <div class="logoimg"><img src="../assets/images/icon_discord.png" alt="discord"></div>
                <div class="logoimg"><img src="../assets/images/icon_instagram.png" alt="instagram"></div>
            </div>
        
            <div > <a href="login.php" style="color: black;text-decoration: none;">
              <p>I have an Account</p>

            </a> 
            </div>
        
            <div style="font-size: small;">
                Copyright © 2023. AllOfGames.
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
