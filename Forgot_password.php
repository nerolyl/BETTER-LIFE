<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/forgot_password.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot_password</title>
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
            
            <div class="register_img_2" >
                <img src="img/Form Poster.png" alt="">
            </div>
            <div class="inputs">
                <form action="includes/formhandler3.inc.php" method="POST"">
                    
                    <input type="email" name="email" id="email" placeholder="Enter your Email" required> <br>
                    
                    <div class="register_btn">
                        
                        <button >Reset Password</button>
                    </div>
                </form>
               <!--   <div class="form_error"> 
                    <p>Fill in all fields</p>
                </div> -->
            </div>
        </div>

        </section>
</body>
</html>
