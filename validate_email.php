<?php
session_start();
if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"] !==true){
    header("location: index.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $email_to_validate=$_POST['email'];

    $sanitized_email =filter_var($email_to_validate, FILTER_SANITIZE_EMAIL);
    if(filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)){
        header("location: dashboard.php?result=valid&email=" . urlencode($sanitized_email));
        exit;
    }
}else{
    header("location: dashboard.php");
    exit;
}
?>