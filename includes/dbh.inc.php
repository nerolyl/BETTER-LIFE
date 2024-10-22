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

$host = 'localhost';
$db = 'better_life';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Database connection failed: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

return $mysqli;