<?php
session_start();
require_once 'dbh.inc.php'; // Ensure this file contains the PDO connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_account"])) {
    $userId = $_SESSION["user_id"];

    try {
        // Ensure $pdo is a valid PDO object
        if (!($pdo instanceof PDO)) {
            throw new Exception("Database connection failed");
        }

        // Delete the user's account from the database
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        // Destroy the session and redirect to the landing page
        session_destroy();
        header("Location: ../index.html");
        exit();
    } catch (Exception $e) {
        // Log the error message
        error_log("Error deleting account: " . $e->getMessage());
        echo "An error occurred. Please try again later.";
    }
} else {
    // If the request method is not POST or the delete_account button is not set, redirect to the settings page
    header("Location: ../settings.php");
    exit();
}
