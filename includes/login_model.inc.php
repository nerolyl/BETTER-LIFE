<?php
// Function to get user information from the database based on the username
function get_user(object $pdo, string $username) {
    // SQL query to select all columns from the 'users' table where the username matches the given value
    $query = "SELECT * FROM users WHERE username = :username;";
    
    // Prepare the SQL statement to prevent SQL injection
    $stmt = $pdo->prepare($query);
    
    // Bind the provided username to the SQL statement
    $stmt->bindParam(":username", $username);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Fetch the resulting row as an associative array and return it
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// Function to get the max_calorie value from the database based on the username
function get_max_calorie(object $pdo, string $username) {
    // SQL query to select the max_calorie column from the 'users' table where the username matches the given value
    $query = "SELECT max_calorie FROM users WHERE username = :username;";
    
    // Prepare the SQL statement to prevent SQL injection
    $stmt = $pdo->prepare($query);
    
    // Bind the provided username to the SQL statement
    $stmt->bindParam(":username", $username);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Fetch the resulting row as an associative array and return it
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// Function to get the user's max_calorie from the database and append it to the session
function set_user_max_calorie_to_session(object $pdo, string $username) {
    // Get the max_calorie value for the given username
    $max_calorie = get_max_calorie($pdo, $username);
    
    // Check if max_calorie is not null
    if ($max_calorie !== null) {
        // Start the session if it hasn't been started yet
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Append the max_calorie value to the session
        $_SESSION['max_calorie'] = $max_calorie['max_calorie'];
        
        // Echo the max_calorie value
        echo "User's max_calorie: " . $max_calorie['max_calorie'];
    }
}
