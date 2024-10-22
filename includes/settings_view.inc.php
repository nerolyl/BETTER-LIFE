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
