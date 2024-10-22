<?php
session_start();
require_once 'dbh.inc.php'; // Ensure this file contains the PDO connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $userId = $_SESSION["user_id"];
    $profilePicturePath = "upload/Avatar.png"; // Default profile picture

    // Handle file upload
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == 0) {
        $allowedExtensions = ["jpg", "jpeg", "png"];
        $maxFileSize = 5 * 1024 * 1024; // 5MB
        $uploadDir = "../upload/";

        $filename = $_FILES["profile_picture"]["name"];
        $filetype = $_FILES["profile_picture"]["type"];
        $filesize = $_FILES["profile_picture"]["size"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        // Validate file extension
        if (!in_array($ext, $allowedExtensions)) {
            die("Error: Please select a valid file format (jpg, jpeg, png).");
        }

        // Validate file size
        if ($filesize > $maxFileSize) {
            die("Error: File size is larger than the allowed limit.");
        }

        // Validate MIME type
        $allowedMimeTypes = ["image/jpg", "image/jpeg", "image/png"];
        if (!in_array($filetype, $allowedMimeTypes)) {
            die("Error: Invalid file type.");
        }

        // Check if file already exists
        $targetFilePath = $uploadDir . $filename;
        if (file_exists($targetFilePath)) {
            die("Error: File already exists.");
        }

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
            $profilePicturePath = "upload/" . $filename;
        } else {
            die("Error: There was a problem uploading your file. Please try again.");
        }
    }

    try {
        // Ensure $pdo is a valid PDO object
        if (!($pdo instanceof PDO)) {
            throw new Exception("Database connection failed code:#UP");
        }

        // Prepare the SQL statement to update the user's username and profile picture
        $sql = "UPDATE users SET username = :username, profile_image = :profile_image WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Bind the parameters and execute the statement
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':profile_image', $profilePicturePath);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        echo "Profile updated successfully.";
    } catch (Exception $e) {
        // Log the error message
        error_log("Error in profile update: " . $e->getMessage());
        echo "An error occurred. Please try again later.";
    }
} else {
    // If the request method is not POST, redirect to the profile update page
    header("Location: ../home_page.php");
    die();
}
?>