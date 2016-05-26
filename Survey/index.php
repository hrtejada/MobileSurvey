<?php
session_start();
require '../Config/header.php';
if(!isset($_SESSION['user'])){
    header("Location: /index.php");
}
$query = "SELECT * FROM survey;";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | Survey</title>

    <!--Styles-->
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Hector Tejada Custom CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Survey Home Page</h2>

    <div class="panel panel-primary">
        <div class="panel-heading">Survey Instructions</div>
        <div class="panel-body">Click on button corresponding to survey to begin.</div>
        <table class="table table-condensed">
            <tr><th>ID</th><th>Survey Name</th></tr>
            <?php
            $result = queryMySQL($query);
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["SurveyID"]."</td><td>".$row["SurveyName"]."</td></tr>";
                }
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>