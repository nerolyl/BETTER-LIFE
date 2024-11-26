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
  <!--css style -->
  <link rel="stylesheet" href="css/Food_analysis.css">
  <link rel="stylesheet" href="css/chart.css">
  <link rel="stylesheet" href="css/calculator.css">
  <link rel="stylesheet" href="css/check_in.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/master.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- meta -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
</head>

<body>
  <header class="hom_p">
    <div class="better_life_header">
      <a href=""><b>BETTER LIFE</b></a>
    </div>
    <div class="items">
      <ul class="ul_header">
        <li class="i_header"><a href=""><?php output_username(); ?></a></li>
        <li class="i_header"><a href="home_page.php">Home </a></li>
        <li class="i_header"><a href="Settings.php">Settings </a></li>
        <li class="i_header">
          <form action="includes/logout.inc.php" method="post"><button> log out</button></form>
        </li>
      </ul>
    </div>
  </header>

  <section class="check_in">
    <div class="checkin_con">
      <div class=" checkin_bkg">
        <div class=" checckin_itemscon">
                  <!-- tooltip -->
                  <div class ="tooltip_c_i">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="50px" height="50px" fill-rule="nonzero"><g fill="#5a246b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M25,2c-12.6907,0 -23,10.3093 -23,23c0,12.69071 10.3093,23 23,23c12.69071,0 23,-10.30929 23,-23c0,-12.6907 -10.30929,-23 -23,-23zM25,4c11.60982,0 21,9.39018 21,21c0,11.60982 -9.39018,21 -21,21c-11.60982,0 -21,-9.39018 -21,-21c0,-11.60982 9.39018,-21 21,-21zM25,11c-1.65685,0 -3,1.34315 -3,3c0,1.65685 1.34315,3 3,3c1.65685,0 3,-1.34315 3,-3c0,-1.65685 -1.34315,-3 -3,-3zM21,21v2h1h1v13h-1h-1v2h1h1h4h1h1v-2h-1h-1v-15h-1h-4z"></path></g></g></svg>
            <span class="tooltiptext_ci">Daily check in: where you'll see your daily check in streak, try to get all 7 before the end of the week. </span>
          </div>
            <!-- end -->
          <div class="line">
          </div>
          <?php output_check_in(); ?>
          <div class="items_3">
            <h3 <?php output_check_in_text(); ?>> Day</h3>
            <h1 <?php output_check_in_text(); ?>>1</h1>
          </div>
        </div>
        <div class="line">
        </div>
        <?php output_check_in2(); ?>
          <div class="items_3">
            <h3 <?php output_check_in_text2(); ?>>Day</h3>
            <h1 <?php output_check_in_text2(); ?>>2</h1>
          </div>
        </div>
        <div class="line">
        </div>
        <?php output_check_in3(); ?>
        <div class="items_3">
          <h3 <?php output_check_in_text3(); ?>>Day</h3>
          <h1 <?php output_check_in_text3(); ?>>3</h1>
        </div>
      </div>
      <div class="line">
      </div>
      <?php output_check_in4(); ?>
        <div class="items_3">
          <h3 <?php output_check_in_text4(); ?>>Day</h3>
          <h1 <?php output_check_in_text4(); ?>>4</h1>
        </div>
      </div>
      <div class="line">
      </div>
      <?php output_check_in5(); ?>
        <div class="items_3">
          <h3 <?php output_check_in_text5(); ?>>Day</h3>
          <h1 <?php output_check_in_text5(); ?>>5</h1>
        </div>
      </div>
      <div class="line">
      </div>
      <?php output_check_in5(); ?>
        <div class="items_3">
          <h3 <?php output_check_in_text6(); ?>>Day</h3>
          <h1 <?php output_check_in_text6(); ?>>6</h1>
        </div>
      </div>
      <div class="line">
      </div>
      <?php output_check_in7(); ?>
        <div class="items_3">
          <h3 <?php output_check_in_text7(); ?>>Day</h3>
          <h1 <?php output_check_in_text7(); ?>>7</h1>
        </div>
      </div>
      <div class=" line">

      </div>
    </div>
    </div>
    </div>
  </section>
  <section class="calorie_calculator">
    <div class="c_c_con">
      <div class="c_t_con">
                  <!-- tooltip -->
                  <div class ="tooltip_c_c">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="50px" height="50px" fill-rule="nonzero"><g fill="#5a246b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M25,2c-12.6907,0 -23,10.3093 -23,23c0,12.69071 10.3093,23 23,23c12.69071,0 23,-10.30929 23,-23c0,-12.6907 -10.30929,-23 -23,-23zM25,4c11.60982,0 21,9.39018 21,21c0,11.60982 -9.39018,21 -21,21c-11.60982,0 -21,-9.39018 -21,-21c0,-11.60982 9.39018,-21 21,-21zM25,11c-1.65685,0 -3,1.34315 -3,3c0,1.65685 1.34315,3 3,3c1.65685,0 3,-1.34315 3,-3c0,-1.65685 -1.34315,-3 -3,-3zM21,21v2h1h1v13h-1h-1v2h1h1h4h1h1v-2h-1h-1v-15h-1h-4z"></path></g></g></svg>
            <span class="tooltiptext_c_c"> Nutrients Dashboard: Here, you'll see you're daily max intake, your current intake, and you can add the nutrients you have consumed. note it will reset in the end of the day </span>
          </div>
            <!-- end -->
        <div class="item_con">
          <div class="item1">
            <h3>Calorie</h3>
            <div class="item_ins">
              <h1><?php output_calorie(); ?></h1>
              <h1>/</h1>
              <h1><?php output_max_calorie(); ?><sub>kcal</sub></h1>
            </div>
          </div>
          <div class="item2">
            <div class="item2_jst">
              <form action="includes/calorie_formhandler.php" method="post">
                <div class=" item_ins2">
                  <input type="number" id=calorie name=calorie>
                  <button type="submit">Add</button>
                </div>
              </form>
              <div class="img_pad">
                <img src=" img\Fire_fill.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="c_t_con">
        <div class="item_con">
          <div class="item1">
            <h3>Protein</h3>
            <div class="item_ins">
              <h1><?php output_protein() ?></h1>
              <h1>/</h1>
              <h1> <?php output_max_protein() ?><sub>g</sub></h1>
            </div>
          </div>
          <div class="item2">
            <div class="item2_jst">
              <form action="includes/protein_formhandler.php" method="post">
                <div class=" item_ins2">
                  <input type="number" id="protein" name="protein">
                  <button type="submit">Add</button>
              </form>
            </div>
            <div class="img_pad">
              <img src=" img\Protein.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c_t_con">
      <div class="item_con">
        <div class="item1">
          <h3>Carbs</h3>
          <div class="item_ins">
            <h1><?php output_carbs() ?></h1>
            <h1>/</h1>
            <h1><?php output_max_carbs() ?><sub>g</sub></h1>
          </div>
        </div>
        <div class="item2">
          <div class="item2_jst">
            <form action="includes/carbs_formhandler.php" method="post">
              <div class=" item_ins2">
                <input type="number" id="carbs" name="carbs">
                <button type="submit">Add</button>
            </form>
          </div>
          <div class="img_pad">
            <img src=" img\Carbs.png" alt="">
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="c_t_con">
      <div class="item_con">
        <div class="item1">
          <h3>Fats</h3>
          <div class="item_ins">
            <h1><?php output_fat() ?></h1>
            <h1>/</h1>
            <h1><?php output_max_fat() ?><sub>g</sub> </h1>
          </div>
        </div>
        <div class="item2">
          <div class="item2_jst">
            <form action="includes/fats_formhandler.php" method="post">
              <div class=" item_ins2">
                <input type="number" id="fat" name="fat">
                <button type="submit">Add</button>
            </form>
          </div>
          <div class="img_pad">
            <img src=" img\Fat.png" alt="">
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>
  <div class="conn">
    <section class="chart">
        <!-- tooltip -->
        <div class="tooltip_c">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="3.125rem" height="1.5rem" fill-rule="nonzero">
                <g fill="#5a246b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <g transform="scale(5.12,5.12)">
                        <path d="M25,2c-12.6907,0 -23,10.3093 -23,23c0,12.69071 10.3093,23 23,23c12.69071,0 23,-10.30929 23,-23c0,-12.6907 -10.30929,-23 -23,-23zM25,4c11.60982,0 21,9.39018 21,21c0,11.60982 -9.39018,21 -21,21c-11.60982,0 -21,-9.39018 -21,-21c0,-11.60982 9.39018,-21 21,-21zM25,11c-1.65685,0 -3,1.34315 -3,3c0,1.65685 1.34315,3 3,3c1.65685,0 3,-1.34315 3,-3c0,-1.65685 -1.34315,-3 -3,-3zM21,21v2h1h1v13h-1h-1v2h1h1h4h1h1v-2h-1h-1v-15h-1h-4z"></path>
                    </g>
                </g>
            </svg>
            <span class="tooltiptext_c">Weekly nutrition chart: this chart will display your past nutrition it will be recorded at the end of the day, you can click the days on top of the chart to filter the days you want to be displayed.</span>
        </div>
        <!-- end -->
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
            datasets: [{
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
                backgroundColor: ['#2C246B', '#24336B', '#44246B', '#24496B'],
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

        });
      </script>

    </section>
    <section class="food_analysis">
      <!-- tooltip -->
