<?php


function output_username(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_username"]);
    }

}
function output_calorie(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_calorie"]);
    }
}
function output_max_calorie(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_max_calorie"]);
    }
}
function output_protein(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_protein"]);
    }
}
function output_max_protein(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_max_protein"]);
    }
}
function output_max_carbs(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_max_carbs"]);
    }
}
function output_carbs(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_carbs"]);
    }
}
function output_max_fat(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_max_fat"]);
    }
}
function output_fat(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_fat"]);
    }
}