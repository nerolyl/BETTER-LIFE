<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/register_view.inc.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/register.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body{      
            background-image:  url("img/Firefly\ Vintage\ bg.png");      
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>
<body>
    <section class="register_contianer">
        <div class="register_imgs">
            <div class="register_img_1">
                <img src="img/Firefly Vintage register.png" alt="">
            </div>
            <div class="register_img_2" >
                <img src="img/Form Poster.png" alt="">
            </div>
            <div class="inputs">
            <form action="includes/formhandler.inc.php" method="post">
                    <input type="text"placeholder="Username"> <br>
                    <input type="email" name="" id="" placeholder="Email"> <br>
                    <input type="password" name="" id="" placeholder="Password"><br>
                    
                    <input type="number" placeholder="Weight (kg)">
                    <input type="number" placeholder="Hight (cm)">
                    <input type="number" placeholder="Age">
                    <input type="radio" id="male" name="gender">
                    <label class="label_stayle" for="male" id="">MALE</label>
                    <input type="radio" id="FEMALE" name="gender">
                    <label class="label_stayle" for="FEMALE" id="">FEMALE</label><br>
                    <div class="register_btn">
                        <a href="Login.php">Login</a>
                        <button >Register</button>
                    </div>
                </form>
                <div class="form_error">
                <?php
                check_register_error () ;
                ?>
                </div>
            </div>
        </div>

        </section>
</body>
</html>
                   

    