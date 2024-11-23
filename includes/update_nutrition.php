<?php
require_once 'dbh.inc.php';
require_once 'config_session.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Ensure the user is logged in and retrieve the user ID from the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Debugging: Log the session state
error_log("Session status: " . session_status());
error_log("Session user_id: " . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'not set'));

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in.']);
    exit;
}

$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['calorie'], $_POST['carbs'], $_POST['fat'], $_POST['protein'])) {
        $calorie = $_POST['calorie'];
        $carbs = $_POST['carbs'];
        $fat = $_POST['fat'];
        $protein = $_POST['protein'];

        // Log the received data
        error_log("Received data: calorie=$calorie, carbs=$carbs, fat=$fat, protein=$protein");

        // Update the user's information in the database
        if (updateUserNutrition($userId, $calorie, $carbs, $fat, $protein)) {
            // Update session variables
            $_SESSION['user_calorie'] += $calorie;
            $_SESSION['user_carbs'] += $carbs;
            $_SESSION['user_fat'] += $fat;
            $_SESSION['user_protein'] += $protein;



            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to update user nutrition.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid input.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}

function updateUserNutrition($userId, $calorie, $carbs, $fat, $protein) {
    global $mysqli; // Use the $mysqli connection from dbh.inc.php

    // Retrieve current values
    $sql = "SELECT calorie, carbs, fat, protein FROM users WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        error_log("Prepare failed: " . $mysqli->error);
        return false;
    }

    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $currentCalorie = $currentCarbs = $currentFat = $currentProtein = 0;
    $stmt->bind_result($currentCalorie, $currentCarbs, $currentFat, $currentProtein);
    $stmt->fetch();
    $stmt->close();

    // Add new values to current values
    $newCalorie = $currentCalorie + $calorie;
    $newCarbs = $currentCarbs + $carbs;
    $newFat = $currentFat + $fat;
    $newProtein = $currentProtein + $protein;


    // Update query
    $sql = "UPDATE users SET calorie = ?, carbs = ?, fat = ?, protein = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        error_log("Prepare failed: " . $mysqli->error);
        return false;
    }

    $stmt->bind_param("iiiii", $newCalorie, $newCarbs, $newFat, $newProtein, $userId);

    // Log the SQL execution
    error_log("Executing SQL: UPDATE users SET calorie=$newCalorie, carbs=$newCarbs, fat=$newFat, protein=$newProtein WHERE id=$userId");

    if ($stmt->execute()) {
        error_log("SQL execution successful.");
        $stmt->close();
        return true;
    } else {
        error_log("Execute failed: " . $stmt->error);
        error_log("SQLSTATE: " . $stmt->sqlstate);
        error_log("Error number: " . $stmt->errno);
        $stmt->close();
        return false;
    }
}

?>