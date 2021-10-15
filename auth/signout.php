<?php
session_start();
// if the user is not logged in, redirect them to the public page
// use the following guidelines to create the function in auth.php
unset($_SESSION['logged']);
unset($_SESSION['logged_user']);
header('location:../authors/index.php');
// redirect the user to the public page.
