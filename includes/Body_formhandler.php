<?php
require_once 'dbh.inc.php';
require_once 'config_session.inc.php';

try {
    // Retrieve form data
    $userId = $_SESSION["user_id"];
    $age = isset($_POST["age"]) && is_numeric($_POST["age"]) ? $_POST["age"] : null;
    $weight = isset($_POST["weight"]) && is_numeric($_POST["weight"]) ? $_POST["weight"] : null;
    $height = isset($_POST["height"]) && is_numeric($_POST["height"]) ? $_POST["height"] : null;
    $activity_level = isset($_POST["activity_level"]) ? $_POST["activity_level"] : null;

    // Prepare the SQL statement to update the user's weight, age, height, and activity level
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
    if ($activity_level !== null) {
        $sql .= "activity_level = :activity_level, ";
        $params[':activity_level'] = $activity_level;
    }
    $sql = rtrim($sql, ', ') . " WHERE id = :id";
    $params[':id'] = $userId;

    $stmt = $pdo->prepare($sql);

    // Bind the parameters and execute the statement
    foreach ($params as $key => &$val) {
        $stmt->bindParam($key, $val);
    }
    $stmt->execute();

    // Fetch the updated values from the database
    $stmt = $pdo->prepare("SELECT age, weight, height, activity_level, max_calorie, max_protein, max_carbs, max_fat FROM users WHERE id = :id");
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Update the session variables with htmlspecialchars
    if ($result) {
        $_SESSION["user_age"] = htmlspecialchars($result["age"], ENT_QUOTES, 'UTF-8');
        $_SESSION["user_weight"] = htmlspecialchars($result["weight"], ENT_QUOTES, 'UTF-8');
        $_SESSION["user_height"] = htmlspecialchars($result["height"], ENT_QUOTES, 'UTF-8');
        $_SESSION["user_activity_level"] = htmlspecialchars($result["activity_level"], ENT_QUOTES, 'UTF-8');
        $_SESSION["user_max_calorie"] = htmlspecialchars($result["max_calorie"], ENT_QUOTES, 'UTF-8');
        $_SESSION["user_max_protein"] = htmlspecialchars($result["max_protein"], ENT_QUOTES, 'UTF-8');
        $_SESSION["user_max_carbs"] = htmlspecialchars($result["max_carbs"], ENT_QUOTES, 'UTF-8');
        $_SESSION["user_max_fat"] = htmlspecialchars($result["max_fat"], ENT_QUOTES, 'UTF-8');
    }

    // Redirect to a success page or display a success message
    header("Location: ../settings.php");
    exit();

} catch (PDOException $e) {
    // Handle any errors
    echo "Error: " . $e->getMessage();
}
?>