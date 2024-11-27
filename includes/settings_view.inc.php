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
function output_activity_level_1(){
    if (isset($_SESSION["user_id"]) && $_SESSION["user_activity_level"] == 1.2){
        echo 'selected="selected"';
}
}
function output_activity_level_2(){
    if (isset($_SESSION["user_id"]) && $_SESSION["user_activity_level"] == 1.375){
        echo 'selected="selected"';
}
}
function output_activity_level_3(){
    if (isset($_SESSION["user_id"]) && $_SESSION["user_activity_level"] == 1.55){
        echo 'selected="selected"';
}
}
function output_activity_level_4(){
    if (isset($_SESSION["user_id"]) && $_SESSION["user_activity_level"] == 1.725){
        echo 'selected="selected"';
}
}
function output_activity_level_5(){
    if (isset($_SESSION["user_id"]) && $_SESSION["user_activity_level"] == 1.9){
        echo 'selected="selected"';
}
}