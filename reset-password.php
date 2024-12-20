<?php
$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/includes/dbh.inc.php";

$sql = "SELECT * FROM users WHERE reset_token_hash = ?";
$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    die("Invalid token");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token expired");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/password.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            background-image: url("img/Firefly Vintage bg.png");
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>
<body>
    <section class="register_container">
        <div class="register_imgs">
            <div class="password_img_2">
                <img src="img/Form Poster.png" alt="Form Poster">
            </div>
        </div>
        <div class="inputs">
            <form action="includes/update-password.php" method="post">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
                <div>
                    <label for="password">New Password:</label><br>
                    <input type="password" id="password" name="password" placeholder="Enter New Password" required>
                </div>
                <div>
                    <label for="confirm_password">Confirm New Password:</label><br>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm New Password" required>
                </div>
                <div class="register_btn">
                    <button type="submit">Reset</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
