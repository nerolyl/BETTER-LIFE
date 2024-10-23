<?php
require_once 'dbh.inc.php';
require_once 'config_session.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["user_id"])) {
        die("User is not logged in.");
    }

    $userId = $_SESSION["user_id"];
    $calorie = isset($_POST["calorie"]) && is_numeric($_POST["calorie"]) ? intval($_POST["calorie"]) : null;

    if ($calorie !== null) {
        try {
            if (!($pdo instanceof PDO)) {
                throw new Exception("Database connection failed");
            }

            // Update the user's calorie intake in the database
            $sql = "UPDATE users SET calorie = calorie + :calorie WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':calorie', $calorie);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();

            // Fetch the updated calorie intake
            $sql = "SELECT calorie FROM users WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            $updatedCalorie = $stmt->fetchColumn();

            // Update the session variable
            $_SESSION["user_calorie"] = $updatedCalorie;

            // Redirect to the same page to refresh
            header("Location: ../home_page.php");
            exit();
        } catch (Exception $e) {
            error_log("Error updating calorie: " . $e->getMessage());
            echo "<script>alert('An error occurred while updating your calorie intake. Please try again.');</script>";
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
