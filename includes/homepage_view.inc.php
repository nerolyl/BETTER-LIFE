<?php

function output_username(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_username"]);
    }

}
function output_max_calorie(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_max_calorie"]);
    }
}

