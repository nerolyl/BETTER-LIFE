<?php

// Configure session settings for improved security
ini_set('set.use_only_cookies', 1); // Forces the use of cookies to store session IDs (disabling URL-based session IDs)
ini_set('set.use_strict_mode', 1);  // Enables strict mode for session use, preventing attacks with reused session IDs

// Set the parameters for the session cookie to enhance security
session_set_cookie_params([
    'lifetime' => 1800, // Session cookie lifetime is set to 30 minutes
    'domain' => 'localhost', // Cookie will be available only on 'localhost'
    'path' => '/', // Cookie will be available across the entire site
    'secure' => true, // Cookie will be transmitted only over secure HTTPS connections
    'httponly' => true // Cookie will be accessible only through HTTP protocol, preventing JavaScript access
]);

// Start the session
session_start();

// If the user is logged in (i.e., session contains 'user_id')
if (isset($_SESSION["user_id"])) {
    // If there's no record of the last session regeneration, regenerate the session ID
    if (!isset($_SESSION["last_regeneation"])) {
        session_regenerate_id_loggedin(); // Regenerate session ID with user logged in
        $_SESSION["last_regeneation"] = time(); // Record the time of regeneration
    } else {
        // Set the regeneration interval to 30 minutes
        $interval = 60 * 30;
        // If the last regeneration was 30 minutes ago or longer, regenerate the session ID
        if (time() - $_SESSION["last_regeneation"] >= $interval) {
            session_regenerate_id_loggedin();
        }
    }
} else {
    // If the user is not logged in and there's no record of last regeneration, regenerate the session ID
    if (!isset($_SESSION["last_regeneation"])) {
        session_regenerate_id(); // Regenerate session ID for anonymous user
        $_SESSION["last_regeneation"] = time(); // Record the time of regeneration
    } else {
        // Set the regeneration interval to 30 minutes
        $interval = 60 * 30;
        // If the last regeneration was 30 minutes ago or longer, regenerate the session ID
        if (time() - $_SESSION["last_regeneation"] >= $interval) {
            regenerate_session_id();
        }
    }
}

// Function to regenerate session ID for anonymous users
function regenerate_session_id()
{
    session_regenerate_id(true); // Regenerate session ID and delete the old one
    $_SESSION["last_regeneation"] = time(); // Update the last regeneration time
}

// Function to regenerate session ID for logged-in users
function session_regenerate_id_loggedin()
{
    session_regenerate_id(true); // Regenerate session ID and delete the old one

    $userId = $_SESSION["user_id"]; // Get the user ID from the session

    // Create a new session ID and append the user ID for better tracking
    $newSessionId = session_create_id();
    $sessionid = $newSessionId . "_" . $userId;
    session_id($sessionid); // Set the new session ID

    $_SESSION["last_regeneation"] = time(); // Update the last regeneration time
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

