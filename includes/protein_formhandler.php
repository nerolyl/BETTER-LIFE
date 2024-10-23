<?php
require_once 'dbh.inc.php';
require_once 'config_session.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["user_id"])) {
        die("User is not logged in.");
    }

    $userId = $_SESSION["user_id"];
    $protein = isset($_POST["protein"]) && is_numeric($_POST["protein"]) ? intval($_POST["protein"]) : null;

    if ($protein !== null) {
        try {
            if (!($pdo instanceof PDO)) {
                throw new Exception("Database connection failed");
            }

            // Update the user's protein intake in the database
            $sql = "UPDATE users SET protein = protein + :protein WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':protein', $protein);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();

            // Fetch the updated protein intake
            $sql = "SELECT protein FROM users WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            $updatedProtein = $stmt->fetchColumn();

            // Update the session variable
            $_SESSION["user_protein"] = $updatedProtein;

            // Redirect to the same page to refresh
            header("Location: ../home_page.php");
            exit();
        } catch (Exception $e) {
            error_log("Error updating protein: " . $e->getMessage());
            echo "<script>alert('An error occurred while updating your protein intake. Please try again.');</script>";
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
