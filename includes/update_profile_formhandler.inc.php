<?php
session_start();
require_once 'dbh.inc.php'; // Ensure this file contains the PDO connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION["user_id"];
    $username = isset($_POST["username"]) && !empty(trim($_POST["username"])) ? $_POST["username"] : null;
    $profileImagePath = null;

    // Handle file upload
    if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == 0) {
        $allowedExtensions = ["jpg", "jpeg", "png"];
        $maxFileSize = 5 * 1024 * 1024; // 5MB
        $uploadDir = "../upload/";
        
        if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFilePath)) {
            error_log("Error: Failed to move uploaded file. Temp path: " . $_FILES["profile_image"]["tmp_name"] . " Target path: " . $targetFilePath);
            echo "Error: There was a problem uploading your file. Please try again.";
            exit();
        }

        $filename = $_FILES["profile_image"]["name"];
        $filetype = $_FILES["profile_image"]["type"];
        $filesize = $_FILES["profile_image"]["size"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        // Validate file extension
        if (!in_array($ext, $allowedExtensions)) {
            echo "Error: Please select a valid file format (jpg, jpeg, png).";
            exit();
        }

        // Validate file size
        if ($filesize > $maxFileSize) {
            echo "Error: File size is larger than the allowed limit.";
            exit();
        }

        // Validate MIME type
        $allowedMimeTypes = ["image/jpg", "image/jpeg", "image/png"];
        if (!in_array($filetype, $allowedMimeTypes)) {
            echo "Error: Invalid file type.";
            exit();
        }

        // Check if file already exists
        $targetFilePath = $uploadDir . $filename;
        if (file_exists($targetFilePath)) {
            echo "Error: File already exists.";
            exit();
        }

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFilePath)) {
            $profileImagePath = "upload/" . $filename;
        } else {
            error_log("Error: There was a problem uploading the file.");
            echo "Error: There was a problem uploading your file. Please try again.";
            exit();
        }
    }

    try {
        // Ensure $pdo is a valid PDO object
        if (!($pdo instanceof PDO)) {
            throw new Exception("Database connection failed code:#UP");
        }

        // Check if the username is already taken
        if ($username !== null) {
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
        }

        // Prepare the SQL statement to update the user's username and/or profile image
        $sql = "UPDATE users SET ";
        $params = [];
        if ($username !== null) {
            $sql .= "username = :username, ";
            $params[':username'] = $username;
        }
        if ($profileImagePath !== null) {
            $sql .= "profile_image = :profile_image, ";
            $params[':profile_image'] = $profileImagePath;
        }
        $sql = rtrim($sql, ', ') . " WHERE id = :id";
        $params[':id'] = $userId;

        $stmt = $pdo->prepare($sql);

        // Bind the parameters and execute the statement
        foreach ($params as $key => &$val) {
            $stmt->bindParam($key, $val);
        }
        $stmt->execute();

        // Update session variables if necessary
        if ($username !== null) {
            $_SESSION["username"] = $username;
        }
        if ($profileImagePath !== null) {
            $_SESSION["user_profile_image"] = $profileImagePath;
        }

        echo "Profile updated successfully.";
        header("Location: ../settings.php");
        exit(); // Ensure the script stops executing after the redirect
    } catch (Exception $e) {
        // Log the error message
        error_log("Error in profile update: " . $e->getMessage());
        echo "An error occurred. Please try again later.";
    }
} else {
    // If the request method is not POST, redirect to the profile update page
    header("Location: ../settings.php");
    exit();
}
