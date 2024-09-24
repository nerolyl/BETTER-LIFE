<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];


    try {
        require_once "dbh.inc.php";

        $query ="INSERT INTO users (username, pwd, email, height, weight, age, gender) VALUES(:username, :pwd, :email, :height, :weight, :age, :gender);";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username );
        $stmt->bindParam(":pwd", $pwd );
        $stmt->bindParam(":email", $email );
        $stmt->bindParam(":height", $height );
        $stmt->bindParam(":weight", $weight );
        $stmt->bindParam(":age", $age );
        $stmt->bindParam(":gender", $gender );

        $stmt-> execute();


        $pdo = null;
        $stmt = null; 

        header("Location: ../register.php");

        die();

    } catch (PDOException $e) {
        die("Query failed: " .$e->getMessage());
    }
}
else{
    header("Location: ../register.php");
}