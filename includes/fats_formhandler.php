<?php
require_once 'dbh.inc.php';
require_once 'config_session.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["user_id"])) {
        die("User is not logged in.");
    }

    $userId = $_SESSION["user_id"];
    $fat = isset($_POST["fat"]) && is_numeric($_POST["fat"]) ? intval($_POST["fat"]) : null;

    if ($fat !== null) {
        try {
            if (!($pdo instanceof PDO)) {
                throw new Exception("Database connection failed");
            }

            // Update the user's fat intake in the database
            $sql = "UPDATE users SET fat = fat + :fat WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':fat', $fat);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();

            // Fetch the updated fat intake
            $sql = "SELECT fat FROM users WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            $updatedFat = $stmt->fetchColumn();

            // Update the session variable
            $_SESSION["user_fat"] = $updatedFat;

            // Redirect to the same page to refresh
            header("Location: ../home_page.php");
            exit();
        } catch (Exception $e) {
            error_log("Error updating fat: " . $e->getMessage());
            echo "<script>alert('An error occurred while updating your fat intake. Please try again.');</script>";
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
