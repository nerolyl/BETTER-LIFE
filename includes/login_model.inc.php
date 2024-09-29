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