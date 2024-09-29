<?php

// Function to check if any of the given inputs are empty
function is_input_empty(string $username, string $pwd, string $email, $height, $weight, $age, $gender) {
    // Check if any of the inputs are empty and return true if so
    if (empty($username) || empty($pwd) || empty($email) || empty($height) || empty($weight) || empty($age) || empty($gender)) {
        return true;
    } else {
        return false;
    }
}

// Function to validate if the email format is correct
function is_email_invalid(string $email) {
    // Use filter_var() to validate the email and return true if it's invalid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// Function to check if a given username already exists in the database
function is_username_taken(object $pdo, string $username) {
    // Use the get_username() function to check if the username is in the database
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

// Function to check if a given email already exists in the database
function is_email_taken(object $pdo, string $email) {
    // Use the get_email() function to check if the email is in the database
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