<div class ="tooltip_f_a">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="50px" height="50px" fill-rule="nonzero"><g fill="#5a246b" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M25,2c-12.6907,0 -23,10.3093 -23,23c0,12.69071 10.3093,23 23,23c12.69071,0 23,-10.30929 23,-23c0,-12.6907 -10.30929,-23 -23,-23zM25,4c11.60982,0 21,9.39018 21,21c0,11.60982 -9.39018,21 -21,21c-11.60982,0 -21,-9.39018 -21,-21c0,-11.60982 9.39018,-21 21,-21zM25,11c-1.65685,0 -3,1.34315 -3,3c0,1.65685 1.34315,3 3,3c1.65685,0 3,-1.34315 3,-3c0,-1.65685 -1.34315,-3 -3,-3zM21,21v2h1h1v13h-1h-1v2h1h1h4h1h1v-2h-1h-1v-15h-1h-4z"></path></g></g></svg>
<span class="tooltiptext_f_a">food analyzer: powered by Foodvisor, it scans your food to give you nutritional info about your food, you can add your food to the dashboard by pressing the ADD button

</span>
</div>
<!-- end -->  
      <div class=" drag-areapa">
        <div class="drag-area">
          <h1>Check out the calories in</h1>
          <h2>your meal!</h2>
          <div class="input">
            <input type="file" class="file1" id="imageInput">
            <button class="submit_btn" onclick="uploadImage()">Upload</button>
          </div>
        </div>
      </div>
      <div class="result_bg">
      <form id="nutritionForm" action="includes/update_nutrition.php" method="POST">
    <input type="hidden" name="calorie" id="calorie">
    <input type="hidden" name="carbs" id="carbs">
    <input type="hidden" name="fat" id="fat">
    <input type="hidden" name="protein" id="protein">
    <button type="button" id="addButton">Add</button>
