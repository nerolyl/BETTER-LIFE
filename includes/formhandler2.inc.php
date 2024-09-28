<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

                //ERROR HANDLER
                $error =[];
                
                if(is_input_empty($username, empty($pwd))) {
                    $error["empty_input"] = "Fill in all fields";
                    }

                    $result = get_user($pdo, $username);

                    if (is_username_wrong($result)) {
                        $error["login_incorrect"] = "Incorrect login info";
                    }

                    if (!is_username_wrong($result) && is_password_wrong ($pwd, $result["pwd"])) {
                        $error["login_incorrect"] = "Incorrect login info";
                    }

                    require_once 'config_session.inc.php';
        
                if ($error) {
                    $_SESSION["error_login"] = $error;
        
                    header("Location: ../Login.php");
                    die();
                  }
        $newSessionId = session_create_id();
        $sessionid = $newSessionId . "_" . $result ["id"];
        session_id($sessionid);

        $_SESSION[user_id] = $result["id"];
        $_SESSION[user_username] = htmlspecialchars($result["username"]);
        $_SESSION["last_regeneation"] = time();
        header();
        $pdo = null;    
        $statment = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " .$e->getMessage());
    }

}
else {
    header("Location: ../Login.php");
    die();
}