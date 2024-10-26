<?php
$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/dbh.inc.php";

$sql = "SELECT * FROM users WHERE reset_token_hash = ?";
$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

try{
if ($user === null) {
    die("Invalid token");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token expired");
}

if ($_POST["password"] !== $_POST["confirm_password"]) {
    die("Passwords do not match");
}

$pwd = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE users
        SET pwd = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE id = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("ss", $pwd, $user["id"]);
$stmt->execute();

echo "Password updated";

header("refresh:2;url=../Login.php");
exit();}
catch (Exception $e) {
    // Log the error message
    error_log("Error in password reset: " . $e->getMessage());
    echo "An error occurred. Please try again later.";
}