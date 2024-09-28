<?php

function check_login_error() {
    if (isset($_SESSION["error_login"])) {
        $errors = $_SESSION["error_login"];

        echo "<br>";

        foreach ($errors as $error) {
          echo '<p class="form-error">'.$error.'</p>';
        }


        
        unset($_SESSION['error_login']);

    }
}