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
                    <input type="text" placeholder="Username" name="username" id="username"> <br>
                    <input type="email" placeholder="Email" name="email" id="email"> <br>
                    <input type="password" placeholder="Password" name="pwd" id="pwd"><br>
                    <input type="number" placeholder="Weight (kg)" name="weight" id="weight">
                    <input type="number" placeholder="Height (cm)" name="height" id="height">
                    <input type="number" placeholder="Age" name="age" id="age">
                    <input type="radio" id="male" name="gender" value="-5">
                    <label class="label_style" for="male">MALE</label>
                    <input type="radio" id="female" name="gender" value="161">
                    <label class="label_style" for="female">FEMALE</label><br>
                    <div class="register_btn">
                        <a href="Login.php">Login</a>
                        <button type="submit">Register</button>
                    </div>
                </form>
            </div>
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
                   

    