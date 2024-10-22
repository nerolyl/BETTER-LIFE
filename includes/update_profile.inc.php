<?php
session_start();
require_once 'dbh.inc.php'; // Ensure this file contains the PDO connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $userId = $_SESSION["user_id"];
    $profilePicturePath = null;

    // Handle file upload
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == 0) {
        $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"];
        $filename = $_FILES["profile_picture"]["name"];
        $filetype = $_FILES["profile_picture"]["type"];
        $filesize = $_FILES["profile_picture"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            die("Error: Please select a valid file format (jpg, jpeg, png).");
        }

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        // Verify MIME type
        if (in_array($filetype, $allowed)) {
            // Check whether the file exists before uploading it
            if (file_exists("../upload/" . $filename)) {
                die($filename . " already exists.");
            } else {
                move_uploaded_file($_FILES["profile_picture"]["tmp_name"], "../upload/" . $filename);
                $profilePicturePath = "upload/" . $filename;
            }
        } else {
            die("Error: There was a problem uploading your file. Please try again.");
        }
    }

    try {
        // Ensure $pdo is a valid PDO object
        if (!($pdo instanceof PDO)) {
            throw new Exception("Database connection failed code:UP");
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
    header("Location: ../update_profile.php");
    die();
}
?>