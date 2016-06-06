<?php
/**
 * Created by PhpStorm.
 * User: hrtejada
 * Date: 6/6/2016
 * Time: 9:41 AM
 */
session_start();
require '../Config/header.php';

destroySession();
header('Location: /index.html');

?>