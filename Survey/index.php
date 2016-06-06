<?php
$title = "Home";
include_once ("../Partials/navbar.php");

if(!isset($_SESSION['user'])){
    header("Location: /index.php");
}
$query = "SELECT * FROM survey;";
?>

<div class="container">
    <div class = "container">
        <h2>Available Surveys</h2>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">Survey Instructions</div>
        <div class="panel-body">Click on button corresponding to survey to begin.</div>
        <form action="survey.php" method="post">
        <table class="table table-condensed">
            <tr><th>ID</th><th>Survey Name</th><th>Link</th></tr>
            <?php
            $result = queryMySQL($query);
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["SurveyID"]."</td><td>".$row["SurveyName"]."</td><td><button class='btn btn-success' name=\"surveyNum\" type=\"submit\" value=".$row["SurveyID"].">GO</button></td></tr>";
                }
            }
            ?>
        </table>
        </form>
    </div>
</div>

<?php include_once ("../Partials/footer.php"); ?>