<?php
require_once 'dbh.inc.php';
require_once 'config_session.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["user_id"])) {
        die("User is not logged in.");
    }

    $userId = $_SESSION["user_id"];
    $email = isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ? $_POST["email"] : null;
    $pwd = isset($_POST["pwd"]) && !empty($_POST["pwd"]) ? $_POST["pwd"] : null;

    try {
        if (!($pdo instanceof PDO)) {
            throw new Exception("Database connection failed");
        }

        $sql = "UPDATE users SET ";
        $params = [];
        if ($email !== null) {
            $sql .= "email = :email, ";
            $params[':email'] = $email;
        }
        if ($pwd !== null) {
            // Hash the password before storing it
            $passwordHash = password_hash($pwd, PASSWORD_DEFAULT);
            $sql .= "pwd = :pwd, ";
            $params[':pwd'] = $passwordHash;
        }
        $sql = rtrim($sql, ', ') . " WHERE id = :id";
        $params[':id'] = $userId;

        $stmt = $pdo->prepare($sql);

        foreach ($params as $key => &$val) {
            $stmt->bindParam($key, $val);
        }
        $stmt->execute();

        if ($email !== null) {
            $_SESSION["user_email"] = $email;
        }

            // Refresh the page
    header("Location: ../Settings.php");

        echo "Profile updated successfully.";
    } catch (Exception $e) {
        error_log("Error in account info update: " . $e->getMessage());
        echo "An error occurred while updating your information. Please try again.";
    }
} else {
    header("Location: ../Settings.php");
    die();
}
?>