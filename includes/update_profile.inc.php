<?php

require_once 'dbh.inc.php'; // Ensure this file contains the PDO connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["user_id"])) {
        // If the user is not logged in, redirect to the login page
        header("Location: ../login.php");
        exit();
    }

    $userId = $_SESSION["user_id"];
    $username = isset($_POST["username"]) && !empty(trim($_POST["username"])) ? trim($_POST["username"]) : null;

    if ($username !== null) {
        try {
            // Ensure $pdo is a valid PDO object
            if (!($pdo instanceof PDO)) {
                throw new Exception("Database connection failed code:#UP");
            }

            // Check if the username is already taken
            $sql = "SELECT COUNT(*) FROM users WHERE username = :username AND id != :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                echo "Error: Username is already taken.";
                exit();
            }

            // Update the user's username
            $sql = "UPDATE users SET username = :username WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();



            // Debugging information
            error_log("Username updated successfully: " . $_SESSION["user_username"]);

            // Refresh the page
            header("Location: ../settings.php");
            exit(); // Ensure the script stops executing after the redirect
        } catch (Exception $e) {
            // Log the error message
            error_log("Error in username update: " . $e->getMessage());
            echo "An error occurred. Please try again later.";
        }
    } else {
        echo "Error: Username cannot be empty.";
    }
} else {
    // If the request method is not POST, redirect to the settings page
    header("Location: ../settings.php");
    exit();
}
?>