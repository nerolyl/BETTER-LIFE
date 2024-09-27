<?php



function is_input_empty(string $username, string $pwd, string $email, $height, $weight, $age, $gender) {
    if(empty($username || empty($pwd) || empty($email) || empty($height) || empty($weight) || empty($age) || empty($gender))) {
    return true;
    }
    else{
        return false;
    }


}

function is_email_invalid(string $email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
    }
    else{
        return false;
    }


}

function is_username_taken(object $pdo,string $username) {
    if(get_username($pdo,$username)) {
    return true;
    }
    else{
        return false;
    }


}


function is_email_taken(object $pdo,string $email) {
    if(get_email($pdo,$email)) {
    return true;
    }
    else{
        return false;
    }


}

