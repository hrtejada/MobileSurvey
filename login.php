<?php
/**
 * Created by PhpStorm.
 * User: hrtejada
 * Date: 5/23/2016
 * Time: 10:48 AM
 */
if(0) {
    require 'Config/header.php';
    session_start();

//Checks if a session is already set
    if (isset($_SESSION['user'])) {
        header("Location: Survey/index.php");
    }

//Initializing variables
    $error = $user = $email = null;

//Handling the form to sign in
    if (isset($_POST['username'])) {

        $user = sanitizeString($_POST['username']);
        $email = sanitizeString($_POST['email']);

        //If there is an error processing form. Handled here.
        if ($user == null || $email == null) {
            echo "<script>alert('Invalid name/email')";
            header('Location: index.php');
        } //Processing form
        else {
            $result = queryMySQL("SELECT UserName, UserEmail FROM user WHERE UserName='$user' AND UserEmail='$email'");
            if ($result->num_rows == 0) {
                $query = "INSERT INTO user VALUES(NULL, '$user', '$email');";
                queryMySQL($query);
                $_SESSION['user'] = $user;
                $_SESSION['email'] = $email;
                header('Location: Survey/index.php');

            } else {
                $_SESSION['user'] = $user;
                $_SESSION['email'] = $pass;
                header('Location: Survey/index.php');
            }
        }
    }
}
?>

