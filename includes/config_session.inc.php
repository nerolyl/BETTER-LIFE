<?php

ini_set('set.use_only_cookies', 1);
ini_set('set.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();
if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION["last_regeneation"])) {
        session_regenerate_id_loggedin();
        $_SESSION["last_regeneation"] = time();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneation"] >= $interval ) {
            session_regenerate_id_loggedin();
        }
    }
} else {
    if (!isset($_SESSION["last_regeneation"])) {
        session_regenerate_id();
        $_SESSION["last_regeneation"] = time();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneation"] >= $interval ) {
            regenerate_session_id();
        }
    }
}



function regenerate_session_id()
{
    session_regenerate_id(true);
    $_SESSION["last_regeneation"] = time();
}

function session_regenerate_id_loggedin()
{
    session_regenerate_id(true);

    $usrId = $_SESSION["user_id"];

    $newSessionId = session_create_id();
    $sessionid = $newSessionId . "_" . $usrId;
    session_id($sessionid);

    $_SESSION["last_regeneation"] = time();
}

