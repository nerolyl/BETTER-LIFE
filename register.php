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
                    <!-- tooltip -->
                    <div class ="tooltip_r">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="50px" height="50px" fill-rule="nonzero"><g fill="#5a246b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M25,2c-12.6907,0 -23,10.3093 -23,23c0,12.69071 10.3093,23 23,23c12.69071,0 23,-10.30929 23,-23c0,-12.6907 -10.30929,-23 -23,-23zM25,4c11.60982,0 21,9.39018 21,21c0,11.60982 -9.39018,21 -21,21c-11.60982,0 -21,-9.39018 -21,-21c0,-11.60982 9.39018,-21 21,-21zM25,11c-1.65685,0 -3,1.34315 -3,3c0,1.65685 1.34315,3 3,3c1.65685,0 3,-1.34315 3,-3c0,-1.65685 -1.34315,-3 -3,-3zM21,21v2h1h1v13h-1h-1v2h1h1h4h1h1v-2h-1h-1v-15h-1h-4z"></path></g></g></svg>
                        <span class="tooltiptext_r">We collect information about your body to determine the daily amounts of nutrients you need.</span>
                    </div>
                    <!-- end -->
                    <input type="number" placeholder="Age" name="age" id="age">
                    <input type="radio" id="male" name="gender" value="161">
                    <label class="label_style" for="male">MALE</label>
                    <input type="radio" id="female" name="gender" value="-5">
                    <label class="label_style" for="female">FEMALE</label><br>
                    <label class="select_div" for="activity_level">activity level:</label>
                    <select name="activity_level" id="activity_level" required>
                        <option value="1.2">Sedentary</option>
                        <option value="1.375">Lightly active </option>
                        <option value="1.55">Moderately active</option>
                        <option value="1.725">Active </option>
                        <option value="1.9">Very active</option>
                    </select>
                    
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
                   

    