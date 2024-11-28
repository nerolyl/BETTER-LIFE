<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/email.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {      
            background-image: url("img/Firefly Vintage bg.png");      
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>
<body>
    <section class="emil">
        <div class="img_form">
            <img src="img/Form Poster.png" alt="">
        </div>

        <div class="inform">
            <form action="includes/formhandler3.inc.php" method="POST">
                <input type="email" name="email" id="email" placeholder="Enter your Email" required> <br>
                <div class="email_btn">
                    <button>Send</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>

