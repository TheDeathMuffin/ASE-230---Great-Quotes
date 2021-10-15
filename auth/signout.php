<?php
// if the user is not logged in, redirect them to the public page
// use the following guidelines to create the function in auth.php
$_SESSION['logged']=false;
if($_SESSION['logged'] == true){
    session_destroy();
}

// redirect the user to the public page.