<?php
// Define the Data Source Name (DSN) to specify the database connection details
$dsn = "mysql:host=localhost;dbname=better_life"; // Database host is localhost, and database name is 'better_life'
$dbusername = "root"; // Database username
$dbpassword = ""; // Database password (empty for local setup)

// Attempt to create a connection to the database using PDO
try {
    // Create a new PDO instance to connect to the database
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    // Set PDO error mode to exception to handle errors properly
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If a connection error occurs, output an error message
    echo "Connection failed: " . $e->getMessage();
}
