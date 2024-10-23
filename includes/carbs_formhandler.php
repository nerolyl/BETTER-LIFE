<?php
require_once 'dbh.inc.php';
require_once 'config_session.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["user_id"])) {
        die("User is not logged in.");
    }

    $userId = $_SESSION["user_id"];
    $carbs = isset($_POST["carbs"]) && is_numeric($_POST["carbs"]) ? intval($_POST["carbs"]) : null;

    if ($carbs !== null) {
        try {
            if (!($pdo instanceof PDO)) {
                throw new Exception("Database connection failed");
            }

            // Update the user's carbs intake in the database
            $sql = "UPDATE users SET carbs = carbs + :carbs WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':carbs', $carbs);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();

            // Fetch the updated carbs intake
            $sql = "SELECT carbs FROM users WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            $updatedCarbs = $stmt->fetchColumn();

            // Update the session variable
            $_SESSION["user_carbs"] = $updatedCarbs;

            // Redirect to the same page to refresh
            header("Location: ../home_page.php");
            exit();
        } catch (Exception $e) {
            error_log("Error updating carbs: " . $e->getMessage());
            echo "<script>alert('An error occurred while updating your carbs intake. Please try again.');</script>";
            header("Location: ../home_page.php");
        }
    } else {
        echo "<script>alert('Invalid input. Please enter a valid number.');</script>";
        header("Location: ../home_page.php");
    }
} else {
    echo "<script>alert('Invalid request method.');</script>";
    header("Location: ../home_page.php");
}
