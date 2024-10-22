<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/dbh.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/login_model.inc.php';
require_once 'includes/homepage_view.inc.php';
require_once 'includes/settings_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">


<!--css style -->
    <link rel="stylesheet" href="css/other_settings.css">
    <link rel="stylesheet" href="css/edit_goals.css">
    <link rel="stylesheet" href="css/user_settings.css">
    <link rel="stylesheet" href="css/left.nav.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/header.css">
<!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
</head>
<body>
<header class="sett">
    <div class="better_life_header">
      <a href=""><b>BETTER LIFE</b></a>
    </div>
    <div class="items">
      <ul class="ul_header">
      <li class="i_header"><a href="home_page.php">Home </a></li>
        <li class="i_header"> <button onClick="document.getElementById('user_set').scrollIntoView();">Profile </button></li>
        <li class="i_header"><button onClick="document.getElementById('other_set').scrollIntoView();">Settings </button></li>
        <li class="i_header"><form action="includes/logout.inc.php" method="post"><button> log out</button></form></li>
      </ul>
    </div>
    </header>
<section class="left_nav">
        <div class="l_n_con">
            <div class="l_n_items">
                <div class="l_n_i">
                    <img src="img/Avatar.png" alt="">
                        <h1><?php output_username() ?></h1>
                            </div>
                                <ul class="l_n_ul">
                                    <li class="l_n_i"><button onClick="document.getElementById('user_set').scrollIntoView();">User Settings</button></li><hr>
                                    <li class="l_n_i"><button onClick="document.getElementById('edit_goals').scrollIntoView();">Edit Goals</button></li><hr>
                                    <li class="l_n_i"><button onClick="document.getElementById('other_set').scrollIntoView();">Other settings</button></li><hr>
                                </ul>
            </div>
    </section>

<section class="user_set" id="user_set">
        <div class="user_set_con">
            <div class="user_title">
                <h1>User Settings:</h1>
                </div>     
                    <div class="usen_in">
                        <input type="text"placeholder= "<?php output_username() ?>"></input>
                        </div>
                            <div class="user_img">
                                <img src=" img/Avatar.png" alt="">
                                <input type="file" name="" value="">
                                <button>save changes</button>
                                </div>
                                <hr>       
            </div>
    </section>
<section class="edit_goals" id="edit_goals">
    <div class="edie_con">
        <div class="edit_title">
            <h1>Edit Goals:</h1>
            </div>
                <div class="edit_g_img">
                    <form action="includes/Update_weight_goal.php" method="post">
                    <label>
                        <input type="radio" name="weight" value="0.7" <?php output_weight_goal_lose() ?>>
                        <img src=" img\Lose weight Not active.png" alt="Lose Weight" >
                    </label>
                    <label>
                        <input type="radio" name="weight" value="1" <?php output_weight_goal_maintain()?>>
                        <img src=" img\Maintain Weight not Active.png">
                    </label>
                    <label>
                        <input type="radio" name="weight" value="1.3" <?php output_weight_goal_gain() ?>>
                        <img src=" img\Gain weight not active.png">
                    </label>
                    <button>save changes</button>
                    </form>
                </div>
                <hr>
            </div>
    </section>
<section class="other_set" id="other_set">
    <div class="other_con">
        <div class="other_title">
            <h1>Other Settings:</h1>
            <h2>Edit Body Information:</h2>
        </div>
            <div class="body_con">
                <div class="body_info">
                    <label for="age">Age:</label><br>
                    <input type="number" id="age" name="age" placeholder="<?php output_age() ?>">
                </div>
                <div class="body_info">
                    <label for="weight">Weight (kg):</label><br>
                    <input type="number" id="weight" name="weight" placeholder="<?php output_weight() ?>">
                </div>
            </div>
            <div class="body_info">
                <label for="height">Height(cm):</label><br>
                <input type="number" id="height" name="height" placeholder="<?php output_height() ?>">
            </div>
        <div class="account_info">
            <div class="account_i_title">
                <h2>Account:</h2>
            </div>
            <div class="account_info">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" placeholder="<?php output_email() ?>">
                </div>
                <div class="account_info">
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
            <button>save changes</button>
            <hr>
            
        </div>
        <div class="delete_account">
            <h2>Delete Account:</h2>
            <button>Delete Account</button>
    </div>
</section>
</body>
</html>
