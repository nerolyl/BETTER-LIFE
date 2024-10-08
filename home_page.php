<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/dbh.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/login_model.inc.php';
require_once 'includes/homepage_view.inc.php';
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
   <!--css style -->
    <link rel="stylesheet" href="css/chart.css">
    <link rel="stylesheet" href="css/calculator.css">
    <link rel="stylesheet" href="css/check_in.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/master.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <header>
    <div class="better_life_header">
      <a href=""><b>BETTER LIFE</b></a>
    </div>
    <div class="items">
      <ul class="ul_header">
        <li class="i_header"><a href=""><?php output_username(); ?></a></li>
        <li class="i_header"><a href="home_page.php">Home </a></li>
        <li class="i_header"><a href="">Settings </a></li>
        <li class="i_header"><form action="includes/logout.inc.php" method="post"><button> log out</button></form></li>
      </ul>
    </div>
  </header>
<section class="check_in">
  <div class="check_in_con">
    <div class="back_line">
      <div class="items_con">
        <div class="line_con">
          <div class="line_1">
            <div class="circle">
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
            <div class="circle">
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
            <div class="circle">
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
            <div class="circle">
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
            <div class="circle">
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
            <div class="circle">
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
            <div class="circle">
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="calorie_calculator">
  <div class="cal_cal_con">
    <div class="cal_fram">
      <div class="titel_cal">
        <h2>Calorie</h2>
      </div>
      <div class="h1_cal">
        <h1>0</h1>
        <h1>/</h1>
        <h1><?php  echo "Max Calorie: " . $max_calorie ?></h1>
      </div>
      <div class="img_cal">
        <img class="img_cal_1" src="img/plus-circle.png" alt="">
        <img class="img_cal_2" src="img/Fire_fill.png" alt="">
      </div>
    </div>
    <div class="cal_fram">
      <div class="titel_cal">
        <h2>Protein</h2>
      </div>
      <div class="h1_cal">
        <h1>0</h1>
        <h1>/</h1>
        <h1>0</h1>
      </div>
      <div class="img_cal">
        <img class="img_cal_1" src="img/plus-circle.png" alt="">
        <img class="img_cal_2" src="img/Protein.png" alt="">
      </div>
    </div>
    <div class="cal_fram">
      <div class="titel_cal">
        <h2>Carbs</h2>
      </div>
      <div class="h1_cal">
        <h1>0</h1>
        <h1>/</h1>
        <h1>0</h1>
      </div>
      <div class="img_cal">
        <img class="img_cal_1" src="img/plus-circle.png" alt="">
        <img class="img_cal_2" src="img/Carbs.png" alt="">
      </div>
    </div>
    <div class="cal_fram">
      <div class="titel_cal">
        <h2>Fats</h2>
      </div>
      <div class="h1_cal">
        <h1>0</h1>
        <h1>/</h1>
        <h1>0</h1>
      </div>
      <div class="img_cal">
        <img class="img_cal_1" src="img/plus-circle.png" alt="">
        <img class="img_cal_2" src="img/Fat.png" alt="">
      </div>
    </div>
  </div>
</section>
<section class="chart">
<canvas id="myChart"></canvas>
    <script src="js/chart.js">
    </script>
</section>
<section class="chat_bot">
        <script type="text/javascript">
            (function(d, t) {
                var v = d.createElement(t), s = d.getElementsByTagName(t)[0];
                v.onload = function() {
                  window.voiceflow.chat.load({
                    verify: { projectID: '66dde9358b24990f9a695982' },
                    url: 'https://general-runtime.voiceflow.com',
                    versionID: 'production'
                  });
                }
                v.src = "https://cdn.voiceflow.com/widget/bundle.mjs"; v.type = "text/javascript"; s.parentNode.insertBefore(v, s);
            })(document, 'script');
          </script>
</section>
</body>
</html>