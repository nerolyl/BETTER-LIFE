<?php
// Check if the request method is POST (i.e., the form has been submitted)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve the value of 'username' from the POST request and assign it to $username
    $username = $_POST["username"];
    
    // Retrieve the value of 'pwd' (password) from the POST request and assign it to $pwd
    $pwd = $_POST["pwd"];
    
    // Retrieve the value of 'email' from the POST request and assign it to $email
    $email = $_POST["email"];
    
    // Retrieve the value of 'height' from the POST request and assign it to $height
    $height = $_POST["height"];
    
    // Retrieve the value of 'weight' from the POST request and assign it to $weight
    $weight = $_POST["weight"];
    
    // Retrieve the value of 'age' from the POST request and assign it to $age
    $age = $_POST["age"];
    
    // Retrieve the value of 'gender' from the POST request and assign it to $gender
    $gender = $_POST["gender"];




    try {
        // Include necessary files for database connection and other functionalities
        require_once 'dbh.inc.php'; // Database handler file to connect to the database
        require_once 'register_model.inc.php'; // Contains helper functions for registration
        require_once 'register_contr.inc.php'; // Contains validation and business logic for registration
    
        // Initialize an empty array for storing errors
        $error = [];
    
        // Check if any input field is empty
        if (empty($username) || empty($pwd) || empty($email) || empty($height) || empty($weight) || empty($age) || empty($gender)) {
            $error["empty_input"] = "Fill in all fields";
        }
    
        // Validate the email format
        if (is_email_invalid($email)) {
            $error["invalid_email"] = "Invalid E-mail used";
        }
    
        // Check if the username already exists in the database
        if (is_username_taken($pdo, $username)) {
            $error["username_taken"] = "Username already taken";
        }
    
        // Check if the email is already registered
        if (is_email_taken($pdo, $email)) {
            $error["email_taken"] = "Email taken";
        }
    
        // Include session configuration file to use sessions for storing error messages
        require_once 'config_session.inc.php';
    
        // If there are any errors, store them in the session and redirect the user to the registration page
        if ($error) {
            $_SESSION["error_register"] = $error;
            header("Location: ../register.php");
            die();
        }
    
        // Prepare an SQL query to insert user data into the users table
        $query = "INSERT INTO users (username, pwd, email, height, weight, age, gender) VALUES (:username, :pwd, :email, :height, :weight, :age, :gender);";
    
        $stmt = $pdo->prepare($query); // Prepare the SQL statement
    
        // Options for password hashing
        $options = ['cost' => 12];
    
        // Hash the password using bcrypt
        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    
        // Bind user inputs to the prepared statement
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hashedPwd);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":height", $height);
        $stmt->bindParam(":weight", $weight);
        $stmt->bindParam(":age", $age);
        $stmt->bindParam(":gender", $gender);
    
        // Execute the SQL statement to insert user data
        $stmt->execute();
    
        // Close the database connection and statement
        $pdo = null;
        $stmt = null;
    
        // Redirect the user to the login page after successful registration
        header("Location: ../Login.php");
        die();
    
    } catch (PDOException $e) {
        // If an exception occurs, display the error message
        die("Query failed: " . $e->getMessage());
    } 
    }
    else {
        // If the request method is not POST, redirect to the registration page
        header("Location: ../register.php");
        die(); }