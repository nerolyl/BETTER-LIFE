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
        require_once 'dbh.inc.php';
        require_once 'register_model.inc.php';
        require_once 'register_contr.inc.php';

        //ERROR HANDLER
        $error =[];

        if(empty($username || empty($pwd) || empty($email) || empty($height) || empty($weight) || empty($age) || empty($gender))) {
            $error["empty_input"] = "Fill in all fields";
            }
        if(is_email_invalid($email)) {
            $error["invalid_email"] = "invlid E-mail used";
            }

        if(is_username_taken($pdo,$username)) {
            $error["username_taken"] = "username already taken";
            }
        if(is_email_taken($pdo, $email)) {
            $error["email_taken"] = "email taken";
            }
            require_once 'config_session.inc.php';

        if ($error) {
            $_SESSION["error_register"] = $error;
            header("Location: ../register.php");
            die();
        }
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
    die();
}