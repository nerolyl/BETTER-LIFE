<?php





function get_username(object $pdo, string $username){
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt-> bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt-> fetch(PDO::FETCH_ASSOC);
    return $result;

}

function get_email(object $pdo, string $email){
    $query = "SELECT username FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt-> bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt-> fetch(PDO::FETCH_ASSOC);
    return $result;

}

function create_user(object $pdo,string $username, string $pwd, string $email, $height, $weight, $age, $gender, $activity_level) {
    $query = "INSERT INTO users (username, pwd, email, height, weight, age, gender, activity_level) values;";
    $stmt = $pdo->prepare($query);
    $stmt-> bindParam(":email", $email);
    $stmt->execute();
    }


