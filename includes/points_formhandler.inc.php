<?php
// Function to update the user's points and last login time
function update_user_points_and_login(object $pdo, string $username) {
    try {
        $query = "UPDATE users SET points = points + 1, last_login = CURDATE() WHERE username = :username;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            error_log("Successfully updated points and last login for user: " . $username);
            return true;
        } else {
            error_log("No rows affected when updating points and last login for user: " . $username);
            return false;
        }
    } catch (PDOException $e) {
        // Log the error message
        error_log("Error updating user points and last login: " . $e->getMessage());
        return false;
    }
}