<?php
function is_input_empty(string $username, string $pwd){
    if (empty($username || empty($pwd))) {
        return true; 

    }
    else {
        return false;
    }

}


function is_username_wrong(bool | array $result){
    if (!$result) {
        return true; 

    }
    else {
        return false;
    }

}

function is_password_wrong(string $pwd){
    if (!password_verify($pwd)) {
        return true; 

    }
    else {
        return false;
    }

}