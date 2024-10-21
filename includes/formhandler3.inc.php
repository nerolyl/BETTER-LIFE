<?php

$email = $_POST["email"];

// Generate a unique token
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);

// Set the token expiry time (30 minutes from now)
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

// Require the database connection
$mysqli = require __DIR__ . "/dbh.inc.php";

// Check if $mysqli is a valid MySQLi object
if (!($mysqli instanceof mysqli)) {
    die('Database connection failed');
}

// Prepare the SQL statement to update the reset token and expiry time
$sql = "UPDATE users
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($mysqli->error));
}

// Bind the parameters and execute the statement
$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom("betterlife.project.web@gmail.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END
    Click <a href="http://localhost/Better%20Life/reset-password.php?token=$token">here</a> 
    to reset your password.
    END;

    try {
        $mail->send();
        echo "Password reset email sent.";
    } catch (Exception $e) {
        echo "Failed to send password reset email. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Failed to set password reset token.";
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>