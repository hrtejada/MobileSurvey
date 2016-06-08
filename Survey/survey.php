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
?>



<div class="container">

        <h2>Survey Title Goes Here hehe</h2>

        <form action="survey.php" method="post">
                <?php
                $surveyNum = $_POST['surveyNum'];

                $query = "SELECT * FROM question WHERE question.Survey = '$surveyNum';";
                $result = queryMysql($query);

                $currQuestion = null;
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        echo "<p>".$row["Question"]."</p>";
                        $currQuestion = $row["QuestionID"];
                        $query2 = "SELECT * FROM answer WHERE answer.QuestionID = '$currQuestion'";
                        $result2 = queryMysql($query2);

                        if($result2->num_rows > 0){
                            while($answers = $result2->fetch_assoc()){
                                echo "<input type=\"radio\" name=\"answer\">".$answers["Answer"]."<br>";
                            }
                        }
                        echo "<br>";
                    }
                }

                //$query2 = "SELECT * FROM answer WHERE answer.QuestionID = '$qNum'";
                //JSON Endoding for easy read of the question information being queried.
                //$rows = array();
                //while($r = mysqli_fetch_assoc($result)) {
                //    $rows[] = $r;
                //}
                //
                //echo json_encode($rows);
                ?>
            <button class="btn btn-lg btn-primary" type="submit">Submit</button>
        </form>
</div>

<?php include_once ("../Partials/footer.php"); ?>
