<?php

function check_register_error(){
    if (isset($_SESSION['error_register'])) {
        $errors = $_SESSION ['error_register'];

        echo "<br>";

        foreach ($errors as $error) {
          echo '<p class="form_error">'.$error.'</p>';
        }

        unset($_SESSION ['error_register']);
    }
}