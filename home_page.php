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
    <link rel="stylesheet" href="css/Food_analysis.css">
    
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
          <?php output_check_in(); ?>
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
            <?php output_check_in2(); ?>
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
          <?php output_check_in3(); ?>
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
          <?php output_check_in4(); ?>
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
          <?php output_check_in5(); ?>
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
          <?php output_check_in6(); ?>
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line">
          <?php output_check_in7(); ?>
              <img class="rectangle" src="img/Rectangle 783.png" alt="">
            </div>
          </div>
          <div class="line_1">
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
        <h1><?php  output_calorie(); ?></h1>
        <h1>/</h1>
        <h1><?php  output_max_calorie(); ?><sub>kcal</sub></h1>
      </div>
      <div class="img_cal">
      <input type="text" class="img_cal_1" placeholder="Add">
        <img class="img_cal_2" src="img/Fire_fill.png" alt="">
      </div>
    </div>
    <div class="cal_fram">
      <div class="titel_cal">
        <h2>Protein</h2>
      </div>
      <div class="h1_cal">
        <h1><?php output_protein() ?></h1>
        <h1>/</h1>
        <h1> <?php output_max_protein() ?><sub>g</sub></h1>
      </div>
      <div class="img_cal">
      <input type="text" class="img_cal_1" placeholder="Add">
        <img class="img_cal_2" src="img/Protein.png" alt="">
      </div>
    </div>
    <div class="cal_fram">
      <div class="titel_cal">
        <h2>Carbs</h2>
      </div>
      <div class="h1_cal">
        <h1><?php output_carbs() ?></h1>
        <h1>/</h1>
        <h1><?php output_max_carbs() ?><sub>g</sub></h1>
      </div>
      <div class="img_cal">
      <input type="text" class="img_cal_1" placeholder="Add">
        <img class="img_cal_2" src="img/Carbs.png" alt="">
      </div>
    </div>
    <div class="cal_fram">
      <div class="titel_cal">
        <h2>Fats</h2>
      </div>
      <div class="h1_cal">
        <h1><?php output_fat() ?></h1>
        <h1>/</h1>
        <h1><?php output_max_fat() ?><sub>g</sub> </h1>
      </div>
      <div class="img_cal">
      <input type="text" class="img_cal_1" placeholder="Add">
        <img class="img_cal_2" src="img/Fat.png" alt="">
      </div>
    </div>
  </div>
</section>
<div class="conn">
<section class="chart">
<canvas id="myChart"></canvas>

<script>
  // Retrieve the nutrition data for the entire week from the session and parse it as JSON
  const sun = <?php echo json_encode($_SESSION["user_sunday_nutrition"]) ?>;
  const mon = <?php echo json_encode($_SESSION["user_monday_nutrition"]) ?>;
  const tue = <?php echo json_encode($_SESSION["user_tuesday_nutrition"]) ?>;
  const wed = <?php echo json_encode($_SESSION["user_wednesday_nutrition"]) ?>;
  const thu = <?php echo json_encode($_SESSION["user_thursday_nutrition"]) ?>;
  const fri = <?php echo json_encode($_SESSION["user_friday_nutrition"]) ?>;
  const sat = <?php echo json_encode($_SESSION["user_saturday_nutrition"]) ?>;

  // Split the comma-separated strings into arrays of numbers
  const [sunCalories, sunProtein, sunCarbs, sunFat] = sun.split(',').map(Number);
  const [monCalories, monProtein, monCarbs, monFat] = mon.split(',').map(Number);
  const [tueCalories, tueProtein, tueCarbs, tueFat] = tue.split(',').map(Number);
  const [wedCalories, wedProtein, wedCarbs, wedFat] = wed.split(',').map(Number);
  const [thuCalories, thuProtein, thuCarbs, thuFat] = thu.split(',').map(Number);
  const [friCalories, friProtein, friCarbs, friFat] = fri.split(',').map(Number);
  const [satCalories, satProtein, satCarbs, satFat] = sat.split(',').map(Number);

 
  var ctx = document.getElementById('myChart').getContext('2d');


  var myChart = new Chart(ctx, {
    type: 'bar', 
    data: {
      labels: ['Calories', 'Protein', 'Carbs', 'Fat'], 
      datasets: [
        {
          label: 'Sunday Nutrition',
          data: [sunCalories, sunProtein, sunCarbs, sunFat], 
          backgroundColor: ['#5B246B', '#392141', '#E2C5EB', '#F3CAFF'], 
        },
        {
          label: 'Monday Nutrition',
          data: [monCalories, monProtein, monCarbs, monFat], 
          backgroundColor: ['#C9C5EB', '#8880BF', '#2D246B', '#242141'], 
        },
        {
          label: 'Tuesday Nutrition', 
          data: [tueCalories, tueProtein, tueCarbs, tueFat], 
          backgroundColor: ['#FFB6C1', '#FF69B4', '#FF1493', '#DB7093'], 
        },
        {
          label: 'Wednesday Nutrition', 
          data: [wedCalories, wedProtein, wedCarbs, wedFat], 
          backgroundColor: ['#FFD700', '#FFA500', '#FF8C00', '#FF4500'], 
        },
        {
          label: 'Thursday Nutrition', 
          data: [thuCalories, thuProtein, thuCarbs, thuFat], 
          backgroundColor: ['#8A2BE2', '#7B68EE', '#6A5ACD', '#483D8B'], 
        },
        {
          label: 'Friday Nutrition',
          data: [friCalories, friProtein, friCarbs, friFat], 
          backgroundColor: ['#00FA9A', '#00FF7F', '#3CB371', '#2E8B57'], 
        },
        {
          label: 'Saturday Nutrition', 
          data: [satCalories, satProtein, satCarbs, satFat], 
          backgroundColor: ['#FF6347', '#FF4500', '#FF0000', '#DC143C'], 
        }
      ]
    },

    }
  );
</script>

</section>
<section class="food_analysis">
  <div class="drag-area">
    <h1>Check out the calories in</h1>
    <h2>your meal!</h2>
      <div class="input">
        <input type="file" class="file1" id="imageInput">
      <button class="submit_btn" onclick="uploadImage()">Upload</button>
    </div>
  </div>
  <h1 class="result1"><pre id="results"></pre></H1>

  
  <script>
        function uploadImage() {
            const imageInput = document.getElementById('imageInput');
            const file = imageInput.files[0];

            if (!file) {
                alert("Please select an image.");
                return;
            }

            const formData = new FormData();
            formData.append('image', file);

            fetch('http://127.0.0.1:5000/analyze_food', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('results').textContent = data.error;
                } else {
                    document.getElementById('results').textContent = JSON.stringify(data, null, 2);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
 </section>
</div>
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