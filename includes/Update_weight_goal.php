<?php
session_start();
require_once 'dbh.inc.php'; // Ensure this file contains the PDO connection setup

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

            // Update the session variable
            $_SESSION["user_weight_goal"] = $weightGoal;

            // Refresh the page
            header("Location: ../Settings.php");
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