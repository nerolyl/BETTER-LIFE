<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/register.css">
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
                    <input type="text"placeholder="Username" name="username" required> <br>
                    <input type="text" name="email" id="email" placeholder="Email" required> <br>
                    <input type="password" name="pwd" id="pwd" placeholder="Password" required><br>
                    <!--<input type="password" name="" id="" placeholder="Retype Password"><br>-->
                    <input type="Weight" name="weight" placeholder="Weight (kg)" required>
                    <input type="Hight" name="height" placeholder="Height (cm)" required>
                    <input type="Age"  name="age" placeholder="Age" required>
                    <input type="radio" id="male" name="gender" value=(-5)>
                    <label class="label_stayle" for="male" id="">MALE</label>
                    <input type="radio" id="FEMALE" name="gender" value=(161)>
                    <label class="label_stayle" for="FEMALE" id="">FEMALE</label><br>
                    <div class="register_btn">
                        <a href="#">Login</a>
                        <button >Register</button>
                    </div>
                </form>
            </div>
        </div>

        </section>
</body>
</html>