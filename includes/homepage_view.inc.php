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

function output_monday_nutrition(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_monday_nutrition"]);
    }
}
function output_points(){
    if (isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_points"]);
    }
}
function output_check_in(){
    if ($_SESSION["user_points"] >= 1){
        echo '<div style="background-color: #5A246B;" class="circle">';
    }
    else{
        echo'<div class="circle">';
    }
}
function output_check_in2(){
    if ($_SESSION["user_points"] >= 2){
        echo '<div style="background-color: #5A246B;" class="circle">';
    }
    else{
        echo'<div class="circle">';
    }
}
function output_check_in3(){
    if ($_SESSION["user_points"] >= 3){
        echo '<div style="background-color: #5A246B;" class="circle">';
    }
    else{
        echo'<div class="circle">';
    }
}
function output_check_in4(){
    if ($_SESSION["user_points"] >= 4){
        echo '<div style="background-color: #5A246B;" class="circle">';
    }
    else{
        echo'<div class="circle">';
    }
}
function output_check_in5(){
    if ($_SESSION["user_points"] >= 5){
        echo '<div style="background-color: #5A246B;" class="circle">';
    }
    else{
        echo'<div class="circle">';
    }
}
function output_check_in6(){
    if ($_SESSION["user_points"] >= 6){
        echo '<div style="background-color: #5A246B;" class="circle">';
    }
    else{
        echo'<div class="circle">';
    }
}
function output_check_in7(){
    if ($_SESSION["user_points"] >= 7){
        echo '<div style="background-color: #5A246B;" class="circle">';;
    }
    else{
        echo '<div class="circle">';
    }
}