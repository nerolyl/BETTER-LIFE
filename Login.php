<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/lohin.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{      
            background-image:  url("img/Firefly\ Vintage\ bg.png");      
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>
<body>
    <section class="login">
<div class="login_container">
    <div class="Login_img_1">
        <img src="img/Firefly Vintage Log in in 20s poster Style 53278 copy (1) 1.png" alt="">
    </div>
    <div class="Login_img_2" >
        <img src="img/Form Poster.png" alt="">
    </div>
    <div class="inputs">
        <form action="includes/formhandler2.inc.php" method="post">
            <input type="text"placeholder="Username" name="username"> <br>
            <input type="password" name="pwd" id="pwd" placeholder="Password"><br>
            <div class="login_btn">
                <a href="register.php">register</a>
                <button class="btn1">Log in</button>
            </div>
        </form>
        
        <?php
        check_login_error();

        ?>

    </div>
</div>
    </section>
</body>
</html>