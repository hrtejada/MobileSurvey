<?php
/**
 * Created by PhpStorm.
 * User: hrtejada
 * Date: 6/6/2016
 * Time: 12:07 PM
 */

$title = "Survey";
include_once ("../Partials/navbar.php");

if(!isset($_SESSION['user'])){
    header("Location: /index.php");
}


if(!isset($_SESSION['qNum'])){
    $_SESSION['qNum'] = 1;
}

$surveyNum = $_POST['surveyNum'];
$qNum = $_SESSION['qNum'];

$query = "SELECT Question FROM question WHERE Question.Survey = '$surveyNum' AND Question.QuestionID = '$qNum';";

$result = mysqli_query($SQL);
$db_field = mysqli_fetch_assoc($result);

?>