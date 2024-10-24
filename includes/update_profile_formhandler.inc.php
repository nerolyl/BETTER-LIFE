<?php
session_start();
require_once 'dbh.inc.php'; // Ensure this file contains the PDO connection setup
require_once 'config_session.inc.php'; // Ensure this file contains the session configuration setup
require_once 'formhandler2.inc.php'; // Ensure this file contains the update_user_points_and_login function

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

            // Update session variable
            $_SESSION["user_username"] = $username;

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