</form>
        <h1 class="result1">

          <pre id="results"></pre>
        </H1>
      </div>

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
                document.getElementById('results').textContent = data.output;
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
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
    
    <script>
    document.getElementById('addButton').addEventListener('click', function() {
        // Select the element with class 'result1' inside an <h1> tag
        const resultElement = document.querySelector("h1.result1");
        
        if (resultElement) {
            // Get the text content of the selected element
            const content = resultElement.textContent;
            
            // Define a regular expression to extract nutrition information
            const regex = /Total calories: (\d+(\.\d+)?)[\s\S]*Total proteins: (\d+(\.\d+)?)[\s\S]*Total carbs: (\d+(\.\d+)?)[\s\S]*Total fat: (\d+(\.\d+)?)/;
            
            // Match the content against the regular expression
            const matches = content.match(regex);
    
            if (matches) {
                // Extract the matched groups for calories, proteins, carbs, and fat
                const calorie = matches[1];
                const protein = matches[3];
                const carbs = matches[5];
                const fat = matches[7];
    
                // Create a FormData object to hold the form data
                const formData = new FormData();
                formData.append('calorie', calorie);
                formData.append('protein', protein);
                formData.append('carbs', carbs);
                formData.append('fat', fat);
    
                // Send the form data using fetch to the specified PHP script
                fetch('includes/update_nutrition.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    // Refresh the page to reflect the updated values
                    window.location.reload();
                })
                .catch(error => {
                    console.error("Error:", error);
                    // Refresh the page even if there is an error
                    window.location.reload();
                });
            } else {
                console.error("Failed to parse nutrition information from content:", content);
                // Refresh the page even if parsing fails
                window.location.reload();
            }
        } else {
            console.error("Element with class 'result1' not found.");
            // Refresh the page even if the element is not found
            window.location.reload();
        }
    });
    </script>

</body>

</html>