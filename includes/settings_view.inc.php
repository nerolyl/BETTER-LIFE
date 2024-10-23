<?php
function output_age(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_age"]);
    }
}

function output_weight(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_weight"]);
    }
}

function output_height(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_height"]);
    }
}

function output_gender(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_gender"]);
    }
}

function output_email(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_email"]);
    }
}

function output_weight_goal_maintain(){
    if (isset($_SESSION["user_id"]) && $_SESSION["user_weight_goal"] == 1){
        echo 'checked';
    } else {
        echo 'unchecked';
    }
}

function output_weight_goal_lose(){
    if (isset($_SESSION["user_id"]) && $_SESSION["user_weight_goal"] == 0.7){
        echo 'checked';
    } else {
        echo 'unchecked';
    }
}

function output_weight_goal_gain(){
    if (isset($_SESSION["user_id"]) && $_SESSION["user_weight_goal"] == 1.3){
        echo 'checked';
    } else {
        echo 'unchecked';
    }
}
function output_profile_image(){
    if (isset($_SESSION["user_id"]) && isset($_SESSION["user_profile_image"])){
        $randomNumber = rand(); // Generate a random number
        echo '<img src="' . htmlspecialchars($_SESSION["user_profile_image"]) . '?v=' . $randomNumber . '" alt="Profile Image">';
    } else {
        echo '<img src="/Avatar.png" alt="Default Profile Image">';
    }
}
