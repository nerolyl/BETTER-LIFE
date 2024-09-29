<?php
// Check if the request method is POST (i.e., the form has been submitted)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"]; // Retrieve 'username' from POST request
    $pwd = $_POST["pwd"]; // Retrieve 'pwd' (password) from POST request

    try {
        // Include necessary files for database connection and login functionality
        require_once 'dbh.inc.php'; // Database handler for connecting to the database
        require_once 'login_model.inc.php'; // Contains helper functions for login
        require_once 'login_contr.inc.php'; // Contains validation and login control logic

        // ERROR HANDLER
        $error = [];

        // Check if either username or password is empty
        if (is_input_empty($username, empty($pwd))) {
            $error["empty_input"] = "Fill in all fields";
        }

        // Retrieve the user data from the database based on the given username
        $result = get_user($pdo, $username);

        // Check if the username provided does not match any in the database
        if (is_username_wrong($result)) {
            $error["login_incorrect"] = "Incorrect login info";
        }

        // If the username is correct but the password is incorrect
        if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
            $error["login_incorrect"] = "Incorrect login info 2";
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
        $_SESSION["last_regeneation"] = time(); // Set the time of the last session regeneration

        // Redirect to the register page after successful login
        header("Location: ../register.php");

        // Close the database connection
        $pdo = null;
        $statment = null;

        die();
    } catch (PDOException $e) {
        // If an exception occurs, display an error message
        die("Query failed: " . $e->getMessage());
    }
} else {
    // If the request method is not POST, redirect to the login page
    header("Location: ../Login.php");
    die();
}
