<?php
/**
 * Created by PhpStorm.
 * User: hrtejada
 * Date: 5/18/2016
 * Time: 9:37 AM
 */

//Secure http turned off while in development mode
if(0) {
// Use HTTP Strict Transport Security to force client to use secure connections only
    $use_sts = true;

// iis sets HTTPS to 'off' for non-SSL requests
    if ($use_sts && isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
        header('Strict-Transport-Security: max-age=31536000');
    } elseif ($use_sts) {
        header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], true, 301);
        // we are in cleartext at the moment, prevent further execution and output
        die();
    }
}


//Database connection variables
$dbhost = "127.0.0.1";
$dbuser   = "survey";
$dbpass    = "kkkiii888***(((";
$dbname = "mobile_survey";
$appname= "Mobile Survey";

//Establish connection to db
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($connection ->connect_error) die ($connection->connect_error);

//Creates a table if it does not already exist
function create($name, $query){
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists. <br>";
}

//method to execute queries
function queryMysql($query){
    global $connection;
    $result = $connection->query($query);

    if(!$result) die($connection->error);
    return $result;
}

//Logs user out and destroys session. May not be used
function destroySession(){
    $_SESSION=array();
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

//Sanitizes input for login forms or other forms. General security measure.
function sanitizeString($var){
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
}

//General user profile page. Probably will never be user. Most likely will be removed
function showProfile($user){
    if (file_exists("$user.jpg"))
        echo "<img src='$user.jpg' style='float:left;'>";

    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
    if ($result->num_rows){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
}

function createTables(){
    $userTableQuery="CREATE TABLE `user` (
	`UserID` INT(11) NOT NULL AUTO_INCREMENT,
	`UserName` VARCHAR(100) NOT NULL,
	`UserEmail` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`UserID`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;";

    $result = queryMysql($userTableQuery);
    if ($result->num_rows == 0){
        echo "Something went wrong in creating the tables";
    }

}

?>