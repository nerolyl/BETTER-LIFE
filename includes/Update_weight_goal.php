<?php
require_once 'dbh.inc.php'; // Ensure this file contains the PDO connection setup
require_once 'config_session.inc.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["weight"])) {
        $weightGoal = $_POST["weight"];
        $userId = $_SESSION["user_id"]; // Assuming the user ID is stored in the session

        try {
            // Ensure $pdo is a valid PDO object
            if (!($pdo instanceof PDO)) {
                throw new Exception("Database connection failed");
            }

            // Prepare the SQL statement to update the user's weight goal
            $sql = "UPDATE users SET weight_goal = :weight_goal WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            // Bind the parameters and execute the statement
            $stmt->bindParam(':weight_goal', $weightGoal);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();

            // Fetch the updated max_calorie, max_protein, max_carbs, and max_fat values
            $sql = "SELECT max_calorie, max_protein, max_carbs, max_fat FROM users WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Update the session variables
                $_SESSION["user_weight_goal"] = $weightGoal;
                $_SESSION["user_max_calorie"] = $result["max_calorie"];
                $_SESSION["user_max_protein"] = $result["max_protein"];
                $_SESSION["user_max_carbs"] = $result["max_carbs"];
                $_SESSION["user_max_fat"] = $result["max_fat"];
            }

            // Redirect to the home page
            header("Location: ../settings.php");
            exit();
        } catch (Exception $e) {
            // Log the error message
            error_log("Error in weight goal update: " . $e->getMessage());
            echo "An error occurred. Please try again later.";
        }
    } else {
        echo "No weight goal selected.";
    }
} else {
    // If the request method is not POST, redirect to the settings page
    header("Location: ../Settings.php");
    die();
}
?>