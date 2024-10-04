<?php

// Function to check and display login error messages
function check_login_error() {
    // Check if there are any errors stored in the session under "error_login"
    if (isset($_SESSION["error_login"])) {
        // Retrieve the errors from the session
        $errors = $_SESSION["error_login"];

        // Output a line break for visual spacing
        echo "<br>";

        // Loop through each error and display it
        foreach ($errors as $error) {
            // Output each error as a paragraph with a class for styling
            echo '<p class="form-error">' . $error . '</p>';
        }

        // Remove the error data from the session after displaying it
        unset($_SESSION['error_login']);
    }
}
