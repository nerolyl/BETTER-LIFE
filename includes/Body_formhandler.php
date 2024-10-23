<?php
require_once 'dbh.inc.php';
require_once 'config_session.inc.php';

try {
    // Ensure $pdo is a valid PDO object
    if (!($pdo instanceof PDO)) {
        throw new Exception("Database connection failed code: #BFP");
    }

    // Retrieve form data
    $userId = $_SESSION["user_id"];
    $age = isset($_POST["age"]) && is_numeric($_POST["age"]) ? $_POST["age"] : null;
    $weight = isset($_POST["weight"]) && is_numeric($_POST["weight"]) ? $_POST["weight"] : null;
    $height = isset($_POST["height"]) && is_numeric($_POST["height"]) ? $_POST["height"] : null;

    // Prepare the SQL statement to update the user's weight, age, and height
    $sql = "UPDATE users SET ";
    $params = [];
    if ($age !== null) {
        $sql .= "age = :age, ";
        $params[':age'] = $age;
    }
    if ($weight !== null) {
        $sql .= "weight = :weight, ";
        $params[':weight'] = $weight;
    }
    if ($height !== null) {
        $sql .= "height = :height, ";
        $params[':height'] = $height;
    }
    $sql = rtrim($sql, ', ') . " WHERE id = :id";
    $params[':id'] = $userId;

    $stmt = $pdo->prepare($sql);

    // Bind the parameters and execute the statement
    foreach ($params as $key => &$val) {
        $stmt->bindParam($key, $val);
    }
    $stmt->execute();

    // Update the session variables
    if ($age !== null) {
        $_SESSION["user_age"] = $age;
    }
    if ($weight !== null) {
        $_SESSION["user_weight"] = $weight;
    }
    if ($height !== null) {
        $_SESSION["user_height"] = $height;
    }

    // Refresh the page
    header("Location: ../Settings.php");
    exit();
} catch (Exception $e) {
    // Log the error message
    error_log("Error in body info update: " . $e->getMessage());
    echo "An error occurred. Please try again later.";
}
?>