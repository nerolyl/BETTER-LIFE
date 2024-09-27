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

if (!isset($_SESSION["last_regeneation"])) {
    session_regenerate_id();
    $_SESSION["last_regeneation"] = time();
} else {
    $interval = 60 * 30;
    if (time() - $_SESSION["last_regeneation"] >= $interval ) {
        $_SESSION["last_regeneation"] = time();
    }
}