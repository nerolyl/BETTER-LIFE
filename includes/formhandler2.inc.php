<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'dbh.inc.php'; // Database handler for connecting to the database
require_once 'login_model.inc.php'; // Contains helper functions for login
require_once 'login_contr.inc.php'; // Contains validation and login control logic
require_once 'points_formhandler.inc.php'; // Contains the function to update user points and last login time

// Check if the request method is POST (i.e., the form has been submitted)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"]; // Retrieve 'username' from POST request
    $pwd = $_POST["pwd"]; // Retrieve 'pwd' (password) from POST request

    try {
        // ERROR HANDLER
        $error = [];

        // Check if either username or password is empty
        if (empty($username) || empty($pwd)) {
            $error["empty_input"] = "Fill in all fields";
        }

        // Retrieve the user data from the database based on the given username
        $result = get_user($pdo, $username);

        // Check if the username provided does not match any in the database
        if (!$result) {
            $error["login_incorrect"] = "Incorrect login info";
        }

        // If the username is correct but the password is incorrect
        if ($result && !password_verify($pwd, $result["pwd"])) {
            $error["login_incorrect"] = "Incorrect login info";
        }

        // Include session configuration for setting session parameters
        require_once 'config_session.inc.php';

        // If there are errors, store them in the session and redirect back to the login page
        if ($error) {
            $_SESSION["error_login"] = $error;
            header("Location: ../Login.php");
            die();
        }

        // Generate a new session ID, appending the user's ID for better tracking
        $newSessionId = session_create_id();
        $sessionid = $newSessionId . "_" . $result["id"];
        session_id($sessionid); // Set the new session ID

        // Store user information in the session
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]); // Escape username to prevent XSS
        $_SESSION["user_email"] = htmlspecialchars($result["email"]);
        $_SESSION["user_calorie"] = htmlspecialchars($result["calorie"]);
        $_SESSION["user_max_calorie"] = htmlspecialchars($result["max_calorie"]);
        $_SESSION["user_protein"] = htmlspecialchars($result["protein"]);
        $_SESSION["user_max_protein"] = htmlspecialchars($result["max_protein"]);
        $_SESSION["user_carbs"] = htmlspecialchars($result["carbs"]);
        $_SESSION["user_max_carbs"] = htmlspecialchars($result["max_carbs"]);
        $_SESSION["user_max_fat"] = htmlspecialchars($result["max_fat"]);
        $_SESSION["user_fat"] = htmlspecialchars($result["fat"]);
        $_SESSION["user_sunday_nutrition"] = htmlspecialchars($result["sunday_nutrition"]);
        $_SESSION["user_monday_nutrition"] = htmlspecialchars($result["monday_nutrition"]);
        $_SESSION["user_tuesday_nutrition"] = htmlspecialchars($result["tuesday_nutrition"]);
        $_SESSION["user_wednesday_nutrition"] = htmlspecialchars($result["wednesday_nutrition"]);
        $_SESSION["user_thursday_nutrition"] = htmlspecialchars($result["thursday_nutrition"]);
        $_SESSION["user_friday_nutrition"] = htmlspecialchars($result["friday_nutrition"]);
        $_SESSION["user_saturday_nutrition"] = htmlspecialchars($result["saturday_nutrition"]);
        $_SESSION["user_points"] = htmlspecialchars($result["points"]);
        $_SESSION["user_gender"] = htmlspecialchars($result["gender"]);
        $_SESSION["user_weight"] = htmlspecialchars($result["weight"]);
        $_SESSION["user_height"] = htmlspecialchars($result["height"]);
        $_SESSION["user_age"] = htmlspecialchars($result["age"]);
        $_SESSION["user_height"] = htmlspecialchars($result["height"]);
        $_SESSION["user_weight_goal"] = htmlspecialchars($result["weight_goal"]);
        $_SESSION["user_activity_level"] = htmlspecialchars($result["activity_level"]);
        $_SESSION["last_regeneration"] = time(); // Set the time of the last session regeneration
        $_SESSION["user_last_login"] = htmlspecialchars($result["last_login"]);

        // Check if the user logged in today
        $lastLogin = new DateTime($result['last_login']);
        $currentDate = new DateTime();

        // Compare only the day part
        if ($lastLogin->format('Y-m-d') !== $currentDate->format('Y-m-d')) {
            // Update points and last login time
            if (update_user_points_and_login($pdo, $username)) {
                // Refresh user data to update session with new points and last login time
                $result = get_user($pdo, $username);
                $_SESSION["user_points"] = htmlspecialchars($result["points"]);
                $_SESSION["user_last_login"] = htmlspecialchars($result["last_login"]);
            } else {
                // Log an error message if the update failed
                error_log("Failed to update user points and last login for user: " . $username);
            }
        }

        // Redirect to the Home Page after successful login
        header("Location: ../home_page.php");
        exit();
    } catch (PDOException $e) {
        // If an exception occurs, display an error message
        die("Query failed: " . $e->getMessage());
    }
} else {
    // If the request method is not POST, redirect to the login page
    header("Location: ../login.php");
    exit();
}
?